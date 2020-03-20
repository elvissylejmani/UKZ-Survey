<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class type extends Model
{
    protected $fillable = ['type'];
    public function Classes()
    {
        return $this->hasMany(classe::class,'Type_ID');
    }
}
