<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartPerformance;
use App\Models\Performance;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addPerformance(Performance $performance)
    {
        $cart = Cart::query()->where('user_id', auth()->user()->id)->orderByDesc('id')->first();

        CartPerformance::query()->create([
            'cart_id' => $cart->id,
            'performance_id' => $performance->id,
            'count' => 1
        ]);

//        dd($cart);
        return redirect()->route('performances.index');
    }

}
