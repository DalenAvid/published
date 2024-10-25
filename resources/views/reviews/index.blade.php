{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Відгуки про книгу {{ $book->title }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
        }
        .review-list {
            margin-top: 20px;
        }
        .review-item {
            border-bottom: 1px solid #ddd;
            padding: 15px 0;
        }
        .review-item:last-child {
            border-bottom: none;
        }
        .review-rating {
            color: #ffa500;
        }
        .review-comment {
            margin-top: 10px;
            color: #555;
        }
        .add-review {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 2px solid #eee;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        input[type="number"],
        textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            padding: 10px 20px;
            background-color: #8B4513;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #6F4C3E;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Відгуки про книгу: {{ $book->title }}</h2>

        <!-- Відгуки -->
        <div class="review-list">
            @if($reviews->isEmpty())
                <p>Ще немає відгуків про цю книгу.</p>
            @else
                @foreach($reviews as $review)
                    <div class="review-item">
                        <div class="review-rating">Оцінка: {{ $review->rating }} ⭐</div>
                        <div class="review-comment">{{ $review->comment }}</div>
                    </div>
                @endforeach
            @endif
        </div>

        <!-- Додавання нового відгуку -->
        <div class="add-review">
            <h3>Залишити відгук</h3>
            <form action="{{ route('books.reviews.store', ['id' => $book->id]) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="rating">Оцінка (1-5)</label>
                    <input type="number" id="rating" name="rating" min="1" max="5" required>
                </div>
                <div class="form-group">
                    <label for="comment">Коментар</label>
                    <textarea id="comment" name="comment" rows="4" required></textarea>
                </div>
                <button type="submit">Надіслати відгук</button>
            </form>
        </div>
    </div>
</body>
</html> --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Відгуки про книгу {{ $book->title }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2, h3 {
            color: #333;
        }
        .review-list {
            margin-top: 20px;
        }
        .review-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 20px;
        }
        .review-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 15px;
        }
        .review-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .review-content {
            flex-grow: 1;
        }
        .review-author {
            font-weight: 600;
            color: #333;
        }
        .review-rating {
            color: #ffa500;
            margin-top: 5px;
        }
        .review-comment {
            margin-top: 10px;
            color: #555;
        }
        .add-review {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 2px solid #eee;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        input[type="number"],
        textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .submit-button {
            padding: 10px 20px;
            background-color: #8B4513;
            color: white;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            font-size: 16px;
            display: block;
            width: 100%;
            margin-top: 10px;
            text-align: center;
        }
        .submit-button:hover {
            background-color: #6F4C3E;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Відгуки про книгу: {{ $book->title }}</h2>

        <div class="review-list">
            @if($reviews->isEmpty())
                <p>Ще немає відгуків про цю книгу.</p>
            @else
                @foreach($reviews as $review)
                    <div class="review-item">
                        <div class="review-avatar">
                            <img src="{{ $review->user->avatar ?? 'default-avatar.jpg' }}" alt="Avatar">
                        </div>
                        <div class="review-content">
                            <div class="review-author">{{ $review->user->name ?? 'Анонім' }}</div>
                            <div class="review-rating">Оцінка: {{ $review->rating }} ⭐</div>
                            <div class="review-comment">{{ $review->content }}</div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        <div class="add-review">
            <h3>Залишити відгук</h3>
            <form action="{{ route('books.reviews.store', ['id' => $book->id]) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="rating">Оцінка (1-5)</label>
                    <input type="number" id="rating" name="rating" min="1" max="5" required>
                </div>
                <div class="form-group">
                    <label for="comment">Коментар</label>
                    <textarea id="comment" name="comment" rows="4" required></textarea>
                </div>
                <button type="submit" class="submit-button">Залишити відгук</button>
            </form>
        </div>
    </div>
</body>
</html>
