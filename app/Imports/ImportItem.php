<?php

namespace App\Imports;

use App\Models\Item;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportItem implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    public function model(array $row)
    {
        if ($row[0] != 0) {
            return new Item([
                'car_category_id' =>  $row[0],
                'car_model_id' =>  $row[1],
                'category_id' =>  $row[2],
                'name' => $row[3],
                'source' => $row[4],
                'count1' => $row[5],
                'count2' => $row[6],
                'price1' => $row[7],
                'price2' => $row[8],
                'img' => $row[9],
                'oem' => $row[10],
            ]);
        }
    }
}
