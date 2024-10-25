<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Адмін Панель - Модерація Книг</title>
</head>

<body>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            background-color: #f4f4f9;
            height: 100vh;
        }

        .admin-panel {
            display: flex;
            width: 100%;
        }

        

        .content {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            /* Центрує контент по горизонталі */
            align-items: center;
            /* Центрує контент по вертикалі */
            padding: 20px;
            background-color: #fff;
            box-sizing: border-box;
        }

        h1 {
            color: #2c3e50;
            font-size: 28px;
            margin-bottom: 10px;
        }

        p {
            color: #34495e;
            font-size: 18px;
            text-align: center;
        }
    </style>
    <div class="admin-panel">
        <aside>
            <h2>Меню</h2>
            @include('adminsidebar')  <!-- Подключаем боковое меню -->
        </aside>

        <main class="content">
            <h1>Модерація Книг</h1>
            <p> Книги добавляються на сайт АВТОМАТИЧНО. </p>
        </main>
    </div>
</body>

</html>