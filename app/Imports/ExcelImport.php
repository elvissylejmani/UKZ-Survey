<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ExcelImport implements WithMultipleSheets
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
   
    public function sheets(): array
    {
        return [
           0 => new FirstSheetImport(),
           1 => new SecondSheetImport(),
           2 => new ThirdSheetImport(),
           3 => new ForthSheetImport(),
           4 => new FifthSheetImport(),
        ];
    }
}
