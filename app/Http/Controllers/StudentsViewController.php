<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentsViewController extends Controller
{
    public function viewall()
    {
        return view('ViewUsers');
    }
    public function add()
    {
        return view('addUserView');
    }
}
