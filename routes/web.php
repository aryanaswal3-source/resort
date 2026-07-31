<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

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

Route::get('/contact', function () {
    return view('site.contact');
})->name('contact');

Route::post('/contact-store', [ContactController::class, 'store'])
    ->name('contact.store');

Route::get('/gallery', function () {
    return view('site.galleryfour');
})->name('gallery');
