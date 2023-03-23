<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Fatorah;
use App\Models\FatorahProduct;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function addToCart($id)
    {
        Cart::create([
            'user_id' => 1,
            'item_id' => $id,
        ]);
        return redirect()->route('home')->with('success', 'Added Succesfully');
    }
    public function cart()
    {
        $carts = Cart::with('item')->get();
        // dd($carts);
        return view('cart', compact('carts'));
    }
    public function convertToShow()
    {
        $carts = Cart::with('item')->get();
        $show = Fatorah::create([
            'name' => '	عميل جديد',
            'number' => random_int(10000, 99999),
            'type' => 'show',
        ]);
        foreach ($carts as $cart) {
            FatorahProduct::create([
                'user_id' => 1,
                'fatorah_id' => $show->id,
                'item_id' => $cart->item->id,
                'count' => $cart->count
            ]);
        }
        DB::table('carts')->truncate();
        return redirect()->route('pricelistget', $show->id);
    }
    public function convertToShowGet($id)
    {
        $show = Fatorah::findOrFail($id);
        return view('showerPrice', compact('show'));
    }
    public function convertToFatorah(Request $request, $id)
    {
        $fat = Fatorah::findOrFail($id);
        if ($request->minus == 'one') {
            foreach ($fat->products as $pro) {
                // dd($pro->item);
                // $check = Item::findOrfail($$pro->item->id);
                $pro->item->update([
                    'count1' => $pro->item->count1 - $pro->count
                ]);
            }
        } else {
            foreach ($fat->products as $pro) {
                $pro->item->update([
                    'count2' => $pro->item->count2 - $pro->count
                ]);
            }
        }

        $fat->update([
            "name" => $request->name,
            "pay" => $request->pay,
            "rest" => $request->rest,
            'type' => 'fatora'
        ]);
        $show = $fat;
        return view('showerPrice', compact('show'));
    }
    public function fawater()
    {
        $faws = Fatorah::where('type', 'fatora')->get();
        return view('fawater', compact('faws'));
    }

    public function editfatorah(Request $request, $id)
    {
        $fat = Fatorah::findOrFail($id);


        $requestData = $request->only(['name', 'pay', 'rest']);
        $fat->update($requestData);
        return redirect()->back();
    }
    //
    public function pricelist()
    {
        $faws = Fatorah::where('type', 'show')->get();
        return view('pricelistall', compact('faws'));
    }
    public function pricelistget($id)
    {
        $show = Fatorah::findOrFail($id);
        return view('pricelistsingle', compact('show'));
    }
}
