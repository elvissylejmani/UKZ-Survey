<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\professor;
use App\classe;
use App\fuzzy_rating;
use Illuminate\Support\Facades\DB;
class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $professors = professor::orderBy('id', 'DESC')->get()->all();
         
        return view('Professors');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $professor = request()->validate(['Name' => 'required', 'LastName' => 'required']);
        professor::create($professor);
        return redirect('/Professor/view/all')->with('alert','Profesori u Shtua me sukses');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $professor = professor::findOrFail($id);
      
        return view('editprof',compact('professor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cid = request()->validate(['class' => 'required']);
        $professor = professor::findOrFail($id);
        $class = classe::findOrFail($cid['class']);
        $professor->Classes()->attach($class);

        return back();

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $professor = request()->validate(['Name' => 'required', 'LastName' => 'required']);
        professor::findOrFail($id)->update($professor);
        return redirect('/Professor/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $professor = professor::findOrFail($id);
        $professor->delete();
        return back();
    }
    public function SurveyData($id)
    {
        $professor = professor::findOrFail($id);
         if(app('request')->input('set') != null)
        $AnswersRating = DB::table('professors')
        ->where('fuzzy_ratings.Prof_ID', $id)
        ->join('fuzzy_ratings', 'professors.id', '=', 'fuzzy_ratings.Prof_ID')
        ->where('fuzzy_ratings.StudentSet',app('request')->input('set'))
        ->avg('fuzzy_ratings.AverageOfAnswers');
        else
        $AnswersRating = DB::table('professors')
        ->where('fuzzy_ratings.Prof_ID', $id)
        ->join('fuzzy_ratings', 'professors.id', '=', 'fuzzy_ratings.Prof_ID')
        ->avg('fuzzy_ratings.AverageOfAnswers');
        $groups = $professor->Groups;
       $surveys = [];
       $avg = 0;
       $count = 0;
         foreach ($groups as $group) {
             if($group->Survey != null)
           $surveys[] = $group->Survey;
           }
           $ansF = [];
       foreach ($surveys as $survey) {
         foreach ($survey->questions as $question ) {
            foreach ($question->Answers as $ans) {
                $avg += $ans->Answer;
                $ansF[] = $ans;
                $count++;
            }
        }
    }
    $FuzzyAverage = 0;
        if ($count!=0) {
            $avg/=$count;
            $FuzzyAverage = $professor->Fuzzy($ansF);


        }
    
       return view('AverageForProfessor',compact('avg','surveys','professor','AnswersRating','FuzzyAverage'));
    }
    public function add()
    {
        return view('add');
    }
    public function viewall()
    {
        $professors = professor::orderBy('id', 'DESC')->get()->all();
        return view('viewall',compact('professors'));
    }
    public function profile($id)
    {
        $professor = professor::findOrFail($id);

        $BestStudents = fuzzy_rating::where('Prof_id',$id)
        ->where(function($q){
            $q->where('StudentSet',5)
            ->orWhere('StudentSet',4);
        })
        ->avg('AverageOfAnswers');
        $GoodStudents = fuzzy_rating::where('Prof_id',$id)
        ->where(function($q){
            $q->where('StudentSet',3);
        })
        ->avg('AverageOfAnswers');
        $WeakStudents = fuzzy_rating::where('Prof_id',$id)
        ->where(function($q){
            $q->where('StudentSet',2)
            ->orWhere('StudentSet',1);
        })
        ->avg('AverageOfAnswers');
       $BestStudents = round($BestStudents,2);
        $BestStudentsMessage = "";
        $BColor = "";
        if($BestStudents >= 1 && $BestStudents < 3)
        {
            $BestStudentsMessage = "The excellent students are not happy at all with you as a professor,
             you've to work more with them, overall they have rate you {$BestStudents}/5";
             $BColor = "bg-danger";
        }
        else if ($BestStudents >= 3 && $BestStudents <4 ) {
            $BestStudentsMessage = "The excellent students are just fine with,
             you've to work more with them, overall they have rate you {$BestStudents}/5";
             $BColor = "bg-warning";

        }
        else if($BestStudents >= 4 && $BestStudents <= 5){
            $BestStudentsMessage = "Relationship with the excellent students is really good,
             keep the good work, overall they have rate you {$BestStudents}/5";
             $BColor = "bg-success";
        }
        else {
            $BestStudentsMessage = "No information on excellent students, this might be because the
            excellent students haven't yet complete any of their surveys";
        }
        $GoodStudents = round($GoodStudents,2);
        $GoodStudentsmessage = "";
        $GColor = "";
        
        if($GoodStudents >= 1 && $GoodStudents < 3)
        {
            $GoodStudentsmessage = "The good students are not happy at all with you as a professor,
            you've to work more with them, overall they have rate you {$GoodStudents}/5";
            $GColor = "bg-danger";
            
        }
        else if ($GoodStudents >= 3 && $GoodStudents <4 ) {
            $GoodStudentsmessage = "The good students are just fine with you,
            it would be better if you work more with them, overall they have rate you {$GoodStudents}/5";
            $GColor = "bg-warning";
            
        }
        else if($GoodStudents >= 4 && $GoodStudents <= 5){
            $GoodStudentsmessage = "Relationship with the good students is really good,
            keep the good work, overall they have rate you {$GoodStudents}/5";
            $GColor = "bg-success";
            
        }
        else {
            $GoodStudentsmessage = "No information on good students, this might be because the
            good students haven't yet complete any of their surveys";
        }
        $WeakStudents =round($WeakStudents,2);
        $WeakStudentsmessage = "";
        $WColor = "";
        if($WeakStudents >= 1 && $WeakStudents < 3)
        {
                $WeakStudentsmessage = "The weak students are not happy at all with you as a professor,
                you've to work more with them, overall they have rate you {$WeakStudents}/5";
                $WColor = "bg-warning";
            }
            else if ($WeakStudents >= 3 && $WeakStudents <4 ) {
                $WeakStudentsmessage = "The weak students are just fine with you,
                it would be better if you work more with them, overall they have rate you {$WeakStudents}/5";
                $WColor = "bg-warning";
            }
            else if($WeakStudents >= 4 && $WeakStudents <= 5){
                $WeakStudentsmessage = "Relationship with the good students is really good,
                keep the good work, overall they have rate you {$WeakStudents}/5";
                $WColor = "bg-success";
        }
        else {
            $WeakStudentsmessage = "No information on weak students, this might be because the
             weak students haven't yet complete any of their surveys";
        }

        return view('profile',compact('BestStudentsMessage','GoodStudentsmessage','WeakStudentsmessage','WeakStudents','GoodStudents','BestStudents','BColor','GColor','WColor'));
    }
}
