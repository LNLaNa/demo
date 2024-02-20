<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::all();

        return view('genres.index',compact('genres'));
    }

    public function store(Request $request)
    {
        Genre::query()->create([
            'name' => $request->name,
        ]);
        return redirect()->back();
    }

    public function destroy(Genre $genre)
    {
        $genre->delete();
        return redirect()->back();
    }
}
