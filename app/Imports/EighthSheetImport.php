<?php
namespace App\Imports;

use App\fuzzySet;
use Maatwebsite\Excel\Concerns\ToModel;

class EighthSheetImport implements ToModel
{
    public function model(array $rows)
    {
        return new fuzzySet([
            'Set' => $rows[0]
        ]);
    }
}


    


?>