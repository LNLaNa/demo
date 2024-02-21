<?php

namespace App\Http\Controllers;

use App\Models\Performance;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PerformanceController extends Controller
{
    public function index(): View
    {
        $performances = Performance::all();

        return view('performances.index',compact('performances'));
    }

    public function create()
    {
        return view('performances.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
           'name' => 'required',
           'price' => 'required',
           'age_limit' => 'required',
           'image' => 'required',
           'date' => 'required',
        ]);

        if ($validate) {
            Performance::query()->create();
        }
    }

    public function show(Performance $performance)
    {
        //
    }

    public function edit(Performance $performance)
    {
        //
    }

    public function update(Request $request, Performance $performance)
    {
        //
    }

    public function destroy(Performance $performance)
    {
        //
    }
}
