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

        .content {
            flex-grow: 1;
            padding: 20px;
        }

        .content h1 {
            margin-bottom: 20px;
        }

        .content-books {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .book-card {
            display: flex;
            background-color: #f9f9f9;
            padding: 10px;
            width: 380px;
            align-items: flex-start;
        }

        .book-cover {
            width: 150px;
            height: 220px;
            object-fit: cover;
            margin-right: 20px;
        }

        .book-details {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;

        }

        .book-title {
            font-size: 1.5em;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .book-author {
            font-size: 1.2em;
            color: #555;
            margin-bottom: 10px;
        }

        .book-rating {
            font-size: 1.1em;
            color: #333;
            margin-bottom: 10px;
        }

        .edit-btn {
            background-color: #8F5E48;
            color: white;
            border: none;
            padding: 10px 15px;
            font-size: 1em;
            cursor: pointer;
            border-radius: 30px;
            align-self: flex-start;
            /* Не розтягує кнопку */
            margin-top: 10px;

        }

        .edit-btn:hover {
            background-color: #7a4e3a;
        }
    </style>
    <div class="admin-panel">
        <aside>
            <h2>Admin</h2>
            @include('adminsidebar')  <!-- Подключаем боковое меню -->
        </aside>

        <main class="content">
            <h1>Книги в Наявності</h1>
            <div class="content-books">
                @foreach($books as $book)
                    <div class="book-card">
                        <img src="{{ $book->cover_image }}" alt="Обкладинка книги" class="book-cover">
                        <div class="book-details">
                            <h2 class="book-title">{{ $book->title }}</h2>
                            <p class="book-author">
                                @empty($book->author)
                                    Автор не відомий
                                @else
                                    {{ $book->author }}
                                @endempty
                            </p>

                            <p class="book-rating">Рейтинг: 4.5</p>
                            <a href="{{ route('adminaddbook.edit', $book->id) }}" class="edit-btn">Редагувати</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </main>
    </div>
</body>

</html>