<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function serachByName(Request $request)
    {
        // $request->validate([
        //     'name' => 'required'
        // ]);

        $search = Item::where('name', 'LIKE', "%{$request->name}%");
        if ($request->oem != null) {
            $search->where('oem', $request->oem);
        }
        $items = $search->get();
        return view('searchByName', compact('items'));
    }

    public function SeaechSteps(Request $request)
    {
        $products = Item::where('id', '!=', 0);
        if ($request->year) {
            $products = $products->where('year', $request->year);
        }
        if ($request->carcat) {
            $products = $products->where('car_category_id', $request->carcat);
        }
        if ($request->carmodel) {
            $products = $products->where('car_model_id', $request->carmodel);
        }
        $products = $products->get();

        return view('products', compact('products'));
    }
}
