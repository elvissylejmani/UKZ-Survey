<?php

namespace App\Http\Controllers;

use App\survey;
use App\group;
use App\question;
use App\isCompleted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $surveys = DB::table('users')
        ->where('users.id', '=', Auth::id())
        ->join('group_user', 'users.id', '=', 'group_user.User_ID')
        ->join('groups', 'group_user.Group_ID', '=', 'groups.id')
        ->join('surveys', 'groups.id', '=', 'surveys.Group_ID')
        ->select('surveys.SurveyTitle','surveys.id')
        ->get();
        $a = count($surveys);
        for($i = 0;$i < $a;$i++){
            $exist = isCompleted::where('User_ID','=',Auth::id())->where('Survey_ID','=',$surveys[$i]->id)->get();
            if (!$exist->isEmpty()) {
                  unset($surveys[$i]);
            }
        }
        return view('Surveys',compact('surveys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return $p[0]['group']->Professor;
        $groups = group::doesnthave('survey')->get();

        // $surveys = survey::orderBy('id', 'DESC')->get()->all();
        $surveys = survey::orderBy('id', 'DESC')->with('group')->get()->all();
        // return $surveys[0]['group']->class->Name;
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
        $questions = request()->validate(['question' => 'required']);
        foreach ($Group_IDs['Group_ID'] as $Group_ID ) {
       $id = survey::create(['SurveyTitle' => $vl['SurveyTitle'], 'Group_ID' => $Group_ID]);
            foreach ($questions['question'] as $question) {
                  question::create(['Survey_ID' => $id['id'], 'question' => $question]);
            }
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function destroy(survey $survey, $id)
    {
        survey::findOrFail($id)->delete();
        return back();
        
    }
    public function ManageSurveys()
    {
        return view('ManageSurvey');
    }
    public function ShowSurvey()
    {
        return view('ShowSurvey');
    }
}
