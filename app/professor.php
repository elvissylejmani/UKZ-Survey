<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class professor extends Model
{
    protected $guarded = [];
    public function Classes()
    {
        return $this->hasMany(classe::class,'Professor_ID');
    }
    
}
