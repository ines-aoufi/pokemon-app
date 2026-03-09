@extends('layouts.app')

@section('content')
<section>
  <form action="{{ route('deck.store') }}" method="post">
    @csrf
    <input type="text" name="name" id="name" placeholder="Nom du deck">
    <button type="submit">Create a deck</button>
  </form>
</section>

<section>
  <div>
    <h1>
      Decks
    </h1>
    <div class="deck-items">
      @foreach($decks as $deck)
      <div>
      <button>
        <a href="{{ route('deck.detail', ['deck' => $deck]) }}">{{ $deck->name }}</a>
      </button>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endsection