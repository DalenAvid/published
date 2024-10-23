<div class="container">
    <h2>Збережені книги</h2>
    @if($savedBooks->isEmpty())
        <p>У вас немає збережених книг.</p>
    @else
        <div class="book-list">
            @foreach($savedBooks as $savedBook)
                <div class="book-item">
                    <h3>{{ $savedBook->book->title }}</h3>
                    <p>{{ $savedBook->book->description }}</p>
                    <a href="{{ route('more_detail', $savedBook->book->id) }}">Детальніше</a>
                </div>
            @endforeach
        </div>
    @endif
</div>
