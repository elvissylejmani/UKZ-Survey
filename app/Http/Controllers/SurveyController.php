<?php

namespace App\Http\Controllers;

use App\survey;
use App\group;
use App\question;
use App\isCompleted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\fuzzy_rating;
use App\professor;

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
        ->join('classes','groups.Class_ID','=','classes.id')
        ->join('professors','groups.Prof_ID','=','professors.id')
        ->select('surveys.SurveyTitle','surveys.id','classes.Name as Class_Name','professors.Name as Professor_Name','professors.Lastname','groups.Name')
        ->get();
        // return $surveys;
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
            $Prof_ID = DB::table('groups')
            ->where('groups.id', '=', $Group_ID)
            ->join('professors', 'groups.Prof_ID', '=', 'professors.id')
            ->select('professors.id')->get();
            fuzzy_rating::firstOrCreate(['rating' => 0,'answers' => 0, 'students' => 0, 'Prof_ID' => $Prof_ID[0]->id]);
        }
        return redirect('/Survey/create')->with('alert','Pyetesori u krijua me sukses');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $survey = survey::findOrFail($id);
        return view('editSurvey',compact('survey'));
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
    public function update(Request $request, survey $survey,$id)
    {
        $data = request()->validate(['SurveyTitle' => 'required']);
        survey::findOrFail($id)->update($data);
        return back();
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
        $surveys = Survey::OrderBy('id','desc')->get();
        return view('ShowSurvey', compact('surveys'));
    }
}
