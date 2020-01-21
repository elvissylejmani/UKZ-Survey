<?php

namespace App\Http\Controllers;

use App\Imports\ExcelImport;
use App\Imports\ExelImport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
class ExcelController extends Controller
{
    public function import(Request $request)
    {
        Excel::import(new ExcelImport,$request->file('import_file'));
        return back();
    }
}
