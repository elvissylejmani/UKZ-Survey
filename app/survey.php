<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\question;
use App\group;
use App\professor;

class survey extends Model
{
    protected $fillable = ['SurveyTitle','Group_ID'];
    public function questions()
    {
        return $this->hasMany(question::class,'Survey_ID');
    }
    public function Group()
    {
        return $this->belongsTo(group::class,'Group_ID');
    }
 

}
