<?php

use App\Http\Controllers\JobController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
});

Route::get('/getData', [JobController::class, 'getData']);
Route::get('/getDataFirst', [JobController::class, 'getDataFirst']);
Route::get('/getDataCountApplied', [JobController::class, 'getDataCountApplied']);
Route::get('/getDataApplied', [JobController::class, 'getDataApplied']);
Route::post('/store', [JobController::class, 'store']);
Route::delete('/remove', [JobController::class, 'remove']);