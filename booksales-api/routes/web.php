<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;

Route::get('/', function () {
    return view('home');
});

Route::get('/book', [BookController::class, 'index'])->name('book');

Route::get('/genre', [GenreController::class, 'index'])->name('genre');
