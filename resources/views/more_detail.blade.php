
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
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
    
    .featured-books {
    display: flex;
    justify-content: flex-start;
    margin: 30px 0;
    padding: 10px;
    margin-left: 200px;
    gap: 50px;
}

.book-card {

     margin-top: 160px;
    margin-left: 420px; 
        border: 1px solid #F6EEE8;
        background-color: #ffffff;
        padding: 10px;
        width: 60%; 
        box-sizing: border-box;
    }
    .book-content {
        display: flex;
        align-items: flex-start;
    }
    .book-content img {
        display: flex;
        align-items: center;
        width: 270px; 
        height: 490px;
        margin-right: 20px;
    }
    .book-info h3 {
        margin: 0;
        font-size: 22px; 
        color: #5a3e2b;
    }
    .book-info p {
        margin: 5px 0;
        color: #5a3e2b;
        font-size: 16px; 
        width: 600px;
    }
    .buy {
        background-color: #8F5E48; 
        color: white; 
        border: none; 
        border-radius: 20px; 
        padding: 10px 20px;
        font-size: 14px; 
        cursor: pointer; 
        margin-top: 10px; 
    }
.content {
    margin-top:80px;
    margin-left: 240px;
    padding: 20px;
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
    margin-left: 200px;
}

.header-subtitle {
    font-size: 18px;
    color: #555;
    margin-left: 220px;
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

.container {
    display: grid;
    grid-template-columns: repeat(3, 1fr); 
    gap: 20px; 
    padding: 30px;
    margin-left: 160px;
}

.card {
    display: flex;
    align-items: center; 
    padding: 10px;
    border-radius: 5px;
}

.card img {
    width: 100px;
    border-radius: 5px;
    margin-right: 20px;
}

.card-content {
    display: flex;
    flex-direction: column;
}

.title {
    font-size: 16px;
    font-weight: bold;
    margin-bottom: 5px;
}

.author {
    font-size: 14px;
    color: #555;
}

.inline-text {
    display: inline; 
    margin-right: 10px; 
}
.back-button {
    position: absolute;
    top: 10px;
    left: 10px;
}

.back-button a {
    font-size: 16px;
    color: #6d4831;
    text-decoration: none;
    padding: 5px 10px;
    border: 1px solid #d3a992;
    border-radius: 5px;
    background-color: #fff;
    transition: background-color 0.3s ease;
}

.back-button a:hover {
    background-color: #d3a992;
    color: #fff;
}
</style>
<body>
    <div class="back-button">
        <a href="/index">
            ← 
        </a>
    </div>
    <div class="sidebar">
       
        <h2>Меню</h2>
        <aside>
            @include('sidebar')  <!-- Подключаем боковое меню -->
        </aside>
    </div>

    <div class="book-card">
    <div class="book-content">
        <img src="{{ $book->cover_image }}" alt="{{ $book->title }}">
        <div class="book-info">
                <div style="display: flex; align-items: center; justify-content: space-between;">
                    <h3>{{ $book->title }}</h3>
                    <form action="{{ route('book.save', ['id' => $book->id]) }}" method="POST">
                        @csrf
                        <button type="submit" style="background: none; border: none;">
                            <img src="{{ asset('icons/save.jpg') }}" alt="Save" style="width: 30px; height: 30px; cursor: pointer;">
                        </button>
                    </form>
                   </div>
                <p>Автор: {{ $book->author }}</p>
                <p>Ціна: {{ $book->price }} грн</p>

               <button class="buy" onclick="window.location.href='{{ route('page1.add', ['id' => $book->id]) }}'">Придбати</button>
        
                <h2>Опис</h2>
                <p>{{ $book->description }}</p>

                <h2 style="display: inline;">Жанр:</h2>
                <p style="display: inline;">{{ $book->genre }}</p><br>

                <h2 style="display: inline;">Вік:</h2>
                <p style="display: inline;">{{ $book->age }}</p><br>

                <h2 style="display: inline;">Мова:</h2>
                <p style="display: inline;">{{ $book->language }}</p><br>

                <h2 style="display: inline;">Рік видання:</h2>
                <p style="display: inline;">{{ $book->year }}</p><br>
            </div>
    </div>
</div>
 
</body>
<script>
    window.onload = function() {
        const book = {
            title: "{{ $book['title'] }}",
            author: "{{ $book['author'] }}",
            price: "{{ $book['price'] }}",
            cover_image: "{{ $book['cover_image'] }}"
        };
        localStorage.setItem('book', JSON.stringify(book));
    };
    
    window.onload = function() {
        const savedBook = JSON.parse(localStorage.getItem('book'));
        if (savedBook) {
            document.querySelector('.item-title').textContent = savedBook.title;
            document.querySelector('.item-author').textContent = savedBook.author;
            document.querySelector('.item-price').textContent = savedBook.price + ' грн';
            document.querySelector('.item img').src = savedBook.cover_image;
        }
    };
    </script>
    
</html>
