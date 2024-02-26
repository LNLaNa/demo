<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Genre;
use App\Models\Performance;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PerformanceController extends Controller
{
    public function index(): View
    {
        $performances = Performance::all();
        if (auth()) {
            $cart = Cart::query()->where('user_id', auth()->user()->id)->orderByDesc('id')->first();
            return view('performances.index',compact('performances','cart'));
        }
        else
        return view('performances.index',compact('performances'));
    }

    public function create()
    {
        $genres = Genre::all();
        return view('performances.create',compact('genres'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validate = $request->validate([
           'name' => 'required',
           'price' => 'required',
           'age_limit' => 'required',
           'image' => 'required',
           'date' => 'required',
        ]);

        if ($validate) {
            $image = $request->file('image')->store('public/performances/');
            $performance = Performance::query()->create([
                'name' => $request->name,
                'price' => $request->price,
                'age_limit' => $request->age_limit,
                'image' => $image,
                'date' => $request->date,
            ]);

            $performance->genres()->sync($request->genre);

            return redirect(route('performances.index'));
        }
        else return redirect(route('performances.create'));
    }

    public function show(Performance $performance): View
    {
        return view('performances.show',compact('performance'));
    }

    public function edit(Performance $performance): View
    {
        $genres = Genre::all();
        return view('performances.edit', compact('performance', 'genres'));
    }

    public function update(Request $request, Performance $performance)
    {
        if (empty($request->file('image'))) { //нет картинки
            $performance->update([
                'name' => $request->name,
                'price' => $request->price,
                'age_limit' => $request->age_limit,
                'date' => $request->date,
            ]);
            $performance->genres()->sync($request->genre);
        } else {
            $image = $request->file('image')->store('public/performances/');
            $performance->update([
                'name' => $request->name,
                'price' => $request->price,
                'age_limit' => $request->age_limit,
                'image' => $image,
                'date' => $request->date,
            ]);
            $performance->genres()->sync($request->genre);
        }
        return redirect(route('performances.index'));

    }

    public function destroy(Performance $performance)
    {
        $performance->genres()->detach();
        $performance->delete();
        return redirect()->back();
    }
}
