<?php
namespace App\Imports;

use App\group;
use Maatwebsite\Excel\Concerns\ToModel;

class SeventhSheetImport implements ToModel
{
    public function model(array $rows)
    {
        return new group([
            'Name' => $rows[0],
            'Class_ID' => $rows[1],
            'Prof_ID' => $rows[2]
        ]);
    }
}


    


?>