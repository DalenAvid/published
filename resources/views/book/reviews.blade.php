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

        .sidebar {
    width: 250px;
    color: white;
    height: 100vh;
    position: fixed;
    display: flex;
    flex-direction: column;
    align-items: center;
}
    .profile-section {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top:20px;
        margin-left:20px;
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
        margin-right: 15px;
        object-fit: cover;
    }
    .profile-picture h2 {
    font-size: 16px;
    color: #333;
    white-space: nowrap;
    margin-bottom:20px;
    margin-left:70px;
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

    .sidebar h2 {
        margin-top: 10px;
        text-align: center;
    }

    .sidebar ul {
        list-style-type: none;
        padding: 0;
        width: 100%;
        padding-left:140px;
    }

    .sidebar ul li {
        width: 100%;
        border-bottom: 1px solid black; 
        position: relative;
    }

    .sidebar ul li a {
        display: block;
        padding: 15px 0px;
        color: black;
        text-decoration: none;
        width: 100%;
    }
    .sidebar ul li::before {
    content: '>'; 
    position: absolute;
    right: 3px;
    top:15px;
    color: black;
}
.container {
    margin-top: 40px;
}

.back-button {
    margin-bottom: 20px;
}

.reviews-list {
    margin-top: 20px;
}

.review-card {
    border: 1px solid #d3a992;
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 5px;
}

.add-review {
    margin-top: 30px;
    padding-top: 20px;
    border-top: 1px solid #ccc;
}

.add-review textarea {
    width: 100%;
    height: 100px;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #d3a992;
    border-radius: 5px;
}

.add-review select {
    margin-bottom: 10px;
    padding: 5px;
}

.add-review button {
    background-color: #8F5E48;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 20px;
    cursor: pointer;
}

.add-review button:hover {
    background-color: #6d4831;
}

    </style>
</head>
<body>
    <div class="sidebar">
        <div class="profile-section">
            <div class="profile-picture">
                <img id="profileImage" src="{{ asset('images/default-avatar.png') }}">
                <h2>{{ Auth::user()->name }}</h2>
            </div>
        </div>
        <h2>Меню</h2>
        <ul>
            <li><a href="{{ route('index') }}">Домівка</a></li>
            <li><a href="{{ route('library') }}">Бібліотека</a></li>
            <li><a href="{{ route('user.books.index') }}">Ваші книги</a></li>
            <li><a href="{{ route('book.upload') }}">Завантажити книгу</a></li>
            <li><a href="{{ route('saved.index') }}">Збережене</a></li>
            <li><a href="{{ route('profile.show') }}">Профіль</a></li>
        </ul>
    </div>

    <div class="container">
        <div class="back-button">
            <a href="{{ route('book.show', ['id' => $book->id]) }}">
                ← Назад до книги
            </a>
        </div>
    
        <h1>Відгуки на книгу: {{ $book->title }}</h1>
    
        @if ($reviews->isEmpty())
            <p>Наразі відгуки відсутні.</p>
        @else
            <div class="reviews-list">
                @foreach ($reviews as $review)
                    <div class="review-card">
                        <h3>{{ $review->user->name }}</h3>
                        <p>{{ $review->content }}</p>
                        <span>Рейтинг: {{ $review->rating }} з 5</span>
                    </div>
                @endforeach
            </div>
        @endif
    
        <div class="add-review">
            <h2>Додати свій відгук</h2>
            <form action="{{ route('reviews.store', ['book_id' => $book->id]) }}" method="POST">
                @csrf
                <textarea name="content" placeholder="Ваш відгук" required></textarea>
                <label for="rating">Оцініть книгу:</label>
                <select name="rating" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <button type="submit">Надіслати</button>
            </form>
        </div>
    </div>
</body>
</html>
