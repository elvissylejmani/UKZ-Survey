<?php

namespace App\Http\Controllers;

use App\Groups;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;
use App\classe;


class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = classe::all();
        $Groups = Groups::orderBy('id', 'DESC')->get()->all();
        return view('Groups',compact('Groups','classes'));
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
        Groups::create(['Name' => $group,'Class_ID' => $id]);

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
        $Group = Groups::findOrFail($id);
        $classes = classe::all();
        return view('EditGroup',compact('Group','classes'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
            Groups::findOrFail($id)->update($update);
            return back();
        }
        else {
        $update = ['Name' => $Name];
        Groups::findOrFail($id)->update($update);
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
        Groups::findOrFail($id)->delete();
        return back();
    }
}
