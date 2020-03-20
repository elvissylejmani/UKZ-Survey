<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\question;
use App\survey;
class AddQuestion extends Controller
{
    //
    public function index($id)
    {
    $questions = survey::findOrFail($id)->questions;
      return view('AddQuestions',compact('id','questions'));
    }
}
