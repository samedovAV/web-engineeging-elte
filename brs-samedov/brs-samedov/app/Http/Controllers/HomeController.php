<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Genre;
use App\Models\Book;
use App\Models\Borrow;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $userCount = User::count();
        $genreCount = Genre::count();
        $bookCount = Book::count();
        $activeRentalsCount = Borrow::where('status', 'ACCEPTED')->count();

        $genres = Genre::all();

        return view('main', compact('userCount', 'genreCount', 'bookCount', 'activeRentalsCount', 'genres'));
    }
}
