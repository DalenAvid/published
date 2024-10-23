@extends('layouts.app')

@section('content')
    <h1>Бібліотека</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($books->isEmpty())
        <p>Книги не знайдено.</p>
    @else
        <div class="book-list">
            @foreach ($books as $book)
                <div class="book-item">
                    <img src="{{ asset('storage/covers/' . $book->cover_image) }}" alt="Обкладинка книги" class="book-cover">

                    {{-- <img src="{{ asset('storage/covers/' . $book->cover_image) }}" alt="Обкладинка книги" class="book-cover"> --}}
                    {{-- <img src="https://cdn2.penguin.com.au/covers/original/9781440353758.jpg" alt="Обкладинка книги" class="book-cover"> --}}
                    <div class="book-info">
                        <h2>{{ $book->title }}</h2>
                        <p>{{ $book->author }}</p>
                        <div class="book-rating">
                            <span>★ ★ ★ ★ ☆</span> 
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection

<style>
    .book-list {
        display: flex;
        flex-wrap: wrap;
    }

    .book-item {
        display: flex;
        align-items: center;
        padding: 10px;
        margin: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        width: 300px;
    }

    .book-cover {
        width: 100px;
        height: auto;
        margin-right: 15px;
    }

    .book-info {
        display: flex;
        flex-direction: column;
    }

    .book-rating {
        margin-top: 5px;
        font-size: 1.2em;
        color: gold;
    }
</style>
