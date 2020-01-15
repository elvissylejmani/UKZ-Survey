<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class professor extends Model
{
    protected $fillable = ['Name','LastName'];
    public function Groups()
    {
        return $this->hasMany(group::class,'Prof_ID');
    }
}
