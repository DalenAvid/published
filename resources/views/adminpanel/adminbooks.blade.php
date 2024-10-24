<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Адмін Панель - Книги в Наявності</title>
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
            <h1>Книги в Наявності</h1>
            <table>
                <thead>
                    <tr>
                        <th>ID Книги</th>
                        <th>Назва</th>
                        <th>Автор</th>
                        <th>Рік Публікації</th>
                        <th>Кількість</th>
                        <th>Ціна</th>
                        <th>Додатково</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>001</td>
                        <td>Війна і мир</td>
                        <td>Лев Толстой</td>
                        <td>1869</td>
                        <td>5</td>
                        <td>300 грн</td>
                        <td>Класика</td>
                    </tr>
                    <tr>
                        <td>002</td>
                        <td>1984</td>
                        <td>Джордж Орвелл</td>
                        <td>1949</td>
                        <td>10</td>
                        <td>200 грн</td>
                        <td>Антиутопія</td>
                    </tr>
                    <tr>
                        <td>003</td>
                        <td>Гаррі Поттер і філософський камінь</td>
                        <td>Джоан Роулінг</td>
                        <td>1997</td>
                        <td>8</td>
                        <td>150 грн</td>
                        <td>Фентезі</td>
                    </tr>
                    <tr>
                        <td>004</td>
                        <td>Майстер і Маргарита</td>
                        <td>Михайло Булгаков</td>
                        <td>1967</td>
                        <td>4</td>
                        <td>250 грн</td>
                        <td>Російська класика</td>
                    </tr>
                    <tr>
                        <td>005</td>
                        <td>Степові волки</td>
                        <td>Герман Гессе</td>
                        <td>1927</td>
                        <td>6</td>
                        <td>320 грн</td>
                        <td>Філософська література</td>
                    </tr>
                    <tr>
                        <td>006</td>
                        <td>Вбивство в Східному експресі</td>
                        <td>Агата Крісті</td>
                        <td>1934</td>
                        <td>7</td>
                        <td>180 грн</td>
                        <td>Детектив</td>
                    </tr>
                </tbody>
            </table>
            <h1>Список Книг</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Назва</th>
                <th>Автор</th>
                <th>Рік Публікації</th>
                <th>Опис</th>
                <th>Ціна</th>
                <th>Кількість</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
            <tr>
                <td>{{ $book->id }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->publication_year }}</td>
                <td>{{ $book->description }}</td>
                <td>{{ $book->price }}</td>
                <td>{{ $book->quantity }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
        </main>
    </div>
</body>

</html>