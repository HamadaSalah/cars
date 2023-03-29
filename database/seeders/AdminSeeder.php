<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\CarModelModel;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('elsaad1333')
        ]);
        Category::create([
            'name' => 'بودي'
        ]);
        Category::create([
            'name' => 'اضاءه'
        ]);
        Category::create([
            'name' => 'ميكانيك'
        ]);
        Category::create([
            'name' => 'روديترات'
        ]);
        Category::create([
            'name' => 'زجاج'
        ]);
        Category::create([
            'name' => 'جنطات'
        ]);
        CarModelModel::create([
            'name' => 'Hybrid LE',
            'car_model_id' => 1
        ]);
        CarModelModel::create([
            'name' => 'Hybrid SE',
            'car_model_id' => 1
        ]);
        CarModelModel::create([
            'name' => 'Hybrid XLE',
            'car_model_id' => 1
        ]);
        CarModelModel::create([
            'name' => 'Gas LE',
            'car_model_id' => 1
        ]);
        CarModelModel::create([
            'name' => 'Gas SE',
            'car_model_id' => 1
        ]);
        CarModelModel::create([
            'name' => 'Gas XLE',
            'car_model_id' => 1
        ]);
        CarModelModel::create([
            'name' => 'Gas XSE',
            'car_model_id' => 1
        ]);

        //corola

        CarModelModel::create([
            'name' => 'Hybrid LE',
            'car_model_id' => 2
        ]);
        CarModelModel::create([
            'name' => 'Hybrid XLE',
            'car_model_id' => 2
        ]);
        CarModelModel::create([
            'name' => 'GAS XLE',
            'car_model_id' => 2
        ]);
        CarModelModel::create([
            'name' => 'GAS XLE',
            'car_model_id' => 2
        ]);
        CarModelModel::create([
            'name' => 'خليجي',
            'car_model_id' => 2
        ]);

        //hlinder
        CarModelModel::create([
            'name' => 'Hybrid LE',
            'car_model_id' => 5
        ]);
        CarModelModel::create([
            'name' => 'Hybrid SE',
            'car_model_id' => 5
        ]);
        CarModelModel::create([
            'name' => 'Hybrid XSE',
            'car_model_id' => 5
        ]);
        CarModelModel::create([
            'name' => 'Hybrid XLE',
            'car_model_id' => 5
        ]);
        //Rafford
        CarModelModel::create([
            'name' => 'Hybrid',
            'car_model_id' => 8
        ]);
        CarModelModel::create([
            'name' => 'Electric',
            'car_model_id' => 8
        ]);
        //Cona
        CarModelModel::create([
            'name' => 'Hybrid',
            'car_model_id' => 10
        ]);
        CarModelModel::create([
            'name' => 'Electric',
            'car_model_id' => 10
        ]);
        CarModelModel::create([
            'name' => 'Hybrid',
            'car_model_id' => 20
        ]);
        CarModelModel::create([
            'name' => 'Electric',
            'car_model_id' => 20
        ]);
    }
}
