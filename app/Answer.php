<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    //
    protected $fillable = ['Question_ID','Answer'];

    public function Question()
    {
        return $this->belongsTo(question::class,'Question_ID');
    }
}
