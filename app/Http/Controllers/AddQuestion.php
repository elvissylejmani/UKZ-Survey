<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\question;

class AddQuestion extends Controller
{
    //
    public function index($id)
    {
      return view('AddQuestions',compact('id'));
    }
}
