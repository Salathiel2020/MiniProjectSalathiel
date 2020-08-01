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
    return view('welcome');
});




// Pokemons

Route::get('/pokemons', 'PokemonsController@PokemonsStore')->name('PokemonsStore');

Route::get('/pokemons/{id}', 'PokemonsController@Details')->name('PokemonsDetails');

Route::post('/pokemons/comment', 'PokemonsController@AddComment')->name('PokemonsComments');

// Pokemons adm

Route::get('/admin/pokemons', 'PokemonsController@Index');

Route::get('/admin/pokemons/create', "PokemonsController@Create");

Route::post('/admin/pokemons/create', "PokemonsController@Store");

Route::get('/admin/pokemons/delete/{id}', "PokemonsController@Delete");

Route::get('/admin/pokemons/edit/{id}', "PokemonsController@Edit");

Route::get('/admin/pokemons/{id}', "PokemonsController@Show");

Route::post('/admin/pokemons/edit', "PokemonsController@Update");

Route::delete('/admin/pokemons/delete', "PokemonsController@Remove");


// Gpus

Route::get('/gpus', 'GpusController@GpusStore')->name('GpusStore');

Route::get('/gpus/{id}', 'GpusController@Details')->name('GpusDetails');

Route::post('/gpus/comment', 'GpusController@AddComment')->name('GpusComments');

// Gpus adm

Route::get('/admin/gpus', 'GpusController@Index');

Route::get('/admin/gpus/create', "GpusController@Create");

Route::post('/admin/gpus/create', "GpusController@Store");

Route::get('/admin/gpus/delete/{id}', "GpusController@Delete");

Route::get('/admin/gpus/edit/{id}', "GpusController@Edit");

Route::get('/admin/gpus/{id}', "GpusController@Show");

Route::post('/admin/gpus/edit', "GpusController@Update");

Route::delete('/admin/gpus/delete', "GpusController@Remove");


// Anime

Route::get('/animes', 'AnimesController@AnimesStore')->name('AnimesStore');

Route::get('/animes/{id}', 'AnimesController@Details')->name('AnimesDetails');

Route::post('/animes/comment', 'AnimesController@AddComment')->name('AnimesComments');

// Anime adm

Route::get('/admin/animes', 'AnimesController@Index');

Route::get('/admin/animes/create', "AnimesController@Create");

Route::post('/admin/animes/create', "AnimesController@Store");

Route::get('/admin/animes/delete/{id}', "AnimesController@Delete");

Route::get('/admin/animes/edit/{id}', "AnimesController@Edit");

Route::get('/admin/animes/{id}', "AnimesController@Show");

Route::post('/admin/animes/edit', "AnimesController@Update");

Route::delete('/admin/animes/delete', "AnimesController@Remove");


// Videogames

Route::get('/videogames', 'VideogamesController@VideogamesStore')->name('VideogamesStore');

Route::get('/videogames/{id}', 'VideogamesController@Details')->name('VideogamesDetails');

Route::post('/videogames/comment', 'VideogamesController@AddComment')->name('VideogamesComments');

// Videogames adm

Route::get('/admin/videogames', 'VideogamesController@Index');

Route::get('/admin/videogames/create', "VideogamesController@Create");

Route::post('/admin/videogames/create', "VideogamesController@Store");

Route::get('/admin/videogames/delete/{id}', "VideogamesController@Delete");

Route::get('/admin/videogames/edit/{id}', "VideogamesController@Edit");

Route::get('/admin/videogames/{id}', "VideogamesController@Show");

Route::post('/admin/videogames/edit', "VideogamesController@Update");

Route::delete('/admin/videogames/delete', "VideogamesController@Remove");



Route::get('/mongodb', function () {
    return view('mongodb');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

