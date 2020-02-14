<?php
namespace App\Imports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;


class SixthSheetImport implements ToModel
{
    public function model(array $rows)
    {
            DB::table('classe_user')->insert(
                [
                    'classe_id' => $rows[0],
                    'user_id' => $rows[1],
                ]
                );
            }
}


    


?>