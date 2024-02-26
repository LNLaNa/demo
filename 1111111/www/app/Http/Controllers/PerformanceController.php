<?php

namespace App\Http\Controllers;

use App\Enums\RoleEnum;
use App\Models\Cart;
use App\Models\CartPerformance;
use App\Models\Genre;
use App\Models\Performance;
use Illuminate\Http\Request;

class PerformanceController extends Controller
{

    public function index()
    {
        $performances = Performance::all();
        if (auth()->user()?->role == RoleEnum::USER->value){
            $cart = Cart::query()->where('user_id', auth()->user()->id)->orderByDesc('id')->first();
//            $performancesCart = CartPerformance::query()->where('cart_id', $cart->id)->get();
            $performancesInCart = $cart->performances;

            return view('performances.index', compact('performances','performancesInCart'));
        }
        else

        return view('performances.index', compact('performances'));
    }

    public function create()
    {
        $genres = Genre::all();
        return view('performances.create', compact('genres'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'date'=>'required',
            'age'=>'required',
            'price'=>'required',
            'img'=>'required',
        ]);

        $img = $request->file('img')->store('public/images');

        $performance = Performance::query()->create([
            'name'=>$request->name,
            'date'=>$request->date,
            'age'=>$request->age,
            'price'=>$request->price,
            'img'=> $img,
        ]);

        $performance->genres()->sync($request->genre);

        return redirect()->route('performances.index');
    }

    public function show(Performance $performance)
    {
        return view('performances.show', compact('performance'));
    }

    public function edit(Performance $performance)
    {
        $genres = Genre::all();
        return view('performances.edit', compact('performance', 'genres'));
    }

    public function update(Request $request, Performance $performance)
    {
        if ($request->file('img')) {
            $img = $request->file('img')->store('public/images');
        } else {
            $img = $performance->img;
        }

        $performance->update([
            'name' => $request->name,
            'date' => $request->date,
            'age' => $request->age,
            'price' => $request->price,
            'img' => $img
        ]);

        $performance->genres()->sync($request->genre);

        return redirect()->route('performances.index');
    }

    public function destroy(Performance $performance)
    {
        $performance->genres()->detach();
        $performance->delete();

        return redirect()->route('performances.index');
    }
}
