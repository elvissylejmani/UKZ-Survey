<?php

namespace App\Http\Controllers;

use App\question;
use Illuminate\Http\Request;
use App\Answer;
use Illuminate\Support\Arr;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "hello";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return "hello";
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
        for ($i=0; $i <= count($ans); $i++) { 
            Answer::create(['Answer' =>$ans['Answer'][$i],'Question_ID' => $qid['Question_ID'][$i]]);
        }
        
        //dd($vls);
        // dd($vls['Answer']);
        // foreach ($vls as $vl) {
        //    dd($vl);
        // }
      
       
        // foreach ($vls as $vl ) {
        //     foreach ($vl as $v ) {
        //         echo $v;
        //     }
        // }
//        return $vl;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(question $question,$id)
    {
         $questions = question::where('Survey_ID',$id)->orderBy('id')->paginate(100);
        return view('question',compact('questions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(question $question)
    {
        return "hello";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, question $question)
    {
        return "hello";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(question $question)
    {
        return "hello";
    }
}
