@extends('layouts.app')

@section('content')
<section>
  <h1>{{ $deck->name }}</h1>
  <div class="space-between">
    <div>
      <h2>Pokémons in this deck</h2>
    </div>
    <div> 
      <form action="{{ route('deck.rename', ['deck' => $deck]) }}" method="post">
        @csrf
        <input type="text" name="name" id="name_{{ $deck->id }}" value="{{ $deck->name }}">
        <button type="submit">Renommer</button>
      </form>
    </div>
    <div>
      <form action="{{ route('deck.delete', ['deck' => $deck]) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit">Delete this deck</button>
      </form>
    </div>
  </div>
  <form action="{{ route('deck.add-pokemon', ['deck' => $deck]) }}" method="post">
    @csrf
    <select name="pokemon_id" id="pokemon_id_{{ $deck->id }}">
      <option value="">Sélectionnez un Pokémon</option>
      @foreach($pokemons as $pokemon)
        <option value="{{ $pokemon->id }}">{{ $pokemon->name }}</option>
      @endforeach
    </select>
    <input type="number" name="quantity" id="quantity_{{ $deck->id }}" value="1" min="1">
    <button type="submit">Add to deck</button>

  </form>
  <section class="pokemon-list">
  @foreach($deck->pokemons as $pokemon)
  <div class="pokemon-card {{ $pokemon->type1 }}">
    <p>
      <a href="{{ route('pokemon.detail', ['pokemon' => $pokemon]) }}">{{ $pokemon->name }}</a>
    </p>
    <p>{{ $pokemon->type1 }}</p>
    <img class="pokemon-image" src="{{ $pokemon->image_url }}" alt="{{ $pokemon->name }}">
    <hr>
    <p>Quantity: {{ $pokemon->pivot->quantity }}</p>
    <form action="{{ route('deck.remove-pokemon', ['deck' => $deck, 'pokemon' => $pokemon]) }}" method="post">
      @csrf
      @method('DELETE')
      <button type="submit">Remove from deck</button>
    </form>
  </div>
  @endforeach
@endsection