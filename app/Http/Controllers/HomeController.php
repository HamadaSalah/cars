<?php

namespace App\Http\Controllers;

use App\Models\CarCategory;
use App\Models\Cart;
use App\Models\Category;
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
        // $querys = explode(' ', $request->name);
        // foreach ($querys as $qa) {
        //     $search = Item::join('car_models', 'items.car_model_id', '=', 'car_models.id')
        //         ->where('car_models.name', 'LIKE', "%{$qa}%")
        //         ->orWhere('items.name', 'LIKE', "%{$qa}%");
        // }
        // $search = Item::join('car_categories', 'items.car_category_id', '=', 'car_categories.id')
        //     ->where('items.name', 'LIKE', "%{$request->name}%")
        //     ->orWhere('car_categories.name', 'LIKE', "%{$request->name}%");

        $search = Item::where('name', 'LIKE', "%{$request->name}%");
        if ($request->carcat != null) {
            $search->where('car_category_id', $request->carcat);
        }
        if ($request->carmodel != null) {
            $search->where('car_model_id', $request->carmodel);
        }
        $items = $search->paginate(20);
        $items = $items->appends(request()->query());
        $cars = CarCategory::all();
        return view('searchByName', compact('items', 'cars'));
    }

    public function gard(Request $request)
    {
        $cats  = Category::all();
        $products = Item::where('id', '!=', 0);
        if ($request->model) {
            $products = $products->where('category_id', $request->model);
        }
        if ($request->name) {
            $products = $products->where('name', 'LIKE', "%{$request->name}%");
        }
        $products = $products->paginate(20);
        $searchwords = $request->name;
        return view('gard', compact('products', 'searchwords', 'cats'));
    }

    public function SeaechSteps(Request $request)
    {
        $cats  = Category::all();
        $products = Item::where('id', '!=', 0);
        if ($request->year) {
            $products = $products->where('from_year', '<=', $request->year)->where('to_year', '>=', $request->year);
        }
        if ($request->carcat) {
            $products = $products->where('car_category_id', $request->carcat);
        }
        if ($request->carmodel) {
            $products = $products->where('car_model_id', $request->carmodel);
        }
        if ($request->model) {
            $products = $products->where('category_id', $request->model);
        }
        if ($request->name) {
            $products = $products->where('name', 'LIKE', "%{$request->name}%");
        }
        $products = $products->get();
        $searchwords = $request->yearText . ' - ' . $request->carcatText . ' - ' . $request->carmodelText;
        return view('products', compact('products', 'searchwords', 'cats'));
    }
    public function addToCart($id)
    {
        Cart::create([
            'user_id' => auth()->user()->id,
            'item_id' => $id,
        ]);
        return redirect()->back()->with('message', 'Added Succesfully');
    }
    public function cart()
    {
        $carts = Cart::with('item')->get();
        $total = $carts->sum(function ($item) {
            return $item->item->price1 * $item->count;
        });
        return view('cart', compact('carts', 'total'));
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
                'user_id' => auth()->user()->id,
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
    public function fawater(Request $request)
    {
        $faws = Fatorah::where('type', 'fatora');
        if ($request->has('search')) {
            $faws = $faws->where('number', $request->search);
        }
        $faws = $faws->get();
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
    public function pricelist(Request $request)
    {
        $faws = Fatorah::where('type', 'show');
        if ($request->has('search')) {
            $faws = $faws->where('number', $request->search);
        }
        $faws = $faws->get();

        return view('pricelistall', compact('faws'));
    }
    public function pricelistget($id)
    {
        $show = Fatorah::findOrFail($id);
        return view('pricelistsingle', compact('show'));
    }

    public function zemam(Request $request)
    {
        if ($request->name  != null) {
            $zemam = Fatorah::with('products')->where('name', 'LIKE', "%{$request->name}%")->where('rest', '!=', 0)->with('products')->get();
        } else {
            $zemam = [];
        }
        return view('zemam', ['zemam' => $zemam]);
    }
    public function backk(Request $request)
    {
        return view('backk');
    }
    public function backagain(Request $request)
    {
        $fatorah = Fatorah::with('products')->where('number', $request->name)->first();
        if (!$fatorah) {
            return abort(404);
        }
        return view('backagain', compact('fatorah'));
    }
}
