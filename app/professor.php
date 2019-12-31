<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class professor extends Model
{
    protected $guarded = [];
    public function Classes()
    {
        return $this->belongsToMany(classe::class);
    }
    public function Roles()
    {
        return $this->hasMany(Roles::class,'Prof_ID');
    }
    public function Status()
    {
        return $this->hasOne(Status::class,'Prof_ID');
    }
}
