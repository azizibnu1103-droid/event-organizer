<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| ROOT
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect('/login');
});

/*
|--------------------------------------------------------------------------
| AUTH ONLY
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/dashboard',
        [DashboardController::class, 'index']
    )->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | PROFILE
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/profile',
        [ProfileController::class, 'edit']
    )->name('profile.edit');

    Route::patch(
        '/profile',
        [ProfileController::class, 'update']
    )->name('profile.update');

    Route::delete(
        '/profile',
        [ProfileController::class, 'destroy']
    )->name('profile.destroy');

});

/*
|--------------------------------------------------------------------------
| USER ONLY
|--------------------------------------------------------------------------
*/

Route::middleware([
    'auth',
    'user'
])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | ORDER / TIKET
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'orders',
        OrderController::class
    );

    /*
    |--------------------------------------------------------------------------
    | UPLOAD PEMBAYARAN
    |--------------------------------------------------------------------------
    */

    Route::post(
        '/payments/upload',
        [PaymentController::class, 'upload']
    )->name('payments.upload');

});

/*
|--------------------------------------------------------------------------
| ADMIN ONLY
|--------------------------------------------------------------------------
*/

Route::middleware([
    'auth',
    'admin'
])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | EVENT MANAGEMENT
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'events',
        EventController::class
    );

    /*
    |--------------------------------------------------------------------------
    | VERIFIKASI PEMBAYARAN
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/admin/payments',
        [PaymentController::class, 'index']
    )->name('admin.payments');

    Route::post(
        '/payments/{id}/approve',
        [PaymentController::class, 'approve']
    )->name('payments.approve');

    Route::post(
        '/payments/{id}/reject',
        [PaymentController::class, 'reject']
    )->name('payments.reject');

});

require __DIR__.'/auth.php';