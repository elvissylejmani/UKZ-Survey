<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class group extends Model
{
    protected $fillable = ['Name','Prof_ID','Class_ID'];
    public function Professor()
    {
        return $this->belongsTo(professor::class,'id');
    }
    public function Students()
    {
        return $this->belongsToMany(User::class);
    }
    public function class()
    {
        return $this->belongsTo(classe::class, 'id');
    }
    public function Survey()
    {
        return $this->belongsTo(survey::class,'Group_ID');
    }
}
