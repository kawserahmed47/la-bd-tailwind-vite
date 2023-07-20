<?php

use App\Http\Controllers\MinistryController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\OrganizationDesignationController;
use App\Http\Controllers\OrganizationOfficeController;
use App\Http\Controllers\OrganizationOfficerController;
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
    return redirect()->route('admin.dashboard');
});

Route::get('/dashboard', function(){
    return view('backend.pages.index');
})->name('dashboard');

Route::resources([
    'organization' => OrganizationController::class,
    'organization-office' => OrganizationOfficeController::class,
    'organization-designation' => OrganizationDesignationController::class,
    'organization-officer' => OrganizationOfficerController::class,
    'ministry' => MinistryController::class,
]);
