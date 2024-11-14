<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ReviewController;


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

// I am overwriting the usual store & update route, as I want it to accept a book parameter.
// These routes are designed to take a book parameter, so it expects books/{book}/reviews in the URL.
Route::post('books/{book}/reviews', [ReviewController::class, 'store'])->name('reviews.store');

// Route::get('books/{book}/reviews/{review}/edit', [ReviewController::class, 'edit'])->name('reviews.edit');
// Route::put('books/{book}/reviews/{review}', [ReviewController::class, 'update'])->name('reviews.update');

require __DIR__.'/auth.php';
