<?php

namespace App\Http\Controllers;

use App\group;
use App\professor;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;
use App\classe;
use App\User;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //  $classes = classe::all();
        //$Professors = professor::all();
        // ,compact('Groups','classes','Professors')
        //$Groups = group::orderBy('id', 'DESC')->get()->all();
        return view('Groups');
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
        $group = $request->input('Name1'); 
        $id = $request->input('Class_ID'); 
        $Prof_Id = $request->input('Prof_ID'); 
        $Type = $request->input('Type'); 
        group::create(['Name' => $group,'Class_ID' => $id,'Prof_ID' => $Prof_Id,'type' => $Type]);

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
        // $Group = group::findOrFail($id);
        // $classes = classe::all();
        // $Users = User::all();
        // $grupuser = [];
        // foreach ($Group->Students as $stud) {
        //     $grupuser[] = $stud->id;
        // }
        //,compact('Group','classes','Users','grupuser')
        return view('EditGroup');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $stud = User::findOrFail($request->input('stud'));
        group::findOrFail($id)->Students()->attach($stud);
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
        $Name = $request->input('Name');
        if($request->has('Class_ID'))
        {
            $Class_ID = $request->input('Class_ID');
            $update = ['Name' =>$Name,'Class_ID' => $Class_ID];
            group::findOrFail($id)->update($update);
            return back();
        }
        else {
        $update = ['Name' => $Name];
        group::findOrFail($id)->update($update);
        return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        group::findOrFail($id)->delete();
        return back();
    }
    public function add()
    {
         $classes = classe::all();
        $Professors = professor::all();
        
        return view('addgroup',compact('classes','Professors'));
    }
    public function viewall()
    {
        return view('viewallGroups');
    }
}
