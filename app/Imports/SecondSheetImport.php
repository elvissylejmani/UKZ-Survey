<?php
namespace App\Imports;

use App\professor;
use Maatwebsite\Excel\Concerns\ToModel;

class SecondSheetImport implements ToModel
{
    public function model(array $rows)
    {
        return new professor([
            'Name' => $rows[0],
            'LastName' => $rows[1]
        ]);
    }
}


    


?>