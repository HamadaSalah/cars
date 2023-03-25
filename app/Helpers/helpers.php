<?php

use App\Models\Cart;

if (!function_exists('cartCount')) {
    function cartCount()
    {
        return Cart::where('user_id', auth()->user()->id)->get()->count();
    }
}
