<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
{
    return view('books.show', compact('book'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }

    public function listByGenre($genre)
    {
        $genre = Genre::where('name', $genre)->firstOrFail();
        $books = $genre->books()->paginate(10);

        return view('books.list_by_genre', compact('genre', 'books'));
    }

    public function search(Request $request)
    {
        $filter = $request->input('filter');

        $books = Book::where('title', 'like', "%$filter%")
                     ->orWhere('authors', 'like', "%$filter%")
                     ->paginate(10);

        return view('books.search_results', compact('books', 'filter'));
    }
}
