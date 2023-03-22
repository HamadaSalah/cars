<?php

use App\Http\Controllers\HomeController;
use App\Models\CarCategory;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $cars = CarCategory::all();
    return view('welcome', compact('cars'));
});
Route::post("serachByName", [HomeController::class, 'serachByName'])->name('serachByName');
Route::get("SeaechSteps", [HomeController::class, 'SeaechSteps'])->name('SeaechSteps');
