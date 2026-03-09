<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pokémons</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" />
</head>

<body>

<p>Filtrer par type :</p>
<form action="{{ route('pokemon.index') }}" method="GET">
    <select name="type" required>
        <option value="">Select a type</option>
        @foreach($types as $type)
          <option value="{{ $type }}"
          @if($request->input('type') == $type)
          selected
          @endif>
          {{ $type }}</option>
        @endforeach
    </select>
    <button type="submit">Filter</button>
</form>

<section>
  @if($pokemons->isNotEmpty())
  <div class="pokemon-list">
    @foreach ($pokemons->take(20) as $pokemon)
    <div class="pokemon-card {{ $pokemon->type1 }}">
      <p class="pokedex-number">{{ $pokemon->pokedex_number }}</p>
      <h2>{{ $pokemon->name }}</h2>
      <hr>
      <p>Type: {{ $pokemon->type1 }}</p>
      @if ($pokemon->type2)
      <p>Second type: {{ $pokemon->type2 }}</p>
      @endif
      <a href="{{ route('pokemon.detail', ['pokemon' => $pokemon->id]) }}">View Details</a>
      <img class="pokemon-image" src="{{ $pokemon->image_url }}" alt="{{ $pokemon->name }}">
    </div>  
    @endforeach
  </div>
@else 
    <div>
        <h2>No pokemons found</h2>
    </div>
@endif
</section>
</body>
</html>