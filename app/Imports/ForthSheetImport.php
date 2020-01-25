<?php
namespace App\Imports;

use App\classe;
use Maatwebsite\Excel\Concerns\ToModel;

class ForthSheetImport implements ToModel
{
    public function model(array $rows)
    {
        return new classe([
            'Name' => $rows[0],
            'Type_ID' => $rows[1]
        ]);
    }
}


    


?>