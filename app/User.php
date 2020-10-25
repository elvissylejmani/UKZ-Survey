<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\fuzzy_rating;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    private $fuzzyValue;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','lastname','type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function Groups()
    {
        return $this->belongsToMany(group::class);
    }
    public function Classes()
    {
        return $this->belongsToMany(classe::class);
    }
    public function StudentInfo()
    {
        return $this->hasOne(StudentData::class,'Stud_ID','id');
    }
    public function IsAdmin()
    {
        if ($this->type == 'Admin') {
            return true;
        }
        else {
            return false;
        }
    }
    public function FuzzyRating()
    {
        $sets = Auth::user()->StudentInfo;
        $avg = $sets->Average;
        if($avg >= 6.0 && $avg <= 7.0)
        {
            $this->fuzzyValue += 0.1;
        }
        else if ($avg > 7.0 && $avg <= 8.0) {
            $this->fuzzyValue += 0.2;
        }
        else if ($avg > 8.0 && $avg <= 8.5) {
            $this->fuzzyValue += 0.3;
        }
        else if ($avg > 8.5 && $avg <= 9.0) {
            $this->fuzzyValue += 0.4;
        }
        else{
            $this->fuzzyValue += 0.5;
        }

        $att = $sets->Attendance;
        if($att >= 0 && $att <= 20)
        {
            $this->fuzzyValue += 0.02;
        }
        else if ($att > 21 && $att <= 40) {
            $this->fuzzyValue += 0.04;
        }
        else if ($att > 41 && $att <= 60) {
            $this->fuzzyValue += 0.06;
        }
        else if ($att > 61 && $att <= 80) {
            $this->fuzzyValue += 0.08;
        }
        else{
            $this->fuzzyValue += 0.10;
        }


        $unPassedExams = $sets->Exams - $sets->ExamsPassed;
        if($unPassedExams >= 10)
        {
            $this->fuzzyValue += 0.08;
        }
        else if ($unPassedExams < 10 && $unPassedExams >= 8) {
            $this->fuzzyValue += 0.16;
        }
        else if ($unPassedExams < 8 && $unPassedExams >= 5) {
            $this->fuzzyValue += 0.24;
        }
        else if ($unPassedExams < 5 && $unPassedExams >= 2) {
            $this->fuzzyValue += 0.32;
        }
        else{
            $this->fuzzyValue += 0.40;
        }
        // return $unPassedExams;
        return $this->fuzzyValue;
    }
    public function InsertFuzzyData($AnswerAvg,$Questions,$Prof_ID)
    {
        $StudentSet = $this->FuzzyRating();
        $count = count($Questions['Question_ID']);
        $AnswerAvg = array_sum($AnswerAvg['Answer'])/count($AnswerAvg['Answer']);
        if ($StudentSet > 0 && $StudentSet <= 0.3) {
            fuzzy_rating::create(['AverageOfAnswers' => $AnswerAvg,'StudentSet' => 1,'Prof_ID' => $Prof_ID['Prof_ID']]);
            return 1;
        }
        else if ($StudentSet > 0.3 && $StudentSet <= 0.5) {
            fuzzy_rating::create(['AverageOfAnswers' => $AnswerAvg,'StudentSet' => 2,'Prof_ID' => $Prof_ID['Prof_ID']]);
            return 2;
        }
        else if ($StudentSet > 0.5 && $StudentSet <= 0.7) {
            fuzzy_rating::create(['AverageOfAnswers' => $AnswerAvg,'StudentSet' => 3,'Prof_ID' => $Prof_ID['Prof_ID']]);
            return 3;
        }
        else if ($StudentSet > 0.7 && $StudentSet <= 0.9) {
             fuzzy_rating::create(['AverageOfAnswers' => $AnswerAvg,'StudentSet' => 4,'Prof_ID' => $Prof_ID['Prof_ID']]);
             return 4;
        }
        else {
            fuzzy_rating::create(['AverageOfAnswers' => $AnswerAvg,'StudentSet' => 5,'Prof_ID' => $Prof_ID['Prof_ID']]);
            return 5;
        }
    }
    public function Surveys()
    {
        $surveys =  DB::table('users')
        ->where('users.id', '=', Auth::id())
        ->join('group_user', 'users.id', '=', 'group_user.User_ID')
        ->join('groups', 'group_user.Group_ID', '=', 'groups.id')
        ->join('surveys', 'groups.id', '=', 'surveys.Group_ID')
        ->join('classes','groups.Class_ID','=','classes.id')
        ->join('professors','groups.Prof_ID','=','professors.id')
        ->select('surveys.SurveyTitle','surveys.id','classes.Name as Class_Name','professors.Name as Professor_Name','professors.Lastname','groups.Name')
        ->get();
        $a = count($surveys);
        for($i = 0;$i < $a;$i++){
            $exist = isCompleted::where('User_ID','=',Auth::id())->where('Survey_ID','=',$surveys[$i]->id)->get();
            if (!$exist->isEmpty()) {
                  unset($surveys[$i]);
            }
        }
        return $surveys;
    }
}
