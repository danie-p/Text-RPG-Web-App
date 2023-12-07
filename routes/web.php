<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home');
});

Route::get('/castle', [PageController::class, 'castle'])->name('castle');
Route::get('/roleplay', [PageController::class, 'roleplay'])->name('roleplay');
Route::get('/register', [PageController::class, 'register'])->name('register');
Route::get('/home', [PageController::class, 'home'])->name('home');

Route::post('/register', [UserController::class, 'register']);