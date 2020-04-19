<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pokemon;
use App\Type;
use App\User;
use Illuminate\Support\Facades\Auth;
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

        $poke->type()->associate(Type::find($request->post('type')));

        $file = $request->file('image');
        $name = 
        $poke->image = $file->getClientOriginalName();
        $file->move('storage/images/', $file->getClientOriginalName());

        $poke->save();

        return redirect('/');
    }

    public function read() {
        $data = Pokemon::with(['type' => function($query) {
            $query->select('id', 'libelle', 'couleur', 'couleurTxt');
        }])->get();
        $user = User::find(Auth::id());
        return view('pokedex', compact('data', 'user'));
    }

    public function admin() {
        $data = Pokemon::with(['type' => function($query) {
            $query->select('id', 'libelle', 'couleur', 'couleurTxt');
        }])->get();
        return view('/pokedex-admin', compact('data'));
    }

    public function delete($id) {
        $pokemon = Pokemon::find($id);
        foreach (User::all() as $u) {
            $pokemon->users()->detach($u->id);
        }

        $delete = Pokemon::where('id', $id)->get();
        foreach($delete as $d) {
            $d->delete();
        }
    
        return redirect('/admin/pokemons');
    }
}
