<?php

namespace App\Imports;

use App\Models\Asset;
use App\Models\Purchase;
use Maatwebsite\Excel\Concerns\ToModel;

class AssetImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $date = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[7]);
        $data = [
            'date' => $date,
            'manufactorer_id' => $row[8],
            'serial' => $row[9],
            'model_id' => $row[10],
            'warranty' => $row[11],
            'supplier_id' => $row[12],
        ];
        $purchase = Purchase::create($data);

        $asset = new Asset([
                    'code' => $row[0],
                    'location_id' => $row[1],
                    'name' => $row[2],
                    'category_id' => $row[3],
                    'condition' => $row[4],
                    'price' => $row[5],
                    'note' => $row[6],
                    'purchase_id' => $purchase->id,
                ]);
        
        return $asset;
    }
}
