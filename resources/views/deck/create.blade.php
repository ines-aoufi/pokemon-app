<p>Création d'un deck</p>
<form action="{{ route('deck.create') }}" method="post">
  @csrf
  <label for="name">Nom du deck</label>
  <input type="text" name="name" id="name">
  <select name="pokemon_id" id="pokemon_id" multiple>
    @foreach($pokemons as $pokemon)
      <option value="{{ $pokemon->id }}">{{ $pokemon->name }}</option>
    @endforeach
  </select>
  </option>
  <input type="text" name="description" id="description">
</form>