<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;

Route::get('/', function () {
    return view('home');
});

Route::get('/fetch-menu', [MenuController::class, 'fetchMenu'])->name('fetch_menu');
