<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class classe extends Model
{
    protected $guarded = [];
    
    public function Professor()
    {
        return $this->belongsToMany(professor::class);
    }
    public function Students()
    {
        return $this->belongsToMany(User::class);
    }
}
