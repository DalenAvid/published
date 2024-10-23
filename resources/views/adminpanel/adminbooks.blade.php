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

        .sidebar {
            width: 250px;
            background-color: #333;
            color: white;
            padding: 15px;
            height: 100vh;
        }

        .sidebar h2 {
            margin-bottom: 20px;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            margin-bottom: 10px;
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px;
            background-color: #444;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .sidebar ul li a:hover {
            background-color: #555;
        }

        .content {
            flex-grow: 1;
            padding: 20px;
        }

        .content h1 {
            margin-bottom: 20px;
        }

        
        /*/ Add more styles as needed */
        .content-books {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            
            
            
        }
        .book-card {
            display: flex;
            align-items: flex-start;
            background-color: #fff;
            padding: 5px;
            max-width: 400px;
            background-color: #f9f9f9;
            max-height: 22px;
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
            justify-content: space-between;
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
            margin-bottom: 20px;
        }

        .edit-btn {
            background-color: #8F5E48;
            color: white;
            border: none;
            padding: 10px 15px;
            font-size: 1em;
            cursor: pointer;
            border-radius: 5px;
        }

        .edit-btn:hover {
            background-color: #7a4e3a;
        }
    </style>
    <div class="admin-panel">
        <aside class="sidebar">
            <h2>Меню</h2>
            <ul>
                <li><a href="{{ route('adminpanel') }}">Замовлення</a></li>
                <li><a href="{{ route('adminpanel.adminorderhistory') }}">Історія Замовлень</a></li>
                <li><a href="{{ route('adminpanel.adminbooks') }}">Книги</a></li>
                <li><a href="{{ route('adminpanel.adminaddbooks') }}">Додати Книгу</a></li>
                <li><a href="{{ route('adminpanel.adminmoderationbooks') }}">Модернізація Книг</a></li>
            </ul>
        </aside>

        <main class="content">
            <h1>Книги в Наявності</h1>
           <div class="content-books">
            @foreach($books as $book)
               
                <div class="book-card">
                    <img src={{$book->cover_image_url}}
                        alt="Обкладинка книги" class="book-cover">
                    <div class="book-details">
                        <h2 class="book-title">{{ $book->title }}</h2>
                        <p class="book-author">{{ $book->author }}</p>
                        <p class="book-rating">Рейтинг: 4.5</p>
                        <button class="edit-btn">Редагувати</button>
                    </div>
                </div>
            @endforeach
            </div>
        </main>
    </div>
</body>

</html>