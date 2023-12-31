<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AccountController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
    Route::post('/logout', [AccountController::class, 'logout']);
});
// Route::middleware(['auth.api'])->group(function () {
//     Route::get('/profiles', [ProfileController::class, 'index']);
//     Route::get('/profiles/{id}', [ProfileController::class, 'show']);
//     Route::post('/profiles', [ProfileController::class, 'store']);
//     Route::put('/profiles/{id}', [ProfileController::class, 'update']);
//     Route::delete('/profiles/{id}', [ProfileController::class, 'destroy']);
// });
Route::middleware('auth:sanctum')->post('/logout', 'AuthController@logout');


Route::resource('profiles', ProfileController::class);
Route::get('/api/profiles/{id}', [ProfileController::class, 'show']);
Route::post('/api/profiles', [ProfileController::class, 'store']);
Route::patch('/api/profiles/{id}', [ProfileController::class, 'update']);
Route::delete('/api/profiles/{id}', [ProfileController::class, 'destroy']);


Route::post('/register', [AccountController::class, 'register']);
Route::post('/login', [AccountController::class, 'login']);
Route::post('/logout', [AccountController::class, 'logout']);


// Route::post('/login', [ProfileController::class, 'login']);
// Route::post('/logout', [ProfileController::class, 'logout']);

Route::resource('/profiles', ProfileController::class);
