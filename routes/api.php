<?php

use App\Imports\ImportCarModel;
use App\Imports\importCars;
use App\Imports\ImportItem;
use App\Models\CarModel;
use App\Models\CarModelModel;
use App\Models\Cart;
use App\Models\Fatorah;
use App\Models\FatorahProduct;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;

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

Route::post("/getModelsModels", function (Request $request) {
    return CarModelModel::where('car_model_id', $request->id)->get();
})->name('getModelsModels');


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
Route::post('cars', function (Request $request) {
    $file = $request->file;
    Excel::import(new importCars, $request->file('file')->store('files'));
});
Route::post('carsmodels', function (Request $request) {
    Excel::import(new ImportCarModel, $request->file('file')->store('files'));
});
Route::post('items', function (Request $request) {
    $data = Excel::import(new ImportItem, $request->file('file')->store('files'));
});

Route::post('changeitemCount', function (Request $request) {
    $request->validate([
        'id' => 'required',
        'count' => 'required',
        'fid' => 'required'
    ]);
    $fatora = FatorahProduct::findOrFail($request->id);
    $fatora->update([
        'count' => $request->count
    ]);
    $item  = Item::findOrfail($request->item);
    $item->update([
        'count1' => $item->count1 + 1
    ]);
})->name("changeitemCount");
