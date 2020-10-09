<?php

namespace App\Http\Controllers;

use App\Answer;
use App\question;
use Illuminate\Support\Facades\Auth;
use App\isCompleted;
use App\survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Prof_ID = request()->validate(['Prof_ID' => 'required']);
        
        $id = request()->validate(['id' => 'required']); 
        $ans = request()->validate(['Answer' => 'required']); 
        $qid = request()->validate(['Question_ID' => 'required']); 
        $set = Auth::user()->InsertFuzzyData($ans,$qid,$Prof_ID);
        for ($i=0; $i <= sizeof($ans['Answer'])-1; $i++) { 
            Answer::create(['Answer' =>$ans['Answer'][$i],'Question_ID' => $qid['Question_ID'][$i],'StudentSet'=> $set]);
        }
     
        isCompleted::create(['Survey_ID' => $id['id'],'User_ID' => Auth::id()]);
        return redirect('/')->with('alert','Faleminderit per vlersimin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function show(Answer $answer, $id)
    {
          $sur = survey::findOrFail($id);     
          $gr = $sur->Group;        
          $questions = $sur->Questions;
          $avg = 0;
          $count = 0;
         foreach ( $questions as $question ) {
            foreach ($question->Answers as $ans) {
                $avg += $ans->Answer;
                $count++;
            }
        }
        if ($count!=0) {
            $avg/=$count;
        }
      
        return view('Answers',compact('questions','sur','gr','avg'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit(Answer $answer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Answer $answer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answer $answer)
    {
        //
    }
}
