<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/books', [BookController::class, 'index'])->name('books');
Route::post('/books', [BookController::class, 'addBook'])->name('books');

Route::get('/genres', [GenreController::class, 'index'])->name('genres');
Route::post('/genres', [GenreController::class, 'addGenre'])->name('genres');

Route::get('/authors', [AuthorController::class, 'index'])->name('authors');
Route::post('/authors', [AuthorController::class, 'addAuthor'])->name('authors');