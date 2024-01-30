<?php

namespace App\Imports;

use App\Models\Location;
use Maatwebsite\Excel\Concerns\ToModel;

class LocationImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $identify = count($row);
        
        if($identify != 3){
            return false;
        }

        return new Location([
            'name' => $row[0],
            'department_id' => $row[1],
            'note' => $row[2],
        ]);
    }
}
