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

        .profile-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
            padding: 20px 0;
        }

        .profile-picture {
            display: flex;
            align-items: center;
            position: relative;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background-color: #ccc;
            margin-bottom: 10px;
            cursor: pointer;
        }

        .profile-picture img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
        }

        .profile-info {
            text-align: center;
        }

        .profile-info h2 {
            font-size: 18px;
            color: black;
        }

        .profile-info .button1 {
            margin-top: 10px;
            padding: 5px 10px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 14px;
        }

        .profile-info .button1:hover {
            background-color: #2980b9;
        }

        .content {
            padding: 20px;
            /* Залишено для верхнього та нижнього відступів */
            flex-grow: 1;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 30px 20px;
        }

        .header-title {
            color: black;
            font-size: 26px;
            font-weight: bold;
        }

        .header-search input {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #8B4D31;
            border-radius: 20px;
            width: 200px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
        }

        .header-search input:focus {
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            outline: none;
        }

        .book-list {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            justify-items: start;
        }

        .book-item {
            display: flex;
            align-items: center;
            transition: transform 0.3s ease;
        }

        .book-item:hover {
            cursor: pointer;
            transform: translateY(-5px);
            border-radius: 5px;
            z-index: 1;
            position: relative;
        }

        .book-cover img {
            width: 120px;
            height: 180px;
            object-fit: cover;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-right: 15px;
        }

        .book-info {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .book-title {
            font-size: 16px;
            font-weight: bold;
            margin: 0;
        }

        .book-author {
            font-size: 14px;
            color: #555;
            margin: 5px 0;
        }

        .book-rating {
            font-size: 16px;
        }

        .img-fluid {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 20px 0;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .book-genre {
            margin-bottom: 10px;
            text-align: left;
        }

        .book-genre h2 {
            font-size: 24px;
            color: black;
            font-weight: bold;
            margin-top: 5px;
        }
    </style>
</head>

<body>
    <div>


        <aside>
            @include('sidebar') 
        </aside>
    </div>

    <div class="content">
        <header class="header">
            <div class="header-title">Бібліотека</div>
            <div class="header-search">
                {{-- <input type="text" placeholder="Шукати"> --}}
                <div class="header-search">
                    <form action="{{ route('books.search') }}" method="GET">
                        <input type="text" name="query" placeholder="Шукати книги" value="{{ request('query') }}">
                        <button type="submit" style="display:none;"></button>
                    </form>
                </div>
            </div>
        </header>

        @foreach ($books->groupBy('genre') as $genre => $genreBooks)
            <div class="book-genre">
                <h2>{{ $genre }}</h2>
            </div>

            <div class="book-list">
                @foreach ($genreBooks as $book)
                    <div class="book-item">
                        <div class="book-cover">
                            <img src="{{ $book->cover_image }}" alt="{{ $book->title }}" class="img-fluid">

                        </div>
                        <div class="book-info">
                            <div class="book-title">{{ $book->title }}</div>
                            <div class="book-author">{{ $book->author }}</div>
                            <div class="book-rating">
                                ⭐⭐⭐⭐⭐
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach

    </div>
</body>

</html>



{{-- ☆ --}}