<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PokemonController@read')->name('pokedex');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Routes gestion des équipes de pokemons
Route::get('/mon-equipe', 'EquipeController@monEquipe')->name('mon-equipe');
Route::get('/ajouter-equipe/{id}', 'EquipeController@addPokemon')->name('ajouter-equipe');
Route::get('/supprimer-equipe/{id}', 'EquipeController@deletePokemon')->name('supprimer-equipe');


//Groupe de routes pour les administrateurs
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function(){
    Route::get('/', 'AdminController@admin')->name('admin');

    //Routes création d'un pokemon
    Route::get('/create-pokemon', 'AdminController@createPokemon')->name('create-pokemon');
    Route::post('/create', 'PokemonController@create')->name('create');

    //Route gestion des types
    Route::get('/create-type', 'AdminController@createType')->name('create-type');
    Route::get('/read-type', 'TypeController@read')->name('read-type');
    Route::post('/new-type', 'TypeController@create')->name('new-type');
    Route::get('/generate-types', 'TypeController@generate')->name('generate-types');
    Route::get('/delete-type/{id}', 'TypeController@delete')->name('delete-type');
    Route::get('/delete-type', 'TypeController@deleteAll')->name('delete-types');

    //Gestion des utilisateurs
    Route::get('/utilisateurs', 'UserController@utilisateurs')->name('utilisateurs');
    Route::get('/utilisateur-equipe/{id}', 'EquipeController@utilisateurEquipe')->name('utilisateur-equipe');
    Route::get('/supprimer-pokemon-utilisateur/{idUser}/{idPoke}', 'EquipeController@deletePokeUser')->name('supprimer-pokemon-utilisateur');
    Route::get('/modif-role/{id}/{role}', 'UserController@updateRole')->name('modif-role');

    //Gestion des pokemons du pokedex
    Route::get('/pokemons', 'PokemonController@admin')->name('pokemons');
    Route::get('/delete-pokemon/{id}', 'PokemonController@delete')->name('delete-pokemon');


});