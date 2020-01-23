<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\question;

class survey extends Model
{
    protected $fillable = ['SurveyTitle','Group_ID'];
    public function questions()
    {
        return $this->hasMany(question::class,'Survey_ID');
    }
    public function Groups()
    {
        return $this->hasMany(group::class,'Group_ID','id');
    }
}
