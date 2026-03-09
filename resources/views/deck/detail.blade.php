@extends('layouts.app')
@section('scripts')
<section class="container">
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

  <button id="openPokemonModal_{{ $deck->id }}">Add Pokémon to Deck</button>

  <!-- Modal -->
  <div id="pokemonModal_{{ $deck->id }}" class="modal" style="display: none;">
    <div class="modal-content">
      <span class="close" id="closeModal_{{ $deck->id }}">&times;</span>
      <h2>Select Pokémon to Add</h2>
      
      <input 
        type="text" 
        id="pokemon_search_{{ $deck->id }}" 
        class="search-input"
        placeholder="Search for a Pokémon...">
      
      <div id="pokemon_list_{{ $deck->id }}" class="pokemon-grid">
        @foreach($pokemons->take(50) as $pokemon)
          <div class="pokemon-option {{ $pokemon->type1 }}" data-name="{{ strtolower($pokemon->name) }}" data-id="{{ $pokemon->id }}">
            <img src="{{ $pokemon->image_url }}" alt="{{ $pokemon->name }}" class="pokemon-thumb">
            <p>{{ $pokemon->name }}</p>
            <p class="type-badge">{{ $pokemon->type1 }}</p>
            <form action="{{ route('deck.add-pokemon', ['deck' => $deck]) }}" method="post" class="add-form">
              @csrf
              <input type="hidden" name="pokemon_id" value="{{ $pokemon->id }}">
              <input type="number" name="quantity" value="1" min="1" max="10" class="qty-input">
              <button type="submit" class="btn-small">Add</button>
            </form>
          </div>
        @endforeach
      </div>

      @if($pokemons->count() > 50)
        <p class="limit-notice">Showing 50 of {{ $pokemons->count() }} Pokémon. Use search to find others.</p>
      @endif
    </div>
  </div>

  <section class="pokemon-list">
  @foreach($deck->pokemons as $pokemon)
  <div class="pokemon-card {{ $pokemon->type1 }}">
    <a href="{{ route('pokemon.detail', ['pokemon' => $pokemon]) }}">
    <p>
      <p>{{ $pokemon->name }}</p>
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
  </a>
</div>
  @endforeach
  </section>
</section>

<script>
  const modal = document.getElementById('pokemonModal_{{ $deck->id }}');
  const openBtn = document.getElementById('openPokemonModal_{{ $deck->id }}');
  const closeBtn = document.getElementById('closeModal_{{ $deck->id }}');
  const searchInput = document.getElementById('pokemon_search_{{ $deck->id }}');
  const pokemonOptions = document.querySelectorAll('#pokemon_list_{{ $deck->id }} .pokemon-option');

  // Open modal
  openBtn.addEventListener('click', () => {
    modal.style.display = 'block';
  });

  // Close modal
  closeBtn.addEventListener('click', () => {
    modal.style.display = 'none';
  });

  // Close modal when clicking outside
  window.addEventListener('click', (e) => {
    if (e.target === modal) {
      modal.style.display = 'none';
    }
  });

  // Search functionality
  searchInput.addEventListener('input', (e) => {
    const searchTerm = e.target.value.toLowerCase();
    let visibleCount = 0;
    
    pokemonOptions.forEach(option => {
      const name = option.getAttribute('data-name');
      const matches = name.includes(searchTerm);
      option.style.display = matches ? 'block' : 'none';
      if (matches) visibleCount++;
    });

    // Show message if no results
    if (visibleCount === 0 && searchTerm.length > 0) {
      console.log('No Pokémon found matching: ' + searchTerm);
    }
  });
</script>
@endsection