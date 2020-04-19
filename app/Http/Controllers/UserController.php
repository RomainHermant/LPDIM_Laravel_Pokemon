<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function utilisateurs() {
        $users = User::all();

        return view('utilisateurs', compact('users'));
    }

    public function updateRole($id, $role) {
        
        $user = User::find($id);
        if ($role == 'admin') {
            $user->admin = true;
        } elseif ($role == 'user') {
            $user->admin = false;
        }
        $user->save();

        return redirect('/admin/utilisateurs');
    }
}
