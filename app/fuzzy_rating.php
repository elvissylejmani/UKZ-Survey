<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fuzzy_rating extends Model
{
    protected $fillable = ['rating','answers','students','Prof_ID'];
}
