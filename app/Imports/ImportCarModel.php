<?php

namespace App\Imports;

use App\Models\CarModel;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportCarModel implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        if ($row[0] != null) {
            return new CarModel([
                'car_category_id' => $row[0],
                'name' => $row[1]
            ]);
        }
    }
}
