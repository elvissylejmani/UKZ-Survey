<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentData extends Model
{
   protected $fillable = ['Stud_ID','Year','Average','ExamsPassed','Attendance'];
}
