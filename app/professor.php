<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\survey;
use App\group;

class professor extends Model
{
    protected $fillable = ['Name','LastName'];
    public function Groups()
    {
        return $this->hasMany(group::class,'Prof_ID');
    }
    public function Survey()
    {
        return $this->hasManyThrough(survey::class,group::class,'Prof_ID','Group_ID','id','id');
    }
}
