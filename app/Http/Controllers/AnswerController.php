<?php

namespace App\Http\Controllers;

use App\Answer;
use App\question;
use App\survey;
use Illuminate\Http\Request;

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
        $ans = request()->validate(['Answer' => 'required']); 
        $qid = request()->validate(['Question_ID' => 'required']); 
        for ($i=0; $i <= sizeof($ans['Answer'])-1; $i++) { 
            Answer::create(['Answer' =>$ans['Answer'][$i],'Question_ID' => $qid['Question_ID'][$i]]);
        }
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
        //  foreach ( $questions as $question ) {
        //    echo $question->Answers[0];
        //  }
        return view('Answers',compact('questions','sur','gr'));

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
