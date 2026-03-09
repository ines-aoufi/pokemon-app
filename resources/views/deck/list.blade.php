@extends('layouts.app')

@section('content')
<section>
  <div>
    <h1>
      Decks
    </h1>
  @foreach($decks as $deck)
    <button>
    <a href="{{ route('deck.detail', ['deck' => $deck]) }}">{{ $deck->name }}</a>
    </button>
  @endforeach
  </div>
</section>

<section>
  <form action="{{ route('deck.store') }}" method="post">
    @csrf
    <input type="text" name="name" id="name" placeholder="Nom du deck">
    <button type="submit">Create a deck</button>
  </form>
</section>


@endsection