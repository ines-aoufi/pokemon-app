<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pokemon;
use App\Models\Deck;


class PokemonController extends Controller
{
    public function index()
    {
        $pokemons = Pokemon::all();

        return view("pokemon.list",
            [
                "pokemons" => $pokemons
            ]
        );
    }
    public function show(Pokemon $pokemon)
    {
        return view("pokemon.detail",
            [
                "pokemon" => $pokemon
            ]
        );
    }
    public function decks()
    {
        $decks = Deck::all();
        return view("deck.list",
            [
                "decks" => $decks
            ]
        );
    }
    public function decksDetail(Deck $deck)
    {
        return view("deck.detail",
            [
                "deck" => $deck
            ]
        );
    }
    public function search(Request $request){
    $search = $request->input('search');

    $pokemons = Pokemon::query()
        ->where('name', 'LIKE', "%{$search}%")
        ->get();

    return view('search', compact('pokemons'));
}
}
