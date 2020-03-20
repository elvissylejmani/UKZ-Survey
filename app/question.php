<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    protected $fillable = ['Survey_ID','question'];
    public function Answers()
    {
        return $this->hasMany(Answer::class,'Question_ID');
    }
    public function Survey()
    {
        return $this->belongsTo(survey::class,'Survey_ID');
    }
}
