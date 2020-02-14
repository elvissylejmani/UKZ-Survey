<?php

namespace App\Http\Controllers;

use App\classe;
use Illuminate\Http\Request;
use App\professor;
use App\type;
use App\Groups;
use Illuminate\Support\Facades\Auth;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return classe::first()->Students;
        $Classes = classe::orderby('id','DESC')->get()->all();
        $Types = type::all();
        return view('Classes',compact('Classes','Types'));
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
       $Class = request()->validate(['Name' => 'required', 'Type_ID' => 'required']);
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
        
        
        return view('EditClass',compact('class'));
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
    public function AddStud($id)
    {
        return $id;
    }
}
