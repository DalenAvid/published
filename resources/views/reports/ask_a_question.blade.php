<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Задати питання</title>
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
            margin-bottom: 20px;
        }

        input[type="text"] {
            width: 300px;
            padding: 10px;
            border: 2px solid #8B4D31;
            border-radius: 5px;
            margin-bottom: 20px;
            font-size: 16px;
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

    <h1>Задайте питання, яке вас цікавить</h1>
    <input type="text" placeholder="Задайте коротке питання">
    <button class="button">Задати</button>

</body>
</html>
