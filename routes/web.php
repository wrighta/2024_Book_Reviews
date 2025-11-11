<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\EditionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');
Route::post('/books', [BookController::class, 'store'])->name('books.store');
Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
Route::put('/books/{book}', [BookController::class, 'update'])->name('books.update');
Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy');


// The code below creates all Routes for reviews
Route::resource('reviews', ReviewController::class);

// I am overwriting the usual store route, as I want it to accept a book parameter.- you may or may not need this.
Route::post('books/{book}/reviews', [ReviewController::class, 'store'])->name('reviews.store');

Route::resource('authors', AuthorController::class)->middleware('auth');


Route::resource('books.editions', EditionController::class)
    ->only(['create', 'store'])
    ->shallow(); // this keeps other routes as normal - not nested

    
// The code below does the same as the resource route above
// Route::get('/books/{book}/editions/create', [EditionController::class, 'create'])
//     ->name('books.editions.create');

// Route::post('/books/{book}/editions', [EditionController::class, 'store'])
//     ->name('books.editions.store');


require __DIR__.'/auth.php';
