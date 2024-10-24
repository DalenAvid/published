<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Дякуємо!</title>
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
            font-size: 48px;
            text-align: center;
            margin-bottom: 10px;
        }

        p {
            color: #8B4D31;
            font-size: 24px;
            text-align: center;
            margin-bottom: 20px;
        }

        .button {
            background-color: #8F5E48;
            color: white;
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            font-size: 18px;
            margin: 10px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #8B4513; /* Темніший відтінок коричневого при наведенні */
        }
    </style>
</head>
<body>

    <h1>ДЯКУЄМО!</h1>
    <p>Ваш товар було додано в кошик</p>
    <button class="button">Перейти у магазин</button>
    <button class="button">Перейти у кошик</button>

</body>
</html>
