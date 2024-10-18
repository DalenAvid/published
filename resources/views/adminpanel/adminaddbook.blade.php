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

        .sidebar {
            width: 250px;
            background-color: #333;
            color: white;
            padding: 15px;
            height: 100vh;
        }

        .sidebar h2 {
            margin-bottom: 20px;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            margin-bottom: 10px;
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px;
            background-color: #444;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .sidebar ul li a:hover {
            background-color: #555;
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
        input[type="url"] {
            width: 100%;
            padding: 10px;
            border: 2px solid brown;
            border-radius: 5px;
            font-size: 14px;
            box-sizing: border-box;
        }

        .button {
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

        .button:hover {
            background-color: #8B4513;
        }
    </style>
    <div class="admin-panel">
        <aside class="sidebar">
            <h2>Меню</h2>
            <ul>
                <li><a href="{{ route('adminpanel') }}">Замовлення</a></li>
                <li><a href="{{ route('adminpanel.adminorderhistory') }}">Історія Замовлень</a></li>
                <li><a href="{{ route('adminpanel.adminbooks') }}">Книги</a></li>
                <li><a href="{{ route('adminpanel.adminaddbooks') }}">Додати Книгу</a></li>
                <li><a href="{{ route('adminpanel.adminmoderationbooks') }}">Модернізація Книг</a></li>
            </ul>
        </aside>

        <main class="content">
            <h1>Додавання Нової Книги</h1>
            <form action="{{ route('adminaddbook.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Назва Книги</label>
                    <input type="text" id="title" name="title" required>
                </div>
                <div class="form-group">
                    <label for="author">Автор</label>
                    <input type="text" id="author" name="author" required>
                </div>
                <div class="form-group">
                    <label for="genre">Жанр</label>
                    <input type="text" id="genre" name="genre" required>
                </div>
                <div class="form-group">
                    <label for="description">Опис</label>
                    <textarea id="description" name="description" rows="4"></textarea>
                </div>
                <div class="form-group">
                    <label for="language">Мова</label>
                    <input id="language" name="language"></input>
                </div>
                <div class="form-group">
                    <label for="age">Вік</label>
                    <input type="number" id="age" name="age" required min="5" max="110">
                </div>
                <div class="form-group">
                    <label for="year">Рік Публікації</label>
                    <input type="number" id="year" name="year" required min="1000" max="9999">
                </div>
                <div class="form-group">
                    <label for="quantity">Кількість</label>
                    <input type="number" id="quantity" name="quantity" required min="1">
                </div>
                <div class="form-group">
                    <label for="price">Ціна</label>
                    <input type="number" id="price" name="price" required min="0" step="0.01">
                </div>

                <button type="submit" class="button">Додати Книгу</button>
            </form>
        </main>
    </div>
</body>

</html>