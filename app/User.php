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
        if($avg > 6.0 && $avg <= 7.0)
        {
            $this->fuzzyValue += 0.06;
        }
        else if ($avg > 7.0 && $avg <= 8.0) {
            $this->fuzzyValue += 0.13;
        }
        else if ($avg > 8.0 && $avg <= 8.5) {
            $this->fuzzyValue += 0.19;
        }
        else if ($avg > 8.5 && $avg <= 9.0) {
            $this->fuzzyValue += 0.27;
        }
        else{
            $this->fuzzyValue += 0.33;
        }

        $att = $sets->Attendance;
        if($att > 0 && $att <= 20)
        {
            $this->fuzzyValue += 0.06;
        }
        else if ($att > 21 && $att <= 40) {
            $this->fuzzyValue += 0.13;
        }
        else if ($att > 41 && $att <= 60) {
            $this->fuzzyValue += 0.19;
        }
        else if ($att > 61 && $att <= 80) {
            $this->fuzzyValue += 0.27;
        }
        else{
            $this->fuzzyValue += 0.33;
        }


        $unPassedExams = $sets->Exams - $sets->ExamsPassed;
        if($unPassedExams > 10)
        {
            $this->fuzzyValue += 0.06;
        }
        else if ($unPassedExams < 10 && $unPassedExams >= 8) {
            $this->fuzzyValue += 0.13;
        }
        else if ($unPassedExams < 8 && $unPassedExams >= 5) {
            $this->fuzzyValue += 0.19;
        }
        else if ($unPassedExams < 5 && $unPassedExams >= 2) {
            $this->fuzzyValue += 0.27;
        }
        else{
            $this->fuzzyValue += 0.33;
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
}
