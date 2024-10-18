<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $book->title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }
        .container {
            width: 80%;
            margin: 0 auto;
        }
        .book-detail {
            display: flex;
            gap: 40px;
            padding: 20px;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .book-detail img {
            width: 300px;
            height: auto;
        }
        .book-info {
            max-width: 600px;
        }
        .book-info h1 {
            font-size: 28px;
            margin-bottom: 20px;
        }
        .book-info p {
            font-size: 16px;
            margin-bottom: 10px;
        }
        .book-info button {
            padding: 8px 12px;
            background-color: #8a2be2;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="book-detail">
            <img src="{{ $book->cover_image }}" alt="Book Cover">
            <div class="book-info">
                <h1>{{ $book->title }}</h1>
                <p><strong>Ціна:</strong> {{ $book->price }} грн</p>
                <p><strong>Опис:</strong> {{ $book->description }}</p>
                <p><strong>Жанр:</strong> {{ $book->genre }}</p>
                <p><strong>Мова:</strong> {{ $book->language }}</p>
                <p><strong>Рік видання:</strong> {{ $book->year }}</p>
                <button onclick="location.href='/your-cart'">В кошик</button>
            </div>
        </div>
    </div>
</body>
</html>
