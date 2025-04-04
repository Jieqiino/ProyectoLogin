<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('formulario.login');
});

Route::post('login', [AuthController::class,'login']);
Route::post('register', [AuthController::class,'register']);
Route::group(['middleware' => 'auth:api'], function () {
        Route::get('details', [AuthController::class,'details']);
        Route::get('logout', [AuthController::class,'logout']);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('profesor/inicio', [App\Http\Controllers\ProfesorController::class, 'index'])->name('profesor.inicio');
require __DIR__.'/auth.php';
