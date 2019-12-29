<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class classe extends Model
{
    protected $fillable = ['Name', 'Professor_ID'];
    public function Professor()
    {
        return $this->belongsTo(professor::class,'Professor_ID');
    }
}
