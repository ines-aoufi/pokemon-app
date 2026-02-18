<section>
  <p>{{ $deck->name }}</p>
  <p>{{ $deck->description }}</p>
  <h3>Pokémons in this deck</h3>
  @foreach($deck->pokemons as $pokemon)
    <p>
      <a href="{{ route('pokemon.detail', ['pokemon' => $pokemon]) }}">{{ $pokemon->name }}</a>
    </p>
    <p>{{ $pokemon->type1 }}</p>
    <p>Quantity: {{ $pokemon->pivot->quantity }}</p>
    @endforeach 
</section>
