<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    /* Загальні стилі */
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }

    .admin-panel {
        display: flex;
        min-height: 100vh;
    }


    /* Стилі для контенту */
    .content {
        flex-grow: 1;
        padding: 20px;
        background-color: #fff;
    }

    .content h1 {
        font-size: 28px;
        margin-bottom: 20px;
    }

    form {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    form div {
        display: flex;
        flex-direction: column;
    }

    label {
        font-size: 16px;
        margin-bottom: 5px;
    }

    input,
    textarea {
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    textarea {
        resize: vertical;
    }

    button {
        grid-column: 1 / -1;
        padding: 10px 15px;
        font-size: 16px;
        background-color: #28a745;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        width: fit-content;
        justify-self: center;
    }

    button:hover {
        background-color: #218838;
    }

    .button-back {
        padding: 10px 15px;
        font-size: 16px;
        background-color: red;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        width: fit-content;
        justify-self: center;
    }

    .button-back:hover {
        background-color: darkred;
        transition: background-color 0.3s ease;
    }
    .button-back-container{
        display: grid;
        grid-template-columns: 1fr ;
        gap: 20px;
        margin-top: 1.1rem;

    }
    .button-back-container a{
        color: white;
        text-decoration: none;
        font-size: 16px;
        position: relative;
       
    }
   
</style>

<body>
    <div class="admin-panel">
        <aside>
            <h2>Admin</h2>
            @include('adminsidebar')  <!-- Подключаем боковое меню -->
        </aside>

        <main class="content">
            <h1>Редагування Книги</h1>
            <form action="{{ route('adminaddbook.update', $book->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="title">Назва книги</label>
                    <input type="text" id="title" name="title" value="{{ $book->title }}" required>
                </div>

                <div>
                    <label for="description">Опис</label>
                    <textarea id="description" name="description" required>{{ $book->description }}</textarea>
                </div>

                <div>
                    <label for="language">Мова</label>
                    <input type="text" id="language" name="language" value="{{ $book->language }}" required>
                </div>

                <div>
                    <label for="genre">Жанр</label>
                    <input type="text" id="genre" name="genre" value="{{ $book->genre }}" required>
                </div>

                <div>
                    <label for="age">Вікова категорія</label>
                    <input type="text" id="age" name="age" value="{{ $book->age }}" required>
                </div>

                <div>
                    <label for="year">Рік видання</label>
                    <input type="number" id="year" name="year" value="{{ $book->year }}" required>
                </div>

                <div>
                    <label for="pages">Кількість сторінок</label>
                    <input type="number" id="pages" name="pages" value="{{ $book->pages }}" required>
                </div>

                <div>
                    <label for="book_file">Файл книги</label>
                    <input type="file" id="book_file" name="book_file">
                </div>

                <div>
                    <label for="cover_image">Обкладинка</label>
                    <input type="file" id="cover_image" name="cover_image">
                </div>

                <div>
                    <label for="price">Ціна</label>
                    <input type="number" id="price" name="price" step="0.01" value="{{ $book->price }}" required>
                </div>
                
                    <button type="submit">Оновити Книгу</button>
                    
                </form>
                <div class="button-back-container">
                <a class="button-back" href="{{ route('adminpanel.adminbooks') }}">Назад</a>
                </div>

        </main>
    </div>
</body>

</html>