<?php

namespace Database\Seeders;

use App\Models\Admin;
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
    }
}
