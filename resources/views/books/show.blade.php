@extends('layouts.app')
<style>
    /* Контейнер сторінки книги */
.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f7f7f7;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Заголовок книги */
h1 {
    font-size: 2.5rem;
    color: #333;
    margin-bottom: 20px;
    text-align: center;
}

/* Текстові поля з інформацією */
p {
    font-size: 1.1rem;
    color: #555;
    margin-bottom: 10px;
    line-height: 1.6;
}

p strong {
    color: #333;
}

/* Зображення обкладинки */
.img-fluid {
    max-width: 100%;
    height: auto;
    display: block;
    margin: 20px 0;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Кнопка повернення до списку */
.btn-primary {
    padding: 10px 20px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 1rem;
    text-decoration: none;
    display: inline-block;
    transition: background-color 0.3s ease;
    text-align: center;
}

.btn-primary:hover {
    background-color: #0056b3;
}

/* Відступ для кнопки */
.mt-3 {
    margin-top: 20px;
}

</style>
@section('content')
    {{-- <div class="container">
        <h1>{{ $book->title }}</h1>
        <p><strong>Author:</strong> {{ $book->author }}</p>
        <p><strong>Rating:</strong> {{ $book->rating }}</p>
        <p><strong>Language:</strong> {{ $book->language }}</p>
        <p><strong>Age Recommendation:</strong> {{ $book->age_recommendation }}</p>
        <p><strong>Publication Year:</strong> {{ $book->publication_year }}</p>
        <p><strong>Description:</strong> {{ $book->description }}</p>
        <p><strong>Comment:</strong> {{ $book->comment }}</p>
        <img src="{{ $book->cover_image_url }}" alt="{{ $book->title }}" class="img-fluid">
        <a href="{{ route('books.index') }}" class="btn btn-primary mt-3">Back to List</a>
    </div> --}}
    <div class="book-card">
        <div class="book-content">
            <img src="{{ $book->cover_image }}" alt="{{ $book->title }}">
            <div class="book-info">
                <h3>{{ $book->title }}</h3>
                <p>Автор: {{ $book->author }}</p>
                <p>Ціна: {{ $book->price }} грн</p>
                <p>Опис: {{ $book->description }}</p>
    
                <a href="{{ route('book.reviews', $book->id) }}">Відгуки до книги →</a>
            </div>
        </div>
    </div>
@endsection
