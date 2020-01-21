<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\question;

class survey extends Model
{
    protected $fillable = ['SurveyTitle'];
    public function questions()
    {
        return $this->hasMany(question::class,'Survey_ID');
    }
    public function Groups()
    {
        return $this->hasMany(group::class,'id');
    }
}
