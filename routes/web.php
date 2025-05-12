<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
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
});
require __DIR__ . '/auth.php';




// Back Routes
Route::prefix('back')->name('back.')->group(function () {
    Route::get('/', BackController::class)
        ->middleware('admin')
        ->name('home');


    ##------------------------------------------------------- USERS MODULE
    Route::controller(UserController::class)->group(function () {
        Route::resource('users', UserController::class);
    });

    ##------------------------------------------------------- ROLES MODULE
    Route::controller(RoleController::class)->group(function () {
        Route::resource('roles', RoleController::class);
    });

    ##------------------------------------------------------- ADMINS MODULE
    Route::controller(AdminController::class)->group(function () {
        Route::resource('admins', AdminController::class);
    });



    require __DIR__ . '/adminAuth.php';
});





Route::get('/', function () {
    return view('welcome');
});
