<?php

namespace App\Http\Controllers;
use App\survey;
use App\question;
use Illuminate\Http\Request;
use App\isCompleted;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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
        $exist = isCompleted::where('User_ID','=',Auth::id())->where('Survey_ID','=',$id)->get();
        if (!$exist->isEmpty()) {
            abort(403);
        }
       $surveys = DB::table('users')
        ->where('users.id', '=', Auth::id())
        ->join('group_user', 'users.id', '=', 'group_user.User_ID')
        ->join('groups', 'group_user.Group_ID', '=', 'groups.id')
        ->join('surveys', 'groups.id', '=', 'surveys.Group_ID')
        ->select('surveys.id')
        ->get();
        
        $plucked = $surveys->pluck('id');
        if(!in_array($id,$plucked->toArray()))
        {
            abort(403);
        }
        $questions = question::where('Survey_ID',$id)->orderBy('id')->paginate(100);
        $sr =$questions[0]->Survey;
        $sr = $sr->Group;
        return view('question',compact('questions','sr','id'));
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
    public function update(Request $request, question $question,$id)
    {
        $ids = request()->validate(['id' => 'required']);
        $data = request()->validate(['question' => 'required']);
        $a = count($request->id);
        for ($i=0; $i < $a; $i++) {
            question::findOrFail($ids['id'][$i])->update(['question' => $data['question'][$i]]);
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(question $question,$id)
    { 
         question::findOrFail($id)->delete();
         return back();
    }
    public function addQuestions($id)
    {
        $questions = request()->validate(['question' => 'required']);
        foreach ($questions['question'] as $question) {
            question::create(['Survey_ID' => $id, 'question' => $question]);
      }

        return back();
    }
}
