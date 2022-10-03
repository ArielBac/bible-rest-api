<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\TestamentController;
use App\Http\Controllers\VerseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Testament, Book and Verse Routs - multiple apiResources()
Route::apiResources([
    'testament' => TestamentController::class,
    'book' => BookController::class,
    'verse' => VerseController::class,
]);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * -------------------------------------
 * Routes without apiResource() method
 * -------------------------------------
 *
 * // Testament Routs
 * Route::post('/testament', [TestamentController::class, 'store']);
 * Route::get('/testament', [TestamentController::class, 'index']);
 * Route::get('/testament/{id}', [TestamentController::class, 'show']);
 * Route::put('/testament/{id}', [TestamentController::class, 'update']);
 * Route::delete('/testament/{id}', [TestamentController::class, 'destroy']);
 *
 * // Books Routs
 * Route::post('/book', [BookController::class, 'store']);
 * Route::get('/book', [BookController::class, 'index']);
 * Route::get('/book/{id}', [BookController::class, 'show']);
 * Route::put('/book/{id}', [BookController::class, 'update']);
 * Route::delete('/book/{id}', [BookController::class, 'destroy']);
 *
 * // Books Routs
 * Route::post('/verse', [VerseController::class, 'store']);
 * Route::get('/verse', [VerseController::class, 'index']);
 * Route::get('/verse/{id}', [VerseController::class, 'show']);
 * Route::put('/verse/{id}', [VerseController::class, 'update']);
 * Route::delete('/verse/{id}', [VerseController::class, 'destroy']);
 */

 /**
  * ------------------------------------------
  * Routes with apiResouce() method, single
  * ------------------------------------------
  * // Tetament Routes
  * Route::apiResource('/testament', TestamentController::class);
  *
  * // Book Routs
  * Route::apiResource('/book', BookController::class);
  *
  * // Verse Routs
  * Route::apiResource('/verse', VerseController::class);
  */
