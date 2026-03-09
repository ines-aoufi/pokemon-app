@extends('layouts.app')

@section('content')
<body>
<h1>Pokémons</h1>
<div class="filter">
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
</div>

<section>
  @if($pokemons->isNotEmpty())
  <div class="pokemon-list">
    @foreach ($pokemons as $pokemon)
    <div class="pokemon-card {{ $pokemon->type1 }}">
      <p class="pokedex-number">{{ $pokemon->pokedex_number }}</p>
      <h2>{{ $pokemon->name }}</h2>
      <hr>
      <p>Type: {{ $pokemon->type1 }}</p>
      @if ($pokemon->type2)
      <p>Second type: {{ $pokemon->type2 }}</p>
      @endif
      <img class="pokemon-image" src="{{ $pokemon->image_url }}" alt="{{ $pokemon->name }}">
      <button><a href="{{ route('pokemon.detail', ['pokemon' => $pokemon->id]) }}">View Details</a></button>
    </div>  
    @endforeach
  </div>
@else 
    <div>
        <h2>No pokemons found</h2>
    </div>
@endif
{{ $pokemons->links() }}
</section>
</body>
</html>
@endsection