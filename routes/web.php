<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::resource('dashboard/bids', \App\Http\Controllers\BidController::class);
Route::resource('teams.service', \App\Http\Controllers\TeamServiceController::class);
Route::resource('comments', \App\Http\Controllers\CommentController::class);
Route::resource('projects', \App\Http\Controllers\ProjectController::class);
Route::resource('projectNotes', \App\Http\Controllers\ProjectNoteController::class);
Route::resource('availableday', \App\Http\Controllers\AvailableDayController::class);
Route::resource('partners', \App\Http\Controllers\PartnerController::class);
Route::resource('projectTasks', \App\Http\Controllers\ProjectTaskController::class);
Route::post('partners/approve', [\App\Http\Controllers\PartnerController::class, 'approve'])->name('partners.approve');
Route::get('projects', [\App\Http\Controllers\PartnerController::class, 'tasks'])->name('partners.tasks');
Route::get('projectTasks', [\App\Http\Controllers\ProjectTaskController::class, 'show'])->name('projectTasks.show');
Route::post('projectTasks/update/{id}', [\App\Http\Controllers\ProjectTaskController::class, 'update'])->name('projectTasks.update');
Route::get('projects/partners/{teamId}', [\App\Http\Controllers\PartnerController::class, 'projects'])->name('partners.projects');
Route::get('projects/partners/{teamId}/{projectId}', [\App\Http\Controllers\PartnerController::class, 'projectDetail'])->name('partners.projectDetail');


Route::get('image-upload', [\App\Http\Controllers\ImageUploadController::class, 'imageUpload'])->name('image.upload');
Route::get('team.ajax.index', [\App\Http\Controllers\TeamController::class, 'index'])->name('team.ajax.index');
Route::post('image-upload', [\App\Http\Controllers\ImageUploadController::class, 'imageUploadPost'])->name('image.upload.post');
Route::get('/location/district/{id}', [\App\Http\Controllers\LocationController::class, 'district'])->name('location.district');

Route::get('/career', function () {
    return Inertia::render('Career');
});

Route::get('/', function () {
    return Inertia::render('Welcome', [
    ]);
});

Route::get('/c/{type}', [\App\Http\Controllers\CompanyController::class, 'catalog'])->name('companyCatalog');
Route::get('/c', [\App\Http\Controllers\CompanyController::class, 'catalog'])->name('companyCatalogMain');
Route::get('/i', [\App\Http\Controllers\BidController::class, 'catalog'])->name('bidCatalogMain');
Route::get('/i/{type}', [\App\Http\Controllers\BidController::class, 'catalog'])->name('bidCatalog');
Route::get('/i/{type}/{cat}', [\App\Http\Controllers\BidController::class, 'catalog'])->name('bidCatalog.cat');
Route::get('/bd/{id}', [\App\Http\Controllers\BidController::class, 'catalogDetail'])->name('bidDetail');
Route::get('/d/{id}', [\App\Http\Controllers\CompanyController::class, 'show'])->name('companyDetail');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return \Illuminate\Support\Facades\Redirect::route('partners.tasks');
})->name('dashboard');
