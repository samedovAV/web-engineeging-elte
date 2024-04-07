<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class LibrarianController extends Controller
{
    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'authors' => ['required', 'string', 'max:255'],
            'released_at' => ['required', 'date', 'before:now'],
            'pages' => ['required', 'numeric', 'min:1'],
            'isbn' => ['required', 'string', 'regex:/^(?=(?:\D*\d){10}(?:(?:\D*\d){3})?$)[\d-]+$/i'],
            'description' => ['nullable', 'string'],
            'genres' => ['required', 'array'],
            'genres.*' => ['exists:genres,id'],
            'in_stock' => ['required', 'numeric', 'min:0'],
        ]);

        // Create a new book
        $book = Book::create($validatedData);

        // Redirect to a confirmation page or somewhere else
        return redirect()->route('books.show', $book);
    }
}
