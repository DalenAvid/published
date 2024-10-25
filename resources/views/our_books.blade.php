<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ваші книги</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
</head>
<style>
    body {
        font-family: 'Montserrat', sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
        background-color: #fff;
    }


    .content {
        margin-left: 2rem;
        padding: 20px;
        flex-grow: 1;
    }

    /* Заголовок */
    .header {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        padding: 30px 170px;
    }

    .header-title {
        color: #333;
        font-size: 26px;
        font-weight: bold;
        margin: 0;
    }

    .header-search input {
        padding: 10px;
        font-size: 16px;
        border: 1px solid #8B4513;
        border-radius: 20px;
        width: 200px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s ease;
    }

    .header-search input:focus {
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        outline: none;
    }

    /* Контейнер для кнопок */
    .button-container {
        margin: 20px 0;
        display: flex;
        justify-content: center;
        gap: 10px;
    }

    .button1,
    .button2 {
        padding: 10px 20px;
        background-color: #8B4513;
        color: white;
        border: none;
        border-radius: 25px;
        cursor: pointer;
        font-size: 14px;
        transition: background-color 0.3s;
    }

    .button1:hover,
    .button2:hover {
        background-color: #6F4C3E;
    }

    /* Основний контейнер для книг */
    .container {
        padding: 30px;
    }

    .book-list {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 20px;
        justify-items: center;
    }

    /* Стиль для картки книги */
    .book-item {
        width: 200px;
        background-color: #ffffff;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .book-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }

    .book-item img {
        width: 100%;
        height: 250px;
        object-fit: cover;
        border-bottom: 2px solid #f1f1f1;
    }

    .book-info {
        padding: 15px;
        text-align: center;
    }

    .book-info .title {
        font-size: 16px;
        font-weight: bold;
        color: #333;
        margin: 10px 0 5px;
    }

    .book-info .author {
        font-size: 14px;
        color: #777;
    }
</style>

<body>

    <div>

        <aside>
            @include('sidebar')
        </aside>
    </div>

    <div class="content">
        <header class="header">
            <div class="header-title">Ваші книги</div>
            <div class="button-container">
                <button class="button1">Читати останню книгу</button>
                <button class="button2">Слухати останню книгу</button>
            </div>
        </header>

        <div class="container">
            {{-- <h2>Ваші книги</h2> --}}
            @if($purchasedBooks->isEmpty())
                <p>У вас немає куплених книг.</p>
            @else
                <div class="book-list">
                    @foreach($purchasedBooks as $purchasedBook)
                        <div class="book-item">
                            <img src="{{ asset($purchasedBook->book->cover_image) }}" alt="{{ $purchasedBook->book->title }}">
                            <div class="book-info">
                                <h3 class="title">{{ $purchasedBook->book->title }}</h3>
                                <p class="author">{{ $purchasedBook->book->author ?? 'Автор невідомий' }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</body>

</html>