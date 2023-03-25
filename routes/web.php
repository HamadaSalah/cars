<?php

use App\Http\Controllers\Auth\LoginController;
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

Route::middleware(['auth', 'web'])->group(function () {
    Route::get('/', function () {
        $cars = CarCategory::all();
        return view('welcome', compact('cars'));
    })->name('home');
    Route::get("serachByName", [HomeController::class, 'serachByName'])->name('serachByName');
    Route::get("SeaechSteps", [HomeController::class, 'SeaechSteps'])->name('SeaechSteps');
    Route::POST("addToCart/{id}", [HomeController::class, 'addToCart'])->name('addToCart');
    Route::get("cart", [HomeController::class, 'cart'])->name('cart');
    Route::get("convertToShow", [HomeController::class, 'convertToShow'])->name('convertToShow');
    Route::get("convertToShowGet/{id}", [HomeController::class, 'convertToShowGet'])->name('convertToShowGet');
    Route::get("convertToFatorah/{id}", [HomeController::class, 'convertToFatorah'])->name('convertToFatorah');
    Route::get("fawater", [HomeController::class, 'fawater'])->name('fawater');
    Route::get("pricelist", [HomeController::class, 'pricelist'])->name('pricelist');
    Route::get("pricelist/{id}", [HomeController::class, 'pricelistget'])->name('pricelistget');
    Route::get("editfatorah/{id}", [HomeController::class, 'editfatorah'])->name('editfatorah');
    Route::get("gard", [HomeController::class, 'gard'])->name('gard');
});
// Auth::routes();
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
