<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('register', [AuthController::class, 'register']);
Route::group(['middleware' => 'auth:api'], function () {
    Route::get('details', [AuthController::class, 'details']);
    Route::get('logout', [AuthController::class, 'logout']);
});