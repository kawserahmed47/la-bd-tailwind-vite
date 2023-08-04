<?php

use App\Http\Controllers\DivisionController;
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
    // return view('frontend.pages.index');
   return redirect()->route('auth.login');
})->name('home');


Route::get('division-options', [DivisionController::class, 'options'])->name('division.options');
