<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\survey;
use App\group;

class professor extends Model
{
    protected $fillable = ['Name','LastName'];
    public function Groups()
    {
        return $this->hasMany(group::class,'Prof_ID');
    }
    public function Survey()
    {
        return $this->hasManyThrough(survey::class,group::class,'Prof_ID','Group_ID','id','id');
    }
    public function FuzzyRating()
    {
        return $this->hasMany(fuzzy_rating::class,'Prof_ID','id');
    }

    public function Fuzzy($ans,$count)
    {
        $ansValues = 0;
        // dd($ans);
        $i = 0;
        foreach($ans as $an)
        {
            if ($an->StudentSet == 1) {
                $count--;
            }
            elseif ($an->StudentSet == 2) {
                $count--;
            }
            elseif ($an->StudentSet == 3) {
                if ($an->Answer == 1)
                $ansValues =$ansValues + $an->Answer - 0.035;
                elseif($an->Answer == 2)
                $ansValues = $ansValues + $an->Answer - 0.025;
                elseif($an->Answer == 3)
                $ansValues = $ansValues + $an->Answer;
                elseif($an->Answer == 4)
                $ansValues = $ansValues + $an->Answer + 0.025;
                else
                $ansValues = $ansValues + $an->Answer+ 0.035;
            }
            elseif ($an->StudentSet == 4) {
                if ($an->Answer == 1)
                $ansValues = $ansValues + $an->Answer - 0.045;
                elseif($an->Answer == 2)
                $ansValues = $ansValues + $an->Answer - 0.035;
                elseif($an->Answer == 3)
                $ansValues = $ansValues + $an->Answer;
                elseif($an->Answer == 4)
                $ansValues = $ansValues + $an->Answer + 0.035;
                else
                $ansValues = $ansValues + $an->Answer + 0.045;
            }
            else{
                if ($an->Answer == 1)
                $ansValues = $ansValues + $an->Answer - 0.09;
                elseif($an->Answer == 2)
                $ansValues = $ansValues + $an->Answer - 0.05;
                elseif($an->Answer == 3)
                $ansValues = $ansValues + $an->Answer;
                elseif($an->Answer == 4)
                $ansValues = $ansValues + $an->Answer + 0.05;
                else
                $ansValues = $ansValues + $an->Answer + 0.09;
            }
            $i++;
        }
        // dd($i);
        // dd($ansValues/$count);
        return $ansValues/$count;
    }
}
