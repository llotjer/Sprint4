<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MenuController extends Controller{

    public function fetchMenu(Request $request) {

        $dataType = $request->query('type');
        $validMenus = ['new', 'view', 'update', 'delete'];

        if (in_array($dataType, $validMenus)) {

            $html = view("menus.$dataType")->render();

            return response()->json(['html' => $html]);
        } else {
            return response()->json(['html' => '<p>Contingut no disponible.</p>']);
        }
    }

}