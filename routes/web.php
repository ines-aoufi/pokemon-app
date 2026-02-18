<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/pokemon', [App\Http\Controllers\PokemonController::class, 'index'])->name('pokemon.index');
Route::get('/pokemon/{pokemon}', [App\Http\Controllers\PokemonController::class, 'show'])->name('pokemon.detail');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/decks', [App\Http\Controllers\PokemonController::class, 'decks'])->name('deck.list');
Route::get('/decks/{deck}', [App\Http\Controllers\PokemonController::class, 'decksDetail'])->name('deck.detail');

Route::get('/search', [App\Http\Controllers\PokemonController::class, 'search'])->name('search');
Route::get('/filter', [App\Http\Controllers\PokemonController::class, 'filterType'])->name('filter');