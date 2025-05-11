<?php

use App\Http\Controllers\AuthorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;

Route::get('/', function () {
    return view('home');
});

Route::get('/book', [BookController::class, 'index'])->name('book');

Route::get('/genre', [GenreController::class, 'index'])->name('genre');

Route::get('/author', [AuthorController::class, 'index'])->name('author');
