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

Route::get('/', function () {
    return view('pokedex');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function(){
    Route::get('/', 'AdminController@admin')->name('admin');
    Route::get('/create-pokemon', 'AdminController@createPokemon')->name('create-pokemon');
    Route::post('/create', 'PokemonController@create')->name('create');

});