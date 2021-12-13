<?php

use App\Http\Controllers\SearchboxController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\TeamController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

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

//API LUX DATA
Route::get('/readApiLux',  [ApiController::class, 'readApiLux']);
Route::get('/readApiTransform',  [ApiController::class, 'transformCoordinates']);

require __DIR__ . '/auth.php';

// Route::get('/testSB', [TestController::class, 'index']);
Route::get('/searchbox', [SearchboxController::class, 'index']);
Route::get('/map', [MapController::class, 'index']);



//Home page
Route::get('/', function () {
    return view('homepage');
});


//Team page
Route::get('/team', [TeamController::class, 'index']);
