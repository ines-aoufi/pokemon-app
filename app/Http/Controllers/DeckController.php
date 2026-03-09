<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pokemon;
use App\Models\Deck;

class DeckController extends Controller
{
    public function decks()
    {
        $decks = auth()->user()->decks ?? [];
        return view("deck.list",
            [
                "decks" => $decks
            ]
        );
    }

    public function decksDetail(Deck $deck)
    {
        $pokemons = Pokemon::all();
        return view("deck.detail",
            [
                "deck" => $deck,
                "pokemons" => $pokemons
            ]
        );
    }
    public function storeDeck(Request $request)
    {
        $deck = new Deck();
        $deck->name = $request->input('name');
        $deck->user_id = auth()->id();
        $deck->save();

        $pokemonIds = $request->input('pokemons', []);
        $deck->pokemons()->attach($pokemonIds);

        return redirect()->route('deck.list');
    }
    
    public function renameDeck(Request $request, Deck $deck)
    {
        $deck->name = $request->input('name');
        $deck->save();

        return redirect()->route('deck.list', ['deck' => $deck]);
    }

    public function deleteDeck(Deck $deck)
    {
        $deck->delete();
        return redirect()->route('deck.list');
    }

    public function addPokemon(Request $request, Deck $deck)
    {
        $validated = $request->validate([
            'pokemon_id' => 'required|exists:pokemons,id',
        ]);
    
        $deck->pokemons()->attach($validated['pokemon_id'], ['quantity' => 1]);

        return redirect()->route('deck.detail', ['deck' => $deck])
            ->with('success', 'Pokémon added to deck');
    }

    public function removePokemon(Deck $deck, Pokemon $pokemon)
    {
        $deck->pokemons()->detach($pokemon->id);
        
        return redirect()->route('deck.detail', ['deck' => $deck])
            ->with('success', 'Pokemon removed from deck');
    }
}
