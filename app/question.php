<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    //
    public function Answers()
    {
        return $this->hasMany(Answer::class,'Answer_ID');
    }
}
