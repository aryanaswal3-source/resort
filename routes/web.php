<?php

use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminServiceController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MyBookingController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SiteGalleryController;
use App\Http\Controllers\TravelQueryController;
use App\Models\Service;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

// Home
Route::get('/', function () {

    $services = Service::latest()->take(4)->get();

    return view('site.home', compact('services'));

})->name('home');

// About
Route::get('/about', function () {

    return view('site.about');

})->name('about');

// Welcome
Route::get('/welcome', function () {

    return view('welcome');

})->name('welcome');

// Register
Route::post('/register', [RegisterController::class, 'register'])
    ->name('register');

// Login Page - GET
// Login Page - GET
Route::get('/login', function () {
    return redirect()->route('home', ['login' => 1]);
})->name('login');

// Login Submit - POST
Route::post('/login', [LoginController::class, 'login'])
    ->name('login.submit');
// Logout
Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

//forgot password 
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink'])->name('password.email');
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ForgotPasswordController::class, 'reset'])->name('password.update');

// Contact
Route::get('/contact', function () {

    return view('site.contact');

})->name('contact');

Route::post('/contact-store', [ContactController::class, 'store'])
    ->name('contact.store');

// Gallery
Route::get('/gallery', [SiteGalleryController::class, 'index'])
    ->name('gallery');

// Services
Route::get('/services', [ServiceController::class, 'index'])
    ->name('services');

// Booking
Route::get('/booking', [BookingController::class, 'create'])
    ->name('booking.create');

Route::post('/booking', [BookingController::class, 'store'])->middleware('auth.booking')
    ->name('booking.store');

// Travel Query
Route::get('/query-form', [TravelQueryController::class, 'create'])
    ->name('query.form');

Route::post('/query-form', [TravelQueryController::class, 'store'])
    ->name('query.store');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| auth  = user must be logged in
| admin = user role must be admin
|
*/

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'admin'])
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | Dashboard
        |--------------------------------------------------------------------------
        */

        Route::get('/', function () {

            return view('dashboard.dashboard');

        })->name('dashboard');

        /*
        |--------------------------------------------------------------------------
        | Admin Profile
        |--------------------------------------------------------------------------
        */

        Route::get('/profile', [AdminProfileController::class, 'index'])
            ->name('profile');
        Route::post('/password/update', [AdminProfileController::class, 'updatePassword'])
            ->name('password.update');

        /*
        |--------------------------------------------------------------------------
        | Users
        |--------------------------------------------------------------------------
        */

        Route::get('/users', [AdminUserController::class, 'index'])
            ->name('users');

        Route::get('/users/{user}', [AdminUserController::class, 'show'])
            ->name('users.show');

        Route::delete('/users/{user}', [AdminUserController::class, 'destroy'])
            ->name('users.destroy');

        /*
        |--------------------------------------------------------------------------
        | Services
        |--------------------------------------------------------------------------
        */

        Route::resource('services', AdminServiceController::class);

        /*
        |--------------------------------------------------------------------------
        | Gallery
        |--------------------------------------------------------------------------
        */

        Route::get('/gallery', [GalleryController::class, 'index'])
            ->name('gallery.index');

        Route::post('/gallery', [GalleryController::class, 'store'])
            ->name('gallery.store');

        Route::delete('/gallery/{gallery}', [GalleryController::class, 'destroy'])
            ->name('gallery.destroy');

        /*
        |--------------------------------------------------------------------------
        | Bookings
        |--------------------------------------------------------------------------
        */

        Route::get('/bookings', [AdminBookingController::class, 'index'])
            ->name('bookings.index');

        Route::put('/bookings/{booking}/status', [AdminBookingController::class, 'updateStatus'])
            ->name('bookings.status');

        Route::delete('/bookings/{booking}', [AdminBookingController::class, 'destroy'])
            ->name('bookings.destroy');

        /*
        |--------------------------------------------------------------------------
        | Travel Queries
        |--------------------------------------------------------------------------
        */

        Route::get('/queries', [TravelQueryController::class, 'index'])
            ->name('queries.index');

        Route::patch('/queries/{query}/status', [TravelQueryController::class, 'updateStatus'])
            ->name('queries.status');

        Route::delete('/queries/{query}', [TravelQueryController::class, 'destroy'])
            ->name('queries.destroy');

    });

// My Bookings
Route::middleware('auth')->group(function () {

    Route::get('/my-bookings', [MyBookingController::class, 'index'])
        ->name('my.bookings');

    // Receipt - ALL bookings
    Route::get('/my-bookings/receipt', [MyBookingController::class, 'receipt'])
        ->name('my.booking.receipt');

    // Single booking details
    Route::get('/my-bookings/{id}', [MyBookingController::class, 'show'])
        ->name('my.booking.show');

    Route::get('/my-bookings/receipt/download', [MyBookingController::class, 'downloadReceipt'])
        ->name('my.booking.receipt.download');
});
