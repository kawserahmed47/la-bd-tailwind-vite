<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('auth.login');
});

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login-check', [LoginController::class, 'loginCheck'])->name('loginCheck');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
