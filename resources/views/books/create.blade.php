<!-- resources/views/books/create.blade.php -->

@extends('layouts.app')
<style>
    /* Стиль для контейнера форми */
.container {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Заголовок сторінки */
h1 {
    font-size: 2rem;
    color: #333;
    margin-bottom: 20px;
    text-align: center;
}

/* Загальні стилі для форми */
form {
    display: flex;
    flex-direction: column;
}

/* Відступи для полів форми */
form .form-group {
    margin-bottom: 15px;
}

/* Стиль для кнопки збереження */
.btn-primary {
    padding: 10px 20px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 1rem;
    cursor: pointer;
    transition: background-color 0.3s ease;
    margin-top: 20px;
}

/* Ефект при наведенні миші на кнопку */
.btn-primary:hover {
    background-color: #0056b3;
}

/* Стиль для текстових полів */
input[type="text"],
input[type="number"],
textarea,
select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 1rem;
    transition: border-color 0.3s ease;
}

/* Ефект при фокусі на текстових полях */
input[type="text"]:focus,
input[type="number"]:focus,
textarea:focus,
select:focus {
    border-color: #007bff;
    outline: none;
}

/* Валідація полів (приклад для помилок) */
input.is-invalid, textarea.is-invalid, select.is-invalid {
    border-color: #dc3545;
}

.invalid-feedback {
    color: #dc3545;
    font-size: 0.875rem;
}

</style>
@section('content')
    <div class="container">
        <h1>Add New Book</h1>
        <form action="{{ route('books.store') }}" method="POST">
            @csrf
            @include('books.form')
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
