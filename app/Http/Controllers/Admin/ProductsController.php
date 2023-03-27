<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CarCategory;
use App\Models\CarModel;
use App\Models\CarModelModel;
use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Item::latest()->paginate(20);
        return view('Admin.Products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carCats = CarCategory::all();
        $carModels = CarModel::all();
        $cats = Category::all();
        return view('Admin.Products.create', compact('carCats', 'carModels', 'cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Item::create([
            "name" => $request->name,
            "price1" => $request->price1,
            "price2" => $request->price2,
            "count1" => $request->count1,
            "count2" => $request->count2,
            "source" => $request->source,
            "car_category_id" => $request->car_category_id,
            "car_model_id" => $request->car_model_id,
            "car_model_model_id" => $request->car_model_model_id,
            "category_id" => $request->category_id,
            "oem" => $request->oem,
            "from_year" => $request->from_year,
            "to_year" => $request->to_year,

        ]);
        return redirect()->route('admin.products.index')->with('success', 'تمت الاضافة');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::findOrFail($id);
        $carCats = CarCategory::all();
        $carModels = CarModel::where('car_category_id', $item->car_category_id)->get();
        $carModelss = CarModelModel::where('car_model_id', $carModels[0]->id)->get();
        $cats = Category::all();
        return view('Admin.Products.edit', compact('item', 'carCats', 'carModels', 'carModelss', 'cats'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = Item::findOrFail($id);
        $item->update([
            "name" => $request->name,
            "price1" => $request->price1,
            "price2" => $request->price2,
            "count1" => $request->count1,
            "count2" => $request->count2,
            "source" => $request->source,
            "car_category_id" => $request->car_category_id,
            "car_model_id" => $request->car_model_id,
            "car_model_model_id" => $request->car_model_model_id,
            "category_id" => $request->category_id,
            "oem" => $request->oem,
            "from_year" => $request->from_year,
            "to_year" => $request->to_year,

        ]);
        return redirect()->route('admin.products.index')->with('success', 'تمت التعديل');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();
        return redirect()->back()->with('success', 'تم الحذف');
    }
}
