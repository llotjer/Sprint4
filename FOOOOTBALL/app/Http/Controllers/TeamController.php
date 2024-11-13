<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;

class TeamController extends Controller{

    //-------------------------------------------------------------------------------------------- GET_TEAM_BY_ID

    public function getTeamById($id){

        try {
    
        $team = Team::findOrFail($id);

        //dump($id);
        //dump($team);

        $html = view('team.viewTeam', compact('team'))->render();

        //dump($html);

        return response()->json(['html' => $html], 200);
    
        } catch (ModelNotFoundException $e) {
    
            return response("<p>No s'ha trobat l'id</p>", 404);
    
        } catch (Exception $e) {
                
            return response("<p>Hi ha hagut algun error buscant l'id</p>", 500);
        }

    }

    //-------------------------------------------------------------------------------------------------------------------------------------------- NEW

    public function new(Request $request){

        //dd($request->all());

        $validatedData = $request->validate([
            'name' => 'required|string|max:25',
            'AKA' => 'required|string|max:3',
            'type' => 'required|string|in:school,club',
            'location' => 'required|string|max:25',
        ]);

        //dd($request->all());

        Team::create($validatedData);

        //dd('Reached redirect point');

        return response()->json([
            'html' => view('success')->render()
        ]);
    }


    //-------------------------------------------------------------------------------------------------------------------------------------------- UPDATE

    public function viewUpdateTeam($id){

        try {
    
        $team = Team::findOrFail($id);

        $html = view('team.viewUpdateTeam', compact('team'))->render();

        return response()->json(['html' => $html], 200);

        } catch (ModelNotFoundException $e) {
        
            return response("<p>No s'ha trobat l'id</p>", 404);

        } catch (Exception $e) {
                
            return response("<p>Hi ha hagut algun error buscant l'id</p>", 500);
        }

    }

    public function updateTeam(Request $request, $id){

        try {

            //dump($request->all());
    
            $team = Team::findOrFail($id);

            $request->validate([

            'name' => 'required|string|max:25',
            'AKA' => 'required|string|max:3',
            'type' => 'required|string|in:school,club',
            'location' => 'required|string|max:25',

            ]);

            $team->name = $request->input('name');
            $team->AKA = $request->input('AKA');
            $team->type = $request->input('type');
            $team->location = $request->input('location');

            $team->save();

            return response()->json([
                'html' => view('success')->render()
            ]);
        
        } catch (ModelNotFoundException $e) {
        
            return response("<p>No s'ha trobat l'id</p>", 404);

        } catch (Exception $e) {
                
            return response("<p>Hi ha hagut algun error buscant l'id</p>", 500);
        }


    }

    //-------------------------------------------------------------------------------------------------------------------------------------------- DELETE

    public function viewDeleteTeam($id){

        try {
    
        $team = Team::findOrFail($id);

        $html =  view('team.viewDeleteTeam', compact('team'))->render();

        return response()->json(['html' => $html], 200);

        } catch (ModelNotFoundException $e) {
        
            return response("<p>No s'ha trobat l'id</p>", 404);

        } catch (Exception $e) {
                
            return response("<p>Hi ha hagut algun error buscant l'id</p>", 500);
        }

    }

    public function deleteTeam($id){

        Team::destroy($id);

        return response()->json([
            'html' => view('success')->render()
        ]);
    }
}
