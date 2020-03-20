<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class group extends Model
{
    protected $fillable = ['Name','Prof_ID','Class_ID','type'];
    public function Professor()
    {
        return $this->belongsTo(professor::class,'Prof_ID','id');
    }
    public function Students()
    {
        return $this->belongsToMany(User::class);
    }
    public function class()
    {
        return $this->belongsTo(classe::class, 'Class_ID','id');
    }
    public function Survey()
    {
        return $this->hasOne(survey::class,'Group_ID','id');
    }
}
