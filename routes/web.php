<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;



Route::get('/', function () {
    return redirect('/dashboard');
});


Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth')->name('dashboard');

Route::prefix("admin")->group(function () {
    Route::get('/sign-up', [UserController::class, 'registerPage'])->name('register');
    Route::get('/sign-in', [UserController::class, 'loginPage'])->name('login');
    Route::post('sign-up', [UserController::class, 'register']);
    Route::post('sign-in', [UserController::class, 'login'])->name('login'); // Menggunakan route 'login'
    Route::post('sign-out', [UserController::class, 'logout'])->name('logout');
});
