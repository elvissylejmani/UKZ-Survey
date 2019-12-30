<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\professor;
use App\classe;
class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$stud->Classes()->attach($class); // per lidhjen e studentave me klaset
        $professors = professor::orderBy('id', 'DESC')->get()->all();
        return view('Professors',compact('professors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $professor = request()->validate(['Name' => 'required', 'LastName' => 'required']);
        professor::create($professor);
        return redirect('/Professor')->with('alert','Profesori u Shtua me sukses');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $classes = classe::all();
        $professor = professor::findOrFail($id);
      $profclasses= [];
      foreach ($professor->Classes as $class) {
         $profclasses[] = $class->Name;
      }
        return view('editprof', compact('professor','classes','profclasses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = request()->validate(['prof' => 'required']);
        $cid = request()->validate(['class' => 'required']);
        $professor = professor::findOrFail($id['prof']);
        $class = classe::findOrFail($cid['class']);
        $professor->Classes()->attach($class);
        $class->Professors()->attach($professor);

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
        $professor = request()->validate(['Name' => 'required', 'LastName' => 'required']);
        professor::findOrFail($id)->update($professor);
        return redirect('/Professor/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $professor = professor::findOrFail($id);
        $professor->delete();
        return back();
    }
}
