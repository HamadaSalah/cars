<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'car_category_id',
        'car_model_id',
        'name',
        'count1',
        'count2',
        'source',
        'price1',
        'price2',
        'img',
        'category_id',
        'oem',
        'year'
    ];

    public function carCategory()
    {
        return $this->belongsTo(CarCategory::class);
    }

    public function carModel()
    {
        return $this->belongsTo(CarModel::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
