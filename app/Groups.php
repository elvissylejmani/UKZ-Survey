<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
   protected $fillable = ['Name','Class_ID'];
  public function Class()
  {
      return $this->belongsTo(classe::class);
  }
}
    