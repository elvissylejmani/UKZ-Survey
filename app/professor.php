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

    public function Fuzzy($ans)
    {
        $ansValues = 0;
        $i = count($ans);
        foreach($ans as $an)
        {
            if ($an->StudentSet == 1) {
                $i--;
            }
            elseif ($an->StudentSet == 2) {
                $i--;
            }
            elseif ($an->StudentSet == 3) {
                if ($an->Answer == 1)
                $ansValues += $an->Answer - 0.035;
                elseif($an->Answer == 2)
                $ansValues += $an->Answer - 0.025;
                elseif($an->Answer == 3)
                $ansValues += $an->Answer;
                elseif($an->Answer == 4)
                $ansValues += $an->Answer + 0.025;
                else
                $ansValues = $an->Answer + 0.035;
            }
            elseif ($an->StudentSet == 4) {
                if ($an->Answer == 1)
                $ansValues += $an->Answer - 0.045;
                elseif($an->Answer == 2)
                $ansValues += $an->Answer - 0.035;
                elseif($an->Answer == 3)
                $ansValues += $an->Answer;
                elseif($an->Answer == 4)
                $ansValues += $an->Answer + 0.035;
                else
                $ansValues += $an->Answer + 0.045;
            }
            else{
                if ($an->Answer == 1)
                $ansValues += $an->Answer - 0.09;
                elseif($an->Answer == 2)
                $ansValues += $an->Answer - 0.05;
                elseif($an->Answer == 3)
                $ansValues += $an->Answer;
                elseif($an->Answer == 4)
                $ansValues += $an->Answer + 0.05;
                else
                $ansValues += $an->Answer + 0.09;
            }
        }
        // dd($ansValues/$i);
        return $ansValues/$i;
    }
}
