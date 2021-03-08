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
        $companies = \App\Models\Team::filtered()->sector($sector->id)->get();
        return Inertia::render('Catalog/Company', [
            'companies' => $companies,
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
        ]);
    }
})->name('companyCatalog');
Route::get('/i/{type}', function ($type) {
    if ($sector = \App\Models\Sector::where('seo_url', $type)->first()) {
        $bids = \App\Models\Bid::sector($sector->id)->get();
        return Inertia::render('Catalog/Bid', [
            'bids' => $bids,
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
        ]);
    }
})->name('bidCatalog');


Route::get('/bd/{id}', function ($id) {
    return Inertia::render('Catalog/BidDetail', [
        'bid' => \App\Models\Bid::where("id", $id)->first(),
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
})->name('bidDetail');
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
