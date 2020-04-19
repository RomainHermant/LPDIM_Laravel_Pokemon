<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pokemon;
use App\User;
use Illuminate\Support\Facades\Auth;


class EquipeController extends Controller
{
    public function monEquipe() {

        $user = User::find(Auth::id());
        return view('mon-equipe', compact('user'));
    }

    public function addPokemon($id) {
        $pokemon = Pokemon::find($id);
        $user = User::find(Auth::id());
        $in_db = false;
        foreach ($user->pokemons as $p) {
            if ($id == $p->id) {
                $in_db = true;
            }
        }

        if (!$in_db) {
            $pokemon->users()->attach([Auth::id()]);
        }
        
        return redirect('/mon-equipe');
    }

    public function deletePokemon($id) {
        $pokemon = Pokemon::find($id);
        $pokemon->users()->detach([Auth::id()]);
        return redirect('/mon-equipe');
    }

    public function utilisateurEquipe($id) {

        $user = User::find($id);
        return view('user-equipe-content', compact('user'));
    }

    public function deletePokeUser($idUser, $idPoke) {
        $pokemon = Pokemon::find($idPoke);
        $pokemon->users()->detach($idUser);
        return redirect('/admin/utilisateurs');
    }
}
