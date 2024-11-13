<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Game;

class MenuController extends Controller{

    public function fetchMenu(Request $request) {
        $teams = Team::all();
        $games = Game::with(['homeTeam', 'awayTeam'])->get();
        $dataType = $request->query('type');
    
        if (in_array($dataType, ['new', 'view', 'update', 'delete'])) {
            
            $html = view("menus.$dataType", compact('teams', 'games'))->render();
    
            return response()->json(['html' => $html]);

        } else {
            
            return response()->json(['html' => '<p>Contingut no disponible.</p>']);
        }
    }
    

}

