<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\BackController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Front Routes
Route::prefix('front')->name('front.')->group(function () {
    Route::get('/', [FrontController::class, 'home'])
        ->name('home')
        ->middleware('auth');
    // Route::view('/login', 'front.auth.login')->name('login');
    // Route::view('/register', 'front.auth.register')->name('register');
    // Route::view('/forgetPassword', 'front.auth.forget-password')->name('forgetPassword');
});


// Back Routes
Route::prefix('back')->name('back.')->group(function () {
    Route::get('/', BackController::class)
        ->middleware('admin')
        ->name('home');
    Route::view('/login', 'back.auth.login')->name('login');
    Route::view('/register', 'back.auth.register')->name('register');
    Route::view('/forgetPassword', 'back.auth.forget-password')->name('forgetPassword');
});




require __DIR__ . '/auth.php';



Route::get('/', function () {
    return view('welcome');
});
