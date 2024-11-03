<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\GameController;

Route::get('/', function () {
    return view('home');
});

Route::get('/fetch-menu', [MenuController::class, 'fetchMenu'])->name('fetch.menu');

Route::post('/teams', [TeamController::class, 'store'])->name('teams.store');

Route::get('/teams', [TeamController::class, 'index'])->name('teams.index');

Route::post('/games', [GameController::class, 'store'])->name('games.store');