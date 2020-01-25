<?php
namespace App\Imports;

use App\type;
use Maatwebsite\Excel\Concerns\ToModel;

class ThirdSheetImport implements ToModel
{
    public function model(array $rows)
    {
        return new type([
            'type' => $rows[0]
        ]);
    }
}


    


?>