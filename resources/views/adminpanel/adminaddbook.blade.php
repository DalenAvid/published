<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Адмін Панель - Додавання Книг</title>
</head>

<body>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }

        .admin-panel {
            display: flex;
        }

        .content {
            flex-grow: 1;
            padding: 20px;
        }

        .content h1 {
            margin-bottom: 20px;
        }

        form {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: brown;
        }

        input[type="text"],
        input[type="number"],
        input[type="url"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 2px solid brown;
            border-radius: 5px;
            font-size: 14px;
            box-sizing: border-box;
        }

        button {
            margin-top: 8px;
            background-color: brown;
            color: white;
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #8B4513;
        }
    </style>
    <div class="admin-panel">
        <aside>
            <h2>Admin</h2>
            @include('adminsidebar')  <!-- Подключаем боковое меню -->
        </aside>

        <main class="content">
            <h1>Додавання Нової Книги</h1>
            <form action="{{ route('adminaddbook.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="title">Назва книги</label>
                    <input type="text" id="title" name="title" required>
                </div>
                <div>
                    <label for="author">Автор</label>
                    <input type="text" id="author" name="author" required>
                </div>
                <div>
                    <label for="description">Опис</label>
                    <textarea id="description" name="description" required></textarea>
                </div>

                <div>
                    <label for="language">Мова</label>
                    <input type="text" id="language" name="language" required>
                </div>

                <div>
                    <label for="genre">Жанр</label>
                    <input type="text" id="genre" name="genre" required>
                </div>

                <div>
                    <label for="age">Вікова категорія</label>
                    <input type="text" id="age" name="age" required>
                </div>

                <div>
                    <label for="year">Рік видання</label>
                    <input type="number" id="year" name="year" required>
                </div>

                <div>
                    <label for="pages">Кількість сторінок</label>
                    <input type="number" id="pages" name="pages" required>
                </div>

                <div>
                    <label for="book_file">Файл книги</label>
                    <input type="file" id="book_file" name="book_file" required>
                </div>

                <div>
                    <label for="cover_image">Обкладинка</label>
                    <input type="text" id="cover_image" name="cover_image" required>
                </div>

                <div>
                    <label for="price">Ціна</label>
                    <input type="number" id="price" name="price" step="0.01" required>
                </div>

                <button  type="submit">Додати книгу</button> <!-- Додано закриття кнопки -->
            </form> <!-- Додано закриття форми -->
        </main>
    </div>
</body>

</html>
