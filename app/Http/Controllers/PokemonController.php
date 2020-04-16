<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pokemon;
use DB;

class PokemonController extends Controller
{
    public function create(Request $request) {
        $poke = new Pokemon();
        $poke->nom = $request->post('nom');
        $poke->pv = $request->post('pv');
        $poke->attaque = $request->post('attaque');
        $poke->defense = $request->post('defense');
        $poke->attaque_spe = $request->post('attaque_spe');
        $poke->defense_spe = $request->post('defense_spe');
        $poke->vitesse = $request->post('vitesse');
        $poke->taille = $request->post('taille');
        $poke->poids = $request->post('poids');

        $file = $request->file('image');
        $name = 
        $poke->image = $file->getClientOriginalName();
        $file->move('storage/images/', $file->getClientOriginalName());

        $poke->save();

        return redirect('/');
    }

    public function read() {
        $data['data'] = DB::table('pokemon')->get();
        return view('pokedex',$data);
    }
}
