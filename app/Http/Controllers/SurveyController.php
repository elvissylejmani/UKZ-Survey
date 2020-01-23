<?php

namespace App\Http\Controllers;

use App\survey;
use App\group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $surveys = survey::orderBy('id', 'DESC')->get()->all();
        return view('Surveys',compact('surveys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = group::doesnthave('survey')->get();

        $surveys = survey::orderBy('id', 'DESC')->get()->all();
        return view('SurveyCreate',compact('surveys','groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Group_IDs = request()->validate(['Group_ID' => 'required']);
        $vl = request()->validate(['SurveyTitle' => 'required']);
        foreach ($Group_IDs['Group_ID'] as $Group_ID ) {
        survey::create(['SurveyTitle' => $vl['SurveyTitle'], 'Group_ID' => $Group_ID]);
    }
        return redirect('/Survey/create')->with('alert','Pyetesori u krijua me sukses');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function show(survey $survey)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function edit(survey $survey)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, survey $survey)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function destroy(survey $survey)
    {
        //
    }
}
