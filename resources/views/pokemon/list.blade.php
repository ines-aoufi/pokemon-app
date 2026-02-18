<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pokémons</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<?php
function stripAccents($str) {
    return strtr(utf8_decode($str), utf8_decode('àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ'), 'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
}

function clean($string) {
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}
?>
<body>

<section>
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
      <a href="{{ route('pokemon.detail', ['pokemon' => $pokemon->id]) }}">View Details</a>
      <?php $pokemon_no_accents = strtolower(clean(stripAccents($pokemon->name))); ?>
      <img class="pokemon-image" src="{{asset('pokemons_images/').'/'.$pokemon_no_accents}}.png" alt="{{ $pokemon->name }}">
    </div>  
    @endforeach
  </div>
</section>
</body>
</html>

<style>
    h2{
    margin: 0;
    padding: 0;
  }
  hr{
    margin: 10px 0;
    border: 1 solid gray;
  }
  p{
    margin: 0;
    padding: 0;
    text-align: left;
  }

  .pokedex-number{
    position: relative;
    top: 0px;
    left: 0px;  
    font-weight: bold;
    font-size: 14px;
    text-align: left;
  }
  .grass{
    border: 3px solid #78C850;
  }
  .water{
    border: 3px solid #6890F0;
  }
  .fire{
    border: 3px solid #F08030;
  }
  .bug{
    border: 3px solid #A8B820;
  }
  .normal{
    border: 3px solid #A8A878;
  }
  .poison{
    border: 3px solid #A040A0;
  }
  .ghost{
    border: 3px solid #705898;
  }
  .fairy{
    border: 3px solid #EE99AC;
  }
  .electric{
    border: 3px solid #F8D030;
  }
  .fighting{
    border: 3px solid #C03028;
  }
  .psychic{
    border: 3px solid #F85888;
  }
  .rock{
    border: 3px solid #B8A038;
  }
  .ground{
    border: 3px solid #E0C068;
  }
  .dragon{
    border: 3px solid #7038F8;
  }
  .dark{
    border: 3px solid #705848;
  }
  .ice{
    border: 3px solid #98D8D8;  
  }
  .steel{
    border: 3px solid #B8B8D0;
  }
  .flying{
    border: 3px solid #A890F0;
  }

  .pokemon-image{
    width: 80%;
    height: auto;
    image-rendering: optimizeSpeed;             /* STOP SMOOTHING, GIVE ME SPEED  */
    image-rendering: -moz-crisp-edges;          /* Firefox                        */
    image-rendering: -o-crisp-edges;            /* Opera                          */
    image-rendering: -webkit-optimize-contrast; /* Chrome (and eventually Safari) */
    image-rendering: pixelated;                 /* Universal support since 2021   */
    image-rendering: optimize-contrast;         /* CSS3 Proposed                  */
    -ms-interpolation-mode: nearest-neighbor;   /* IE8+                           */
  }
  .pokemon-list {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    gap: 20px;
  }
  .pokemon-card {
    border-radius: 10px;
    padding: 16px;
    text-align: center;
    width: 15%;
  }


</style>