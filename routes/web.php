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

Route::get('image-upload', [\App\Http\Controllers\ImageUploadController::class, 'imageUpload'])->name('image.upload');
Route::post('image-upload', [\App\Http\Controllers\ImageUploadController::class, 'imageUploadPost'])->name('image.upload.post');
Route::get('/location/district/{id}', [\App\Http\Controllers\LocationController::class, 'district'])->name('location.district');

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
});
Route::get('/company', function () {
    return Inertia::render('CompanyDetail', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
});
Route::get('/c/{type}', function ($type) {
    if ($sector = \App\Models\Sector::where('seo_url', $type)->first()) {
        $companies = \App\Models\Team::with(['services.service'])->filtered()->sector($sector->id)->get();

        return Inertia::render('Catalog/Company', [
            'companies' => $companies,
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
        ]);
    }
})->name('companyCatalog');


Route::get('/i/{type}', [\App\Http\Controllers\BidController::class, 'catalog'])->name('bidCatalog');
Route::get('/i/{type}/{cat}', [\App\Http\Controllers\BidController::class, 'catalog'])->name('bidCatalog.cat');
Route::get('/ajax/i/filter', [\App\Http\Controllers\BidController::class, 'catalogFilter'])->name('bidCatalog.filter');
Route::get('/bd/{id}', [\App\Http\Controllers\BidController::class, 'catalogDetail'])->name('bidDetail');
Route::get('/d/{id}', function ($id) {
    return Inertia::render('Catalog/CompanyDetail', [
        'company' => \App\Models\Team::where("id", $id)->first(),
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
})->name('companyDetail');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');
