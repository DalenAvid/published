<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
        }

       

        .book-card {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-grow: 1;
            margin: 20px;
        }

        .book-content {
            display: flex;
            align-items: center;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 1050px;
            width: 100%;
        }

        .book-content img {
            max-width: 22vw;
            height: auto;
            border-radius: 8px;
            margin-right: 20px;
        }

        .book-info {
            flex-grow: 1;
        }

        .book-info h3 {
            font-size: 30px;
            color: #5a3e2b;
            margin: 0;
            font-weight: bold;
        }

        .book-info p {
            color: #5a3e2b;
            font-size: 16px;
            margin: 10px 0;
        }

        .buy {
            background-color: #8F5E48;
            color: white;
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            font-size: 14px;
            cursor: pointer;
            margin-top: 1rem;
        }

        .review-button {
            margin-top: 20px;
            color: #6d4831;
            text-decoration: none;
            padding: 10px 15px;
            border: 1px solid #d3a992;
            border-radius: 5px;
            background-color: #fff;
            transition: background-color 0.3s ease;
        }

        .review-button:hover {
            background-color: #d3a992;
            color: #fff;
        }
    </style>
</head>

<body>
    <aside>
        @include('sidebar')
    </aside>

    <div class="book-card">
        <div class="book-content">
            <img src="{{ $book->cover_image }}" alt="{{ $book->title }}">
            <div class="book-info">
                <h3>{{ $book->title }}</h3>
                <p>Автор: {{ $book->author }}</p>
                <p>Ціна: {{ $book->price }} грн</p>
                <button class="buy"
                    onclick="window.location.href='{{ route('page1.add', ['id' => $book->id]) }}'">Придбати</button>

                <h2>Опис</h2>
                <p>{{ $book->description }}</p>

                <h2>Жанр:</h2>
                <p>{{ $book->genre }}</p>

                <h2>Вік:</h2>
                <p>{{ $book->age }}</p>

                <h2>Мова:</h2>
                <p>{{ $book->language }}</p>

                <h2>Рік видання:</h2>
                <p>{{ $book->year }}</p>

                <a href="{{ route('books.reviews', ['id' => $book->id]) }}" class="review-button">Відкрити відгуки</a>
            </div>
        </div>
    </div>
</body>

</html>
