@extends('layouts.app')

@section('content')
<section class="center">
  <h2>{{ $pokemon->name }}</h2>
  <hr class="{{ strtolower($pokemon->type1) }}">
  <em>Generation {{ $pokemon->generation }}</em>
  <div>
    <img class="pokemon-image" src="{{$pokemon->image_url}}" alt="{{ $pokemon->name }}">
  </div>
  <p><strong>Type:</strong> {{ $pokemon->type1 }}</p>
  @if ($pokemon->type2)
  <p><strong>Second Type:</strong> {{ $pokemon->type2 }}</p>
  @endif
  @if ($pokemon->is_legendary)
  <p><strong>Legendary Pokémon</strong></p>
  @endif
  
  <h3>Stats</h3>
  @if ($pokemon->weight_kg)
  <p>Weight : {{ $pokemon->weight_kg }} kg</p>
  @endif
  @if ($pokemon->height_m)
  <p>Height : {{ $pokemon->height_m }} m</p>
  @endif
  <p>Speed: {{ $pokemon->speed }}</p>
  <p>Attack: {{ $pokemon->attack }}</p>
  <p>Defense: {{ $pokemon->defense }}</p>
  <p>Special Defense: {{ $pokemon->sp_defense }}</p>
  <p>Special Attack: {{ $pokemon->sp_attack }}</p>

</section>
@endsection