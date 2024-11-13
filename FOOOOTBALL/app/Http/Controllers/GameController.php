<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;

class GameController extends Controller{

    //-------------------------------------------------------------------------------------------- GET_GAME_BY_ID

    public function getGameById($id){

        try {

        $game = Game::findOrFail($id);

        //dump($id);

        $html = view('game.viewGame', compact('game'))->render();

        //dump($html);

        return response()->json(['html' => $html]);

        } catch (ModelNotFoundException $e) {

            return response("<p>No s'ha trobat l'id</p>", 404);

        } catch (Exception $e) {
            
            return response("<p>Hi ha hagut algun error buscant l'id</p>", 500);
        }
    }

    //-------------------------------------------------------------------------------------------- NEW

    public function new(Request $request){

        //dd($request->all());

        $validatedData = $request->validate([
            'home_team_id' => 'required|exists:teams,id',
            'away_team_id' => 'required|exists:teams,id',
            'game_date' => 'required|date',
        ]);

        //dd(Game::create($validatedData));

        Game::create($validatedData);

        //dd('Reached redirect point');

        return response()->json([
            'html' => view('success')->render()
        ]);
    }

    //-------------------------------------------------------------------------------------------- UPDATE

    public function viewUpdateGame($id){

        try {

        $teams = Team::all();
    
        $game = Game::findOrFail($id);

        //dd($id);

        $html = view('game.viewUpdateGame', compact('game', 'teams'))->render();

        //dd($html);

        return response()->json(['html' => $html], 200);

        } catch (ModelNotFoundException $e) {
        
            return response("<p>No s'ha trobat l'id</p>", 404);

        } catch (Exception $e) {
                
            return response("<p>Hi ha hagut algun error buscant l'id</p>", 500);
        }

    }

    public function updateGame(Request $request, $id){

        try {

            $game = Game::findOrFail($id);

            $request->validate([
                'home_team' => 'required|exists:teams,id', 
                'away_team' => 'required|exists:teams,id',
                'game_date' => 'required|date',
                'location' => 'nullable|string|max:255',
            ]);

            $game->home_team_id = $request->input('home_team');
            $game->away_team_id = $request->input('away_team');
            $game->game_date = $request->input('game_date');
            $game->location = $request->input('location');
    
            $game->save();
    
            return response()->json([
                'html' => view('success')->render()
            ]);
    
        } catch (ModelNotFoundException $e) {

            return response("<p>No s'ha trobat l'id</p>", 404);
    
        } catch (Exception $e) {

            return response("<p>Hi ha hagut algun error buscant l'id</p>", 500);
        }
    }
    
    //-------------------------------------------------------------------------------------------- DELETE

    public function viewDeleteGame($id){

        try {
    
        $game = Game::findOrFail($id);

        $html =  view('game.viewDeleteGame', compact('game'))->render();

        return response()->json(['html' => $html], 200);

        } catch (ModelNotFoundException $e) {
        
            return response("<p>No s'ha trobat l'id</p>", 404);

        } catch (Exception $e) {
                
            return response("<p>Hi ha hagut algun error buscant l'id</p>", 500);
        }

    }

    public function deleteGame($id){

        Game::destroy($id);

        return response()->json([
            'html' => view('success')->render()
        ]);
    }

}
