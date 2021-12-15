<?php

use App\Http\Controllers\SearchboxController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\ApiController;
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
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

require __DIR__ . '/auth.php';

// Route::get('/testSB', [TestController::class, 'index']);
Route::get('/searchbox', [SearchboxController::class, 'index'])->middleware(['auth']);
Route::get('/map', [MapController::class, 'index'])->middleware(['auth']);
Route::get('/map',  [ApiController::class, 'index'])->middleware(['auth']);
Route::post('map', [ApiController::class, 'dataRequest'])->middleware((['auth']));
Route::get('/forecast', [ForecastController::class, 'calculatingDayAverage'])->middleware(['auth']);

//Home page
Route::get('/', function () {
    return view('homepage');
});

//Team page
Route::get('/team', [TeamController::class, 'index']);

//favorites
Route::get('/favorites', function () {
    return view('favorites');
})->middleware(['auth']);
