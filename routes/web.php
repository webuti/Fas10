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
Route::resource('partners', \App\Http\Controllers\PartnerController::class);
Route::resource('projects', \App\Http\Controllers\ProjectController::class);
Route::resource('projectNotes', \App\Http\Controllers\ProjectNoteController::class);

Route::get('partners/projects/{teamId}', [\App\Http\Controllers\PartnerController::class, 'projects'])->name('partners.projects');
Route::get('partners/projects/{teamId}/{projectId}', [\App\Http\Controllers\PartnerController::class, 'projectDetail'])->name('partners.projectDetail');
Route::get('image-upload', [\App\Http\Controllers\ImageUploadController::class, 'imageUpload'])->name('image.upload');
Route::post('image-upload', [\App\Http\Controllers\ImageUploadController::class, 'imageUploadPost'])->name('image.upload.post');
Route::get('/location/district/{id}', [\App\Http\Controllers\LocationController::class, 'district'])->name('location.district');

Route::get('/career', function () {
    return Inertia::render('Career', ['text' => 'Çok yakında iş ilanları ve iş arayan kişileri bu platformda listeleyeceğiz.'
    ]);
});

Route::get('/', function () {
    return Inertia::render('Welcome', [
    ]);
});

Route::get('/c/{type}', [\App\Http\Controllers\CompanyController::class, 'catalog'])->name('companyCatalog');
Route::get('/i/{type}', [\App\Http\Controllers\BidController::class, 'catalog'])->name('bidCatalog');
Route::get('/i/{type}/{cat}', [\App\Http\Controllers\BidController::class, 'catalog'])->name('bidCatalog.cat');
Route::get('/bd/{id}', [\App\Http\Controllers\BidController::class, 'catalogDetail'])->name('bidDetail');
Route::get('/d/{id}', [\App\Http\Controllers\CompanyController::class, 'show'])->name('companyDetail');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');
