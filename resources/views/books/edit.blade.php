@extends('layouts.app')
<style>
    /* Стиль для контейнера форми редагування */
.container {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f5f5f5;
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

/* Стиль для кнопки оновлення */
.btn-primary {
    padding: 10px 20px;
    background-color: #28a745;
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 1rem;
    cursor: pointer;
    transition: background-color 0.3s ease;
    margin-top: 20px;
}

/* Ефект при наведенні миші на кнопку оновлення */
.btn-primary:hover {
    background-color: #218838;
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
    border-color: #28a745;
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
        <h1>Edit Book</h1>
        <form action="{{ route('books.update', $book->id) }}" method="POST">
            @csrf
            @method('PUT')
            @include('books.form')
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
