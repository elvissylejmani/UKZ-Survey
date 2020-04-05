<?php
namespace App\Imports;

use App\fuzzySet;
use Maatwebsite\Excel\Concerns\ToModel;

class SecondSheetImport implements ToModel
{
    public function model(array $rows)
    {
        return new fuzzySet([
            'Set' => $rows[0]
        ]);
    }
}


    


?>