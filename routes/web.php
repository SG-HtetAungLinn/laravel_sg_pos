<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::get('login', [AuthController::class, 'loginPage'])->name('auth.loginPage');

Route::get('register', [AuthController::class, 'registerPage'])->name('auth.registerPage');
// Route::
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
