<?php

use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenggunaController;
use Illuminate\Auth\Middleware\Authenticate;

Route::middleware([Authenticate::class])->group(function () {
    Route::resource('pengguna', PenggunaController::class);
    Route::resource('package', PackageController::class);
    Route::resource('order', OrderController::class);
    Route::resource('payment', PaymentController::class);
    Route::resource('feedback', FeedbackController::class);
});

Auth::routes();
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');
