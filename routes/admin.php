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
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectOrganizationOfficerController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SectionOfficerController;
use App\Models\SectionOfficer;
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
    'section' => SectionController::class,
    'section-officer' => SectionOfficerController::class,
    'organization' => OrganizationController::class,
    'organization-office' => OrganizationOfficeController::class,
    'organization-designation' => OrganizationDesignationController::class,
    'organization-officer' => OrganizationOfficerController::class,
    'project-organization-officer' => ProjectOrganizationOfficerController::class,
    'project' => ProjectController::class, 
    'ministry' => MinistryController::class,
    'menu-label' => MenuLabelController::class,
    'menu' => MenuController::class,
]);

Route::get('project-current', [ProjectController::class, 'current'])->name('project.current');
Route::get('project-finished', [ProjectController::class, 'finished'])->name('project.finished');
Route::get('project-pending', [ProjectController::class, 'pending'])->name('project.pending');
Route::get('project-officers/{id}',[ProjectController::class, 'officers'])->name('project.officers');
Route::get('project-attachments/{id}',[ProjectController::class, 'attachments'])->name('project.attachments');

Route::get('organization-office-and-designation-options', [OrganizationController::class, 'officeAndDesignationOptions'])->name('organization.office.designation.options');

Route::get('organization-officer-options', [OrganizationOfficerController::class, 'options'])->name('organization-officer.options');


Route::prefix('download')->name('download.')->group(function () {
    Route::get('project/{slug}',[ProjectController::class, 'download'])->name('project');
    Route::get('organization/{slug}',[OrganizationController::class, 'download'])->name('organization');
    Route::get('organization-office/{slug}',[OrganizationOfficeController::class, 'download'])->name('organization-office');
    Route::get('organization-designation/{slug}',[OrganizationDesignationController::class, 'download'])->name('organization-designation');
    Route::get('organization-officer/{id}',[OrganizationOfficerController::class, 'download'])->name('organization-officer');
    Route::get('ministry-download/{slug}',[MinistryController::class, 'download'])->name('ministry');
    Route::get('section/{slug}', [SectionController::class, 'download'])->name('section');
    Route::get('section-officer/{id}', [SectionOfficerController::class, 'download'])->name('section-officer');
});


Route::get('parent-menu', [MenuController::class, 'parentMenu'])->name('menu.parent');
Route::get('child-menu', [MenuController::class, 'childMenu'])->name('menu.child');
Route::post('menu-clone', [MenuController::class, 'clone'])->name('menu.clone');
Route::post('menu-delete', [MenuController::class, 'destroy'])->name('menu.delete');


Route::post('menu-label-clone', [MenuLabelController::class, 'clone'])->name('menu-label.clone');
Route::post('menu-label-delete', [MenuLabelController::class, 'destroy'])->name('menu-label.delete');

