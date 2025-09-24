<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', [BookController::class, 'index']); // homepage = daftar buku
Route::resource('books', BookController::class);
