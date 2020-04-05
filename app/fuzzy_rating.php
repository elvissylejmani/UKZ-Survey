<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fuzzy_rating extends Model
{
    protected $fillable = ['AverageOfAnswers','StudentSet','Prof_ID'];
    public function Set()
    {
        return $this->belongsTo(fuzzySet::class,'StudentSet','id');
    }
}
