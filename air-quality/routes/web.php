<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\SearchboxController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\ForecastController;
use App\Http\Controllers\FavoriteController;
use Illuminate\Support\Facades\Auth;
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
})->middleware(['verified'])->name('dashboard');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

require __DIR__ . '/auth.php';

Route::get('/searchbox', [SearchboxController::class, 'index'])->middleware(['verified']);

Route::get('/map', [FavoriteController::class, 'index'])->middleware(['verified']);
Route::post('/map', [FavoriteController::class, 'findAjaxFunction']);
Route::get('/map{id}', [FavoriteController::class, 'destroy'])->name('favorites.delete');

Route::get('/dashboard', [FavoriteController::class, 'index'])->middleware(['verified']);
Route::post('/dashboard', [FavoriteController::class, 'findAjaxFunction']);
Route::get('/dashboard{id}', [FavoriteController::class, 'destroy'])->name('favorites.delete');

Route::get('/forecast', [ForecastController::class, 'index'])->middleware(['verified']);
Route::post('/forecast', [ForecastController::class, 'ajaxCall'])->middleware(['verified']);

Route::get('/account', function () {
    $user = Auth::user();
    return view('account', ['user' => $user]);
})->middleware(['verified'])->name('account');

Route::post('/account', [AccountController::class, 'findPostMethod']);

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