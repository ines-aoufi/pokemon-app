<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pokemon;
use App\Models\Deck;


class PokemonController extends Controller
{
    public function index(Request $request)
    {
        $pokemons = Pokemon::all();
        $unfiltered_pokemons = Pokemon::all();
        $types = $unfiltered_pokemons->pluck('type1')->unique();

        if($request->filled('type')) {

        $pokemons = Pokemon::query()
        ->whereIn('type1', [$request->input('type')])
        ->orWhereIn('type2', [$request->input('type')])
        ->get()
        ->sortBy('id');
        }
        return view('pokemon.list', compact('types', 'pokemons', 'request'));
    }

    public function show(Pokemon $pokemon)
    {
        return view("pokemon.detail",
            [
                "pokemon" => $pokemon
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
