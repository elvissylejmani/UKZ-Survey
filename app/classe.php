<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class classe extends Model
{
    protected $guarded = [];
    
    public function Professor()
    {
        return $this->belongsTo(professor::class,'Professor_ID');
    }
}
