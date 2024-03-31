<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\ArtistsController;
use App\Http\Controllers\TvController;

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

// Route to show the index page
Route::get('/', [MoviesController::class, 'index'])->name('movies.index');

// Route to show an individual movie details
Route::get('/movies/{id}', [MoviesController::class, 'show'])->name('movies.show');

// Route to show the artists page
Route::get('/artists', [ArtistsController::class, 'index'])->name('artists.index');

// Route for artists pagination
Route::get('/artists/page/{page?}', [ArtistsController::class, 'index']);

// Route to show an individual artist details
Route::get('/artist/{id}', [ArtistsController::class, 'show'])->name('artists.show');

// Route to show the tv shows page
Route::get('/tv', [TvController::class, 'index'])->name('tv.index');

// Route to show an individual tv show details
Route::get('/tv/{id}', [TvController::class, 'show'])->name('tv.show');

// Route for credits
Route::get('/credits', function(){
    return view('credits');
})->name('credits');