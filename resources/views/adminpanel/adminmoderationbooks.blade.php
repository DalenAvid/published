<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Адмін Панель - Модернізація Книг</title>
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ccc;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }

        tr:nth-child(even) {
            background-color: #fafafa;
        }

        tr:hover {
            background-color: #f1f1f1;
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
        <aside>
            <h2>Меню</h2>
            @include('adminsidebar')  <!-- Подключаем боковое меню -->
        </aside>

        <main class="content">
            <h1>Модерація Книг</h1>
            <form action="#" method="POST">
                <div class="form-group">
                    <label for="bookId">ID Книги</label>
                    <input type="text" id="bookId" name="bookId" required>
                </div>
                <div class="form-group">
                    <label for="title">Назва Книги</label>
                    <input type="text" id="title" name="title" required>
                </div>
                <div class="form-group">
                    <label for="author">Автор</label>
                    <input type="text" id="author" name="author" required>
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
                <div class="form-group">
                    <label for="description">Опис</label>
                    <textarea id="description" name="description" rows="4"></textarea>
                </div>
                <button type="submit" class="button">Оновити Книгу</button>
            </form>
        </main>
    </div>
</body>

</html>