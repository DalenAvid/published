@extends('layouts.app')

@section('content')
    <h1>Бібліотека</h1>
    @if ($books->isEmpty())
        <p>Книги не знайдено.</p>
    @else
        <ul>
            @foreach ($books as $book)
                <li>
                    <h2>{{ $book->title }}</h2>
                    <p>Автор: {{ $book->author }}</p>
                    <p>Опис: {{ $book->description }}</p>
                    <p>Мова: {{ $book->language }}</p>
                    <p>Жанр: {{ $book->genre }}</p>
                    <p>Вік: {{ $book->age }}</p>
                    <p>Рік видання: {{ $book->year }}</p>
                    <p>К-ть сторінок: {{ $book->pages }}</p>
                    <img src="{{ asset('storage/' . $book->cover_image) }}" alt="Обкладинка книги" style="width: 100px;">
                </li>
            @endforeach
        </ul>
    @endif
@endsection
