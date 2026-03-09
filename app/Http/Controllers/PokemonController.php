<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pokemon;
use App\Models\Deck;


class PokemonController extends Controller
{
    public function index(Request $request)
    {
        $unfiltered_pokemons = Pokemon::all();
        $types = $unfiltered_pokemons->pluck('type1')->unique();

        $pokemons = Pokemon::query();

        if($request->filled('type')) {
            $pokemons = $pokemons
                ->whereIn('type1', [$request->input('type')])
                ->orWhereIn('type2', [$request->input('type')]);
        }

        $pokemons = $pokemons->paginate(50);
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
