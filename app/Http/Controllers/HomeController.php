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
}
