<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::post('/registerAdmin', [UserController::class, 'create']);
    Route::get('/search', [UserController::class, 'search']);
    Route::delete('/deleteUser', [UserController::class, 'delete']);
});

Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
});