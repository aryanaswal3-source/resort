<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('site.home');
})->name('home');

Route::get('/about', function () {
    return view('site.about');
})->name('about');

Route::get('/welcome', function () {
    return view('site.welcome');
})->name('welcome');

Route::post('/register', [RegisterController::class,
 'register'])->name('register');