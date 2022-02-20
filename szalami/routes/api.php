<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\SzalamiController;
use App\Http\Controllers\API\AuthController;

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
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::get ('szalamis', [SzalamiController::class, 'index']);  
Route::post ('szalamis', [SzalamiController::class, 'store']);
Route::get ('szalamis/{szalami}', [SzalamiController::class, 'show']); 
Route::put ('szalamis/{szalami}', [SzalamiController::class, 'update']);
Route::delete('szalamis/{szalami}', [SzalamiController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


