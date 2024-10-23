@extends('layouts.app')
<style>
    /* Загальні стилі для контейнера */
.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Заголовок сторінки */
h1 {
    font-size: 2.5rem;
    font-weight: bold;
    margin-bottom: 20px;
    color: #333;
}

/* Стиль кнопки "Add New Book" */
.btn-primary {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    text-decoration: none;
    transition: background-color 0.3s ease;
}

.btn-primary:hover {
    background-color: #0056b3;
}

/* Стиль таблиці */
.table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.table th, .table td {
    padding: 12px 15px;
    border: 1px solid #ddd;
    text-align: left;
}

.table th {
    background-color: #f4f4f4;
    font-weight: bold;
    color: #333;
}

.table tr:nth-child(even) {
    background-color: #f9f9f9;
}

.table tr:hover {
    background-color: #f1f1f1;
}

/* Стилі для кнопок дій (View, Edit, Delete) */
.btn {
    padding: 8px 12px;
    border: none;
    border-radius: 4px;
    text-decoration: none;
    font-size: 14px;
    margin-right: 5px;
    transition: background-color 0.3s ease;
}

.btn-info {
    background-color: #17a2b8;
    color: white;
}

.btn-info:hover {
    background-color: #117a8b;
}

.btn-warning {
    background-color: #ffc107;
    color: white;
}

.btn-warning:hover {
    background-color: #e0a800;
}

.btn-danger {
    background-color: #dc3545;
    color: white;
}

.btn-danger:hover {
    background-color: #c82333;
}

/* Стиль для форми видалення */
form {
    display: inline-block;
    margin: 0;
}

form button {
    cursor: pointer;
}

</style>
@section('content')
    <div class="container">
        <h1>Books</h1>
        <a href="{{ route('books.create') }}" class="btn btn-primary">Add New Book</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Rating</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                    <tr>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->rating }}</td>
                        <td>
                            <a href="{{ route('books.show', $book->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
