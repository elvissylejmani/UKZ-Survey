<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\professor;
use App\classe;
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

       foreach ($surveys as $survey) {
         foreach ($survey->questions as $question ) {
            foreach ($question->Answers as $ans) {
                $avg += $ans->Answer;
                $count++;
            }
        }
    }
        if ($count!=0) {
            $avg/=$count;
        }
    
       return view('AverageForProfessor',compact('avg','surveys','professor','AnswersRating'));
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
}
