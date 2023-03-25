<?php

namespace App\Imports;

use App\Models\CarCategory;
use Maatwebsite\Excel\Concerns\ToModel;

class importCars implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new CarCategory([
            'name' => $row[0]
        ]);
    }
}
