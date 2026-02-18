<section>
  <p>
  Decks :
  @foreach($decks as $deck)
    <a href="{{ route('deck.detail', ['deck' => $deck]) }}">{{ $deck->name }}</a>
  @endforeach
  </p>
</section>