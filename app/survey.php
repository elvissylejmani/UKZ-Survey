<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class survey extends Model
{
    public function questions()
    {
        $this->hasMany(question::class,'question_id');
    }
}
