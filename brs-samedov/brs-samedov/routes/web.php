<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Genre;
use App\Models\Book;
use App\Models\Borrow;
use App\Http\Controllers\BookController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\LibrarianController;


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
Route::get('/books/search', [BookController::class, 'search'])->name('books.search');
Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');
Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
Route::put('/books/{book}', [BookController::class, 'update'])->name('books.update');
Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy');

Route::get('/genres/{genre}', [GenreController::class, 'show'])->name('genres.show');
Route::get('/genres', [GenreController::class, 'index'])->name('genres.index');
Route::post('/genres', [GenreController::class, 'store'])->name('genres.store');
Route::get('/genres/{genre}/edit', [GenreController::class, 'edit'])->name('genres.edit');
Route::put('/genres/{genre}', [GenreController::class, 'update'])->name('genres.update');
Route::delete('/genres/{genre}', [GenreController::class, 'destroy'])->name('genres.destroy');

Route::get('/my-rentals', [RentalController::class, 'index'])->name('my-rentals.index');
Route::get('/rentals/{rental}', [RentalController::class, 'show'])->name('rental.show');
Route::get('/rentals', [RentalController::class, 'indexLibrarian'])->name('rentals.index');
Route::get('/rentals/{rental}/librarian', [RentalController::class, 'showLibrarian'])->name('rentals.show.librarian');
Route::put('/rentals/{rental}/librarian', [RentalController::class, 'updateLibrarian'])->name('rentals.update.librarian');

Route::get('/books/create', [LibrarianController::class, 'create'])->name('books.create');
Route::post('/books', [LibrarianController::class, 'store'])->name('books.store');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
