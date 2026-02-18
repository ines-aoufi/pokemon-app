
<p>Filter by Type:</p>
<form action="{{ route('filter') }}" method="GET">
    <select name="type" required>
        <option value="">Select a type</option>
        @foreach($types as $type)
            <option value="{{ $type }}">{{ $type }}</option>
        @endforeach
    </select>
    <button type="submit">Filter</button>
</form>

@if($filtered_pokemons->isNotEmpty())
    @foreach ($filtered_pokemons as $pokemon)
        <div class="post-list">
            <p>{{ $pokemon->name }}</p>
            <p>Type: {{ $pokemon->type1 }} {{ $pokemon->type2 }}</p>
            <p>Generation {{ $pokemon->generation }}</p>
            <a href="{{ route('pokemon.detail', $pokemon->id) }}">View Details</a>
            <hr>
        </div>
@endforeach
@else 
    <div>
        <h2>No pokemons found</h2>
    </div>
@endif