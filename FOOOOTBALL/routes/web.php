<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\GameController;
use Illuminate\Http\Request;

//-------------------------------------------------------------------------------------------------------------  ROUTE HOME

Route::get('/', [HomeController::class, 'index']);
Route::get('/success', [HomeController::class, 'success'])->name('success');

//-------------------------------------------------------------------------------------------------------------  ROUTE MENUS

Route::get('/fetch-menu', [MenuController::class, 'fetchMenu'])->name('fetch.menu');

//-------------------------------------------------------------------------------------------------------------  ROUTES TEAMS

Route::post('/teams', [TeamController::class, 'new'])->name('teams.new');
Route::get('/team/{id}', [TeamController::class, 'getTeamById'])->name('teams.getTeamById');
Route::get('/viewUpdateTeam/{id}', [TeamController::class, 'viewUpdateTeam'])->name('teams.viewUpdateTeam');
Route::get('/viewDeleteTeam/{id}', [TeamController::class, 'viewDeleteTeam'])->name('teams.viewDeleteTeam');
Route::post('/teamUpdate/{id}', [TeamController::class, 'updateTeam'])->name('teams.update');
Route::post('/teamDelete/{id}', [TeamController::class, 'deleteTeam'])->name('teams.delete');

//-------------------------------------------------------------------------------------------------------------  ROUTES GAMES

Route::post('/games', [GameController::class, 'new'])->name('games.new');
Route::get('/game/{id}', [GameController::class, 'getGameById'])->name('games.getGameById');
Route::get('/viewUpdateGame/{id}', [GameController::class, 'viewUpdateGame'])->name('games.viewUpdateGame');
Route::get('/viewDeleteGame/{id}', [GameController::class, 'viewDeleteGame'])->name('games.viewDeleteGame');
Route::post('/gameUpdate/{id}', [GameController::class, 'updateGame'])->name('games.update');
Route::post('/gameDelete/{id}', [GameController::class, 'deleteGame'])->name('games.delete');

//-------------------------------------------------------------------------------------------------------------  OTHER ROUTES

Route::get('/prova-ruta', function (Request $request) {
    dd($request->query()); // Això hauria de mostrar tots els paràmetres GET
});
