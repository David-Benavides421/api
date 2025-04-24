<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CarController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/libros', [BookController::class, 'index']);

Route::get('/autos', [CarController::class, 'index']);
