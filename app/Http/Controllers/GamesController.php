<?php

namespace App\Http\Controllers;

use App\Models\games;
use Illuminate\Http\Request;

class GamesController extends Controller
{

    public function goster()
    {
//        $newGame = new games();
//        $newGame->name = 'Warcraft';
//        $newGame->save();
        $getRecord = games::query()
            ->where('name', 'Warcraft')
            ->get();

        return view('games', compact('getRecord'));
    }

}
