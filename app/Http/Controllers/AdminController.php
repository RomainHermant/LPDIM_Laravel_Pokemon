<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function admin()
    {
        return view('admin');
    }

    public function createPokemon()
    {
        $data['data'] = DB::table('types')->get();
        return view('create-pokemon',$data);
    }

    public function createType()
    {
        return view('create-type');
    }
}
