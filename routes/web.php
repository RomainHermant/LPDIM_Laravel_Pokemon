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

Route::get('/', 'PokemonController@read');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function(){
    Route::get('/', 'AdminController@admin')->name('admin');

    Route::get('/create-pokemon', 'AdminController@createPokemon')->name('create-pokemon');
    Route::post('/create', 'PokemonController@create')->name('create');

    Route::get('/create-type', 'AdminController@createType')->name('create-type');
    Route::get('/read-type', 'TypeController@read')->name('read-type');
    Route::post('/new-type', 'TypeController@create')->name('new-type');
    Route::get('/generate-types', 'TypeController@generate')->name('generate-types');
    Route::get('/delete-type/{id}', 'TypeController@delete')->name('delete-type');
    Route::get('/delete-type', 'TypeController@deleteAll')->name('delete-types');


});