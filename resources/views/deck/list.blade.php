<section>
  <p>
  Decks :
  @foreach($decks as $deck)
    <a href="{{ route('deck.detail', ['deck' => $deck]) }}">{{ $deck->name }}</a>
  @endforeach
  </p>

  <form action="{{ route('deck.store') }}" method="post">
    @csrf
    <input type="text" name="name" id="name" placeholder="Nom du deck">
    <button type="submit">Créer un deck</button>
  </form>

</section>