<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/pokemons', [App\Http\Controllers\PokemonController::class, 'index'])->name('pokemon.index');
Route::get('/pokemon/{pokemon}', [App\Http\Controllers\PokemonController::class, 'show'])->name('pokemon.detail');
Route::get('/search', [App\Http\Controllers\PokemonController::class, 'search'])->name('search');

Route::get('/decks', [App\Http\Controllers\DeckController::class, 'decks'])->name('deck.list');
Route::post('/decks', [App\Http\Controllers\DeckController::class, 'storeDeck'])->name('deck.store');
Route::post('/decks/{deck}/add-pokemon', [App\Http\Controllers\DeckController::class, 'addPokemon'])->name('deck.add-pokemon');
Route::delete('/decks/{deck}/pokemon/{pokemon}', [App\Http\Controllers\DeckController::class, 'removePokemon'])->name('deck.remove-pokemon');
Route::get('/decks/{deck}', [App\Http\Controllers\DeckController::class, 'decksDetail'])->name('deck.detail');
Route::post('/decks/{deck}', [App\Http\Controllers\DeckController::class, 'renameDeck'])->name('deck.rename');
Route::delete('/decks/{deck}', [App\Http\Controllers\DeckController::class, 'deleteDeck'])->name('deck.delete');
