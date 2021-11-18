<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CovidController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/covid',[CovidController::class, 'index']);
Route::get('/covid/{id}', [CovidController::class, 'show']);
Route::put('/covid/{id}', [CovidController::class, 'update']);
Route::delete('/covid/{id}', [CovidController::class, 'destroy']);
Route::post('/covid', [CovidController::class, 'store']);
Route::get('/covid/search/{Name}', [CovidController::class, 'search']);
Route::get('/covid/searchstatus/{status}',[CovidController::class,'searchstatus']);

