<?php
namespace App\Imports;

use App\StudentData;
use Maatwebsite\Excel\Concerns\ToModel;

class FifthSheetImport implements ToModel
{
    public function model(array $rows)
    {
        return new StudentData([
            'Stud_ID' => $rows[0],
            'Year' => $rows[1],
            'Average' => $rows[2],
            'ExamsPassed' => $rows[3]
        ]);
    }
}


    


?>