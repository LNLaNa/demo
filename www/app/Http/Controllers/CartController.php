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

        $cartPerformance = $cart->performances()->where('performance_id',$performance->id)->first();

        if (empty($cartPerformance)) {
            CartPerformance::query()->create([
                'cart_id' => $cart->id,
                'performance_id' => $performance->id,
            ]);
        } else {
            $cartPerformance = $cartPerformance->pivot->count;
            $performance_id = $performance->id;

            $cart->performances()->updateExistingPivot($performance_id, [
                'count' => $cartPerformance + 1
            ]);
        }

        return redirect()->back();
    }

    public function removePerformance(Performance $performance)
    {
        $cart = Cart::query()->where('user_id', auth()->user()->id)->orderByDesc('id')->first();
        $cartPerformance = $cart->performances()->where('performance_id',$performance->id)->first();
        $performance_id = $performance->id;


        if ($cartPerformance->pivot->count > 1) {
            $cart->performances()->updateExistingPivot($performance_id, [
                'count' => $cartPerformance->pivot->count - 1
            ]);
        } else
            CartPerformance::query()->where('cart_id',$cart->id)->where('performance_id', $performance_id)->delete();

        return redirect()->back();
    }

}
