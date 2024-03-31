<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Genre;
use App\Models\Book;
use App\Models\Borrow;
use App\Http\Controllers\RentalController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // Fetch required counts
    $userCount = User::count();
    $genreCount = Genre::count();
    $bookCount = Book::count();
    $activeRentalsCount = Borrow::where('status', 'ACCEPTED')->count();

    // Fetch all genres
    $genres = Genre::all();

    // Pass data to the main view
    return view('main', compact('userCount', 'genreCount', 'bookCount', 'activeRentalsCount', 'genres'));
});

Route::get('/genres/{genre}', [BookController::class, 'listByGenre'])->name('genres.list');
Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');
Route::get('/books/search', [BookController::class, 'search'])->name('books.search');
Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');

Route::get('/genres/{genre}', [GenreController::class, 'show'])->name('genres.show');

Route::get('/my-rentals', [RentalController::class, 'index'])->name('my-rentals.index');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
