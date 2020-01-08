<?php

namespace App\Http\Controllers;
use App\survey;
use App\question;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
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
        $vls=request()->validate(['question' => 'required']);
        $id =request()->validate(['Survey_ID' => 'required']);
        $question = new question(['Survey_ID' => $id, 'question' => $vls]);
        $survey = survey::findOrFail($id);
        $survey->questions = $question;
        for($i =0; $i < count($vls['question']);$i++) {
                question::create(['Survey_ID' => $survey[0]['id'], 'question' => $vls['question'][$i]]);
            }
        return redirect('/')->with('alert','Pyetejet u shtuan me suksese'); 
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
       if ($question!=null) {
           return "hello";
       }
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
