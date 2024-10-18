<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ваші книги</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }
        .container {
            width: 80%;
            margin: 0 auto;
        }
        .book-list {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .book-item {
            background-color: white;
            padding: 15px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            width: 200px;
            text-align: center;
        }
        .book-item img {
            width: 100%;
            height: auto;
        }
        .book-item h3 {
            font-size: 18px;
            margin: 10px 0;
        }
        .book-item button {
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
        <h1>Ваші книги</h1>
        <div class="book-list">
            @foreach($books as $book)
                <div class="book-item">
                    <img src="{{ $book->cover_image }}" alt="Book Cover">
                    <h3>{{ $book->title }}</h3>
                    <button onclick="location.href='{{ route('user.books.show', $book->id) }}'">Детальніше</button>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
