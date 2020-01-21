<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class classe extends Model
{
    protected $guarded = [];
    
    public function Type()
    {
        return $this->belongsTo(Type::class,'Type_ID','id');
    }
    public function Groups()
    {
        return $this->hasMany(group::class, 'Class_ID');
    }
}
