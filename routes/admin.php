<?php

use App\Http\Controllers\MenuController;
use App\Http\Controllers\MenuLabelController;
use Mpdf\Config\ConfigVariables;
use Mpdf\Config\FontVariables;
use Mpdf\Mpdf;
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
    'menu-label' => MenuLabelController::class,
    'menu' => MenuController::class,
]);

Route::get('organization-download/{slug}',[OrganizationController::class, 'download'])->name('organization.download');

Route::get('parent-menu', [MenuController::class, 'parentMenu'])->name('menu.parent');
Route::get('child-menu', [MenuController::class, 'childMenu'])->name('menu.child');
Route::post('menu-clone', [MenuController::class, 'clone'])->name('menu.clone');
Route::post('menu-delete', [MenuController::class, 'destroy'])->name('menu.delete');


Route::post('menu-label-clone', [MenuLabelController::class, 'clone'])->name('menu-label.clone');
Route::post('menu-label-delete', [MenuLabelController::class, 'destroy'])->name('menu-label.delete');

