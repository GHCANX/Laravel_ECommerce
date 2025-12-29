<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\PgpLoginController;
use App\Http\Controllers\Auth\PgpChallengeController;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('guest')->group(function () {

    Route::get('/login', [PgpLoginController::class, 'show'])
        ->name('login');

    Route::post('/login', [PgpLoginController::class, 'submitKey'])
        ->middleware('throttle:5,1');

    Route::get('/login/challenge', [PgpChallengeController::class, 'show']);

    Route::post('/login/challenge', [PgpChallengeController::class, 'verify'])
        ->middleware('throttle:5,1');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', fn () => auth()->logout())->name('logout');
});
