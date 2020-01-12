<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class classe extends Model
{
    protected $guarded = [];
    
    // public function Professors()
    // {
    //     return $this->belongsToMany(professor::class);
    // }
    // public function Students()
    // {
    //     return $this->belongsToMany(User::class);
    // }
    // public function Groups()
    // {
    //     return $this->hasMany(Groups::class,'Class_ID');
    // }
}
