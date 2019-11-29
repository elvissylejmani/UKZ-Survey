<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\question;

class survey extends Model
{
    public function questions()
    {
        return $this->hasMany(question::class,'Survey_ID');
    }
}
