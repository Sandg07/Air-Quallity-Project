<?php

use App\Http\Controllers\SearchboxController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\ForecastController;
use App\Http\Controllers\FavoriteController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('map');
})->middleware(['auth'])->name('dashboard');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

require __DIR__ . '/auth.php';

Route::get('/searchbox', [SearchboxController::class, 'index'])->middleware(['auth']);

Route::get('/map', [FavoriteController::class, 'index'])->middleware(['auth']);
Route::post('/map', [FavoriteController::class, 'findAjaxFunction']);
Route::get('/map{id}', [FavoriteController::class, 'destroy'])->name('favorites.delete');

Route::get('/dashboard', [FavoriteController::class, 'index'])->middleware(['auth']);
Route::post('/dashboard', [FavoriteController::class, 'findAjaxFunction']);
Route::get('/dashboard{id}', [FavoriteController::class, 'destroy'])->name('favorites.delete');

Route::get('/forecast', [ForecastController::class, 'index'])->middleware(['auth']);
Route::post('/forecast', [ForecastController::class, 'ajaxCall'])->middleware(['auth']);

//Home page
Route::get('/', function () {
    return view('homepage');
});

//Team page
Route::get('/team', [TeamController::class, 'index']);
  
    /* 
    * NOT TO USE
    // Show the form :
    Route::get('/favorites{id}', [FavoriteController::class, 'edit']);
    // Show the form :
    Route::get('/favorites', [FavoriteController::class, 'show']);
    // Submit the form : 
    Route::put('/favorites{id}', [FavoriteController::class, 'update']);
    */