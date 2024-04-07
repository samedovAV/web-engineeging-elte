<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Http\Requests\StoreGenreRequest;
use App\Http\Requests\UpdateGenreRequest;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genres = Genre::all();
        return view('genres.index', compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('genres.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'style' => ['required', 'string', 'in:primary,secondary,success,danger,warning,info,light,dark'],
        ]);

        Genre::create($validatedData);

        return redirect()->route('genres.index')->with('success', 'Genre added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Genre $genre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Genre $genre)
    {
        return view('genres.edit', compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Genre $genre)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'style' => ['required', 'string', 'in:primary,secondary,success,danger,warning,info,light,dark'],
        ]);

        $genre->update($validatedData);

        return redirect()->route('genres.index')->with('success', 'Genre updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genre $genre)
    {
        $genre->delete();

        return redirect()->route('genres.index')->with('success', 'Genre deleted successfully.');
    }
}
