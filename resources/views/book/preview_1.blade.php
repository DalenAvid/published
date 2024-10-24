@extends('layouts.app')

@section('content')
<div class="container">
    <div class="sidebar">
        
        <h2>Меню</h2>
        @include('sidebar')
    </div>
    <div class="content">
        <h1>Попередній перегляд книги</h1>
        <h2>Назва: {{ $title }}</h2>
        <p>Опис: {{ $description }}</p>
        <p>Мова: {{ $language }}</p>
        <p>Жанр: {{ $genre }}</p>
        <p>Вік: {{ $age }}</p>
        <p>Рік видання: {{ $year }}</p>
        <p>Кількість сторінок: {{ $pages }}</p>

        <h3>Файли</h3>
        <p>Файл книги: {{ $book_file->getClientOriginalName() }}</p>
        <p>Обкладинка: <img src="{{ $cover_image->store('covers') }}" alt="Cover Image" style="width: 150px; height: auto;"></p>

        <form action="{{ route('book.upload') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="title" value="{{ $title }}">
            <input type="hidden" name="description" value="{{ $description }}">
            <input type="hidden" name="language" value="{{ $language }}">
            <input type="hidden" name="genre" value="{{ $genre }}">
            <input type="hidden" name="age" value="{{ $age }}">
            <input type="hidden" name="year" value="{{ $year }}">
            <input type="hidden" name="pages" value="{{ $pages }}">
            <input type="hidden" name="book_file" value="{{ $book_file }}">
            <input type="hidden" name="cover_image" value="{{ $cover_image }}">

            <button type="submit" class="btn btn-primary">Завантажити книгу</button>
        </form>
    </div>
</div>
@endsection
