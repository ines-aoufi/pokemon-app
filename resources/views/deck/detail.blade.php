<section>
  <p>{{ $deck->name }}</p>
  <p>{{ $deck->description }}</p>
  <h3>Pokémons in this deck</h3>
  <form action="{{ route('deck.add-pokemon', ['deck' => $deck]) }}" method="post">
    @csrf
    <select name="pokemon_id" id="pokemon_id_{{ $deck->id }}">
      <option value="">Sélectionnez un Pokémon</option>
      @foreach($pokemons as $pokemon)
        <option value="{{ $pokemon->id }}">{{ $pokemon->name }}</option>
      @endforeach
    </select>
    <input type="number" name="quantity" id="quantity_{{ $deck->id }}" value="1" min="1">
    <button type="submit">Ajouter au deck</button>

  </form>
  @foreach($deck->pokemons as $pokemon)
    <p>
      <a href="{{ route('pokemon.detail', ['pokemon' => $pokemon]) }}">{{ $pokemon->name }}</a>
    </p>
    <p>{{ $pokemon->type1 }}</p>
    <p>Quantity: {{ $pokemon->pivot->quantity }}</p>
    <hr>
  @endforeach 
    <form action="{{ route('deck.rename', ['deck' => $deck]) }}" method="post">
      @csrf
      <input type="text" name="name" id="name_{{ $deck->id }}" value="{{ $deck->name }}">
      <button type="submit">Renommer</button>
    </form>

    <form action="{{ route('deck.delete', ['deck' => $deck]) }}" method="post">
      @csrf
      @method('DELETE')
      <button type="submit">Supprimer</button>
    </form>
    <a href="{{ route('deck.list') }}">Back to Decks</a>
</section>
