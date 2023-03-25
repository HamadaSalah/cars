<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\CarCategory;
use App\Models\CarModel;
use App\Models\Category;
use App\Models\Item;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'user',
            'email' => 'user@user.com',
            'password' => bcrypt('12332100')
        ]);
        CarCategory::create([
            'name' => 'تويوتا'
        ]);
        CarCategory::create([
            'name' => 'هيونداي'
        ]);
        CarCategory::create([
            'name' => 'هوندا'
        ]);
        CarCategory::create([
            'name' => 'فورد'
        ]);
        CarCategory::create([
            'name' => 'كيا'
        ]);
        CarCategory::create([
            'name' => 'نيسان'
        ]);
        CarCategory::create([
            'name' => 'شيفروليه'
        ]);
        CarCategory::create([
            'name' => 'تسلا'
        ]);
        CarCategory::create([
            'name' => 'جيب'
        ]);
        CarCategory::create([
            'name' => 'دوج'
        ]);
        /////////////////////
        CarModel::create([
            'name' => 'اوبتما',
            'car_category_id' => '5',
        ]);
        CarModel::create([
            'name' => 'سبورتيج',
            'car_category_id' => '5',
        ]);
        CarModel::create([
            'name' => 'ريو',
            'car_category_id' => '5',
        ]);
        CarModel::create([
            'name' => 'سول',
            'car_category_id' => '5',
        ]);
        CarModel::create([
            'name' => 'سورينتو',
            'car_category_id' => '5',
        ]);
        CarModel::create([
            'name' => 'التيما',
            'car_category_id' => '6',
        ]);
        CarModel::create([
            'name' => 'روج',
            'car_category_id' => '6',
        ]);
        CarModel::create([
            'name' => 'سنترا',
            'car_category_id' => '6',
        ]);
        CarModel::create([
            'name' => 'فيرسا',
            'car_category_id' => '6',
        ]);
        CarModel::create([
            'name' => 'ليف',
            'car_category_id' => '6',
        ]);
        CarModel::create([
            'name' => 'بولت',
            'car_category_id' => '7',
        ]);
        CarModel::create([
            'name' => 'ماليبو',
            'car_category_id' => '7',
        ]);
        CarModel::create([
            'name' => 'MODEL 3',
            'car_category_id' => '8',
        ]);
        CarModel::create([
            'name' => 'MODEL Y',
            'car_category_id' => '8',
        ]);
        CarModel::create([
            'name' => 'MODEL S',
            'car_category_id' => '8',
        ]);
        CarModel::create([
            'name' => 'MODEL X',
            'car_category_id' => '8',
        ]);
        CarModel::create([
            'name' => 'شيروكي',
            'car_category_id' => '9',
        ]);
        CarModel::create([
            'name' => 'كومبارس',
            'car_category_id' => '9',
        ]);
        CarModel::create([
            'name' => 'رام',
            'car_category_id' => '10',
        ]);
        CarModel::create([
            'name' => 'تشارجر',
            'car_category_id' => '10',
        ]);
        CarModel::create([
            'name' => 'تشالنجر',
            'car_category_id' => '10',
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
        Item::create([
            'name' => 'غطاء محرك',
            'count1' => '10',
            'count2' => '20',
            'source' => 'صيني',
            'price1' => '15',
            'price2' => '20',
            'img' => 'default.png',
            'oem' => '15474517',
            'year' => '2022',
            'car_category_id' => 1,
            'car_model_id' => 1,
            'category_id' => 1,
        ]);
        Item::create([
            'name' => 'لحية طمبون امامي',
            'count1' => '17',
            'count2' => '22',
            'source' => 'تركي',
            'price1' => '22',
            'price2' => '25',
            'img' => 'default.png',
            'oem' => '15474517',
            'year' => '2014',
            'car_category_id' => 2,
            'car_model_id' => 2,
            'category_id' => 2,
        ]);
        Item::create([
            'name' => 'غطاء زرفيل',
            'count1' => '8',
            'count2' => '3',
            'source' => 'تايوان',
            'price1' => '15',
            'price2' => '18',
            'img' => 'default.png',
            'oem' => '14444444',
            'year' => '2014',
            'car_category_id' => 5,
            'car_model_id' => 4,
            'category_id' => 1,
        ]);
    }
}
