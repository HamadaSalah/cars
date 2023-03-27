<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModelModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'car_category_id',
        'car_model_id'
    ];


    public function carCategory()
    {
        return $this->belongsTo(CarCategory::class);
    }
    public function carModel()
    {
        return $this->belongsTo(CarModel::class);
    }
}
