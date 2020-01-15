<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class group extends Model
{
    protected $fillable = ['Name','Prof_ID'];
    public function Professor()
    {
        return $this->belongsTo(professor::class,'id');
    }
    public function Students()
    {
        return $this->belongsToMany(User::class);
    }
}
