<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Публікація книги</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }

        h1 {
            color: #8B4D31;
            font-size: 36px;
            text-align: center;
            margin-bottom: 30px;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
            width: 300px;
        }

        .button {
            background-color: #8F5E48;
            color: white;
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #8B4513; /* Темніший відтінок коричневого при наведенні */
        }

    </style>
</head>
<body>

    <h1>КНИГА ГОТОВА ДО ПУБЛІКАЦІЇ,<br> ОПУБЛІКУВАТИ ЇЇ НА САЙТІ?</h1>

    <div class="button-container">
        <button class="button">Назад</button>
        <button class="button">Опублікувати</button>
    </div>

</body>
</html>
