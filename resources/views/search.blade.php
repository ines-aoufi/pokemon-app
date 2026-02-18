<form action="{{ route('search') }}" method="GET">
    <input type="text" name="search" required/>
    <button type="submit">Search</button>
</form>

@if($pokemons->isNotEmpty())
    @foreach ($pokemons as $pokemon)
        <div class="post-list">
            <p>{{ $pokemon->name }}</p>
            <p>Type: {{ $pokemon->type1 }} {{ $pokemon->type2 }}</p>
            <p>Generation {{ $pokemon->generation }}</p>
        </div>
    @endforeach
@else 
    <div>
        <h2>No pokemons found</h2>
    </div>
@endif