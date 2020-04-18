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
        $pokemon->users()->sync([Auth::id()]);
        return redirect('/mon-equipe');
    }
}
