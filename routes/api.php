<?php

use App\Models\CarModel;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post("/getModels", function (Request $request) {
    return CarModel::where('car_category_id', $request->id)->get();
})->name('getModels');


Route::get('del-cart/{id}', function ($id) {
    $cart = Cart::findOrFail($id);
    $cart->delete();
});
Route::POST('inc-cart/{id}', function (Request $request, $id) {
    $cart = Cart::findOrFail($id);
    $cart->update([
        'count' => $request->count
    ]);
});
