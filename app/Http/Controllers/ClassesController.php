<?php

namespace App\Http\Controllers;

use App\classe;
use Illuminate\Http\Request;
use App\professor;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $Classes = classe::orderby('id','DESC')->get()->all();
        return view('Classes',compact('Classes'));
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
        //
       $Class = request()->validate(['Name' => 'required']);
       classe::create($Class);
       return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $class = classe::findOrFail($id);
        $professor = professor::all();
        $classprof = [];
        foreach ($class->Professors as $prof) {
            $classprof[] = $prof->Name;
        }
        return view('EditClass',compact('class','professor','classprof'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $professor = professor::findOrFail($id);
        $classname = $professor->Classes;
        $class = classe::findOrFail($classname[0]->id);
        $professor->Classes()->detach($class);
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
        classe::findOrFail($id)->update(request()->validate(['Name'=>'required']));
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       classe::findOrFail($id)->delete();
       return back();
    }
    public function addprof($id)
    {
        $pid = request()->validate(['prof' => 'required']);
        $class = classe::findOrFail($id);
        $prof= professor::findOrFail($pid['prof']);
        $class->Professors()->attach($prof);
        return back();
    }
}
