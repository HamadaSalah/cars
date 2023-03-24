<?php

use App\Http\Controllers\Admin\CalenderController;
use App\Http\Controllers\Admin\ClassController;
use App\Http\Controllers\Admin\EventGallController;
use App\Http\Controllers\Admin\EventsController;
use App\Http\Controllers\Admin\FacilController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\PolicesController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\ReachUsController;
use App\Http\Controllers\Admin\VideosController;
use App\Http\Controllers\Admin\WelcomeController;
use App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/

Route::prefix('admin')->middleware('guest:admin')->name('admin.')->group(function () {
    Route::get('/login', [LoginController::class, 'getLogin'])->name('doLogin');
    Route::post('/login', [LoginController::class, 'doLogin'])->name('login');
});
Route::prefix('admin')->middleware('auth:admin')->name('admin.')->group(function () {
    Route::get('/index', [LoginController::class, 'index'])->name('index');
    Route::resource('/products', ProductsController::class);
});
