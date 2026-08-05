<?php

use App\Http\Controllers\Admin\AdminServiceController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SiteGalleryController;
use App\Http\Controllers\TravelQueryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('site.home');
})->name('home');

Route::get('/about', function () {
    return view('site.about');
})->name('about');

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::post('/register', [RegisterController::class,
    'register'])->name('register');

Route::get('/contact', function () {
    return view('site.contact');
})->name('contact');

Route::post('/contact-store', [ContactController::class, 'store'])
    ->name('contact.store');

// Route::get('/gallery', function () {
//     return view('site.galleryfour');
// })->name('gallery');

Route::get('/gallery', [SiteGalleryController::class, 'index'])->name('gallery');

// Route::get('/admin', function () {
//     return view('layout.admin-layout');
// });

Route::get('/admin', function () {
    return view('dashboard.dashboard');
})->name('admin.dashboard');

Route::get('/admin/gallery', [GalleryController::class, 'index'])->name('admin.gallery.index');
Route::post('/admin/gallery', [GalleryController::class, 'store'])->name('admin.gallery.store');
Route::delete('/admin/gallery/{gallery}', [GalleryController::class, 'destroy'])->name('admin.gallery.destroy');

// Route::get('/services', function () {
//     return view('site.services');
// })->name('servies');

Route::get('/services', [ServiceController::class, 'index'])->name('services');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('services', AdminServiceController::class);
});

Route::get('/query-form', [TravelQueryController::class, 'create'])->name('query.form');
Route::post('/query-form', [TravelQueryController::class, 'store'])->name('query.store');

Route::prefix('admin')->group(function () {
    Route::get('/queries', [TravelQueryController::class, 'index'])->name('admin.queries.index');
    Route::patch('/queries/{query}/status', [TravelQueryController::class, 'updateStatus'])->name('admin.queries.status');
    Route::delete('/queries/{query}', [TravelQueryController::class, 'destroy'])->name('admin.queries.destroy');
});
