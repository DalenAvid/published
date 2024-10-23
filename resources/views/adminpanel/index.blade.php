<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Адмін Панель</title>
    <link rel="stylesheet" href="styles.css">
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
                <li><a href="#">Замовлення</a></li>
                <li><a href="#">Історія замовлень</a></li>
                <li><a href="#">Книги</a></li>
                <li><a href="#">Додати товар</a></li>
                <li><a href="#">Модерація книг</a></li>
            </ul>
        </aside>

        <main class="content">
            <h1>Замовлення</h1>
            <table>
                <thead>
                    <tr>
                        <th>Номер замовлення</th>
                        <th>Користувач</th>
                        <th>Країна</th>
                        <th>Тип</th>
                        <th>Кількість</th>
                        <th>Статус</th>
                        <th>Сума</th>
                        <th>Додатково</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>001</td>
                        <td>Іван Іванов</td>
                        <td>Україна</td>
                        <td>Книга</td>
                        <td>3</td>
                        <td>Оплачено</td>
                        <td>450 грн</td>
                        <td>Швидка доставка</td>
                    </tr>
                    <tr>
                        <td>002</td>
                        <td>Марія Петренко</td>
                        <td>Україна</td>
                        <td>Електронна книга</td>
                        <td>1</td>
                        <td>Оплачено</td>
                        <td>150 грн</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>003</td>
                        <td>Олексій Сидоров</td>
                        <td>Україна</td>
                        <td>Книга</td>
                        <td>2</td>
                        <td>Оплачено</td>
                        <td>300 грн</td>
                        <td>Знижка 10%</td>
                    </tr>
                    <tr>
                        <td>004</td>
                        <td>Наталія Коваль</td>
                        <td>Україна</td>
                        <td>Книга</td>
                        <td>5</td>
                        <td>Оплачено</td>
                        <td>750 грн</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>005</td>
                        <td>Денис Литвин</td>
                        <td>Україна</td>
                        <td>Електронна книга</td>
                        <td>1</td>
                        <td>Очікується</td>
                        <td>150 грн</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>006</td>
                        <td>Олена Шевченко</td>
                        <td>Україна</td>
                        <td>Книга</td>
                        <td>4</td>
                        <td>Оплачено</td>
                        <td>600 грн</td>
                        <td>Подарункове пакування</td>
                    </tr>
                    <tr>
                        <td>007</td>
                        <td>Юрій Ткаченко</td>
                        <td>Україна</td>
                        <td>Книга</td>
                        <td>2</td>
                        <td>Оплачено</td>
                        <td>300 грн</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>008</td>
                        <td>Андрій Гончар</td>
                        <td>Україна</td>
                        <td>Книга</td>
                        <td>1</td>
                        <td>Очікується</td>
                        <td>150 грн</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>009</td>
                        <td>Сергій Мельник</td>
                        <td>Україна</td>
                        <td>Книга</td>
                        <td>3</td>
                        <td>Оплачено</td>
                        <td>450 грн</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>010</td>
                        <td>Катерина Василенко</td>
                        <td>Україна</td>
                        <td>Книга</td>
                        <td>6</td>
                        <td>Оплачено</td>
                        <td>900 грн</td>
                        <td>Швидка доставка</td>
                    </tr>
                    <tr>
                        <td>011</td>
                        <td>Михайло Бондаренко</td>
                        <td>Україна</td>
                        <td>Книга</td>
                        <td>2</td>
                        <td>Оплачено</td>
                        <td>300 грн</td>
                        <td>Знижка 5%</td>
                    </tr>
                </tbody>
            </table>
        </main>
    </div>
</body>

</html>