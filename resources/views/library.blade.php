{{-- <!DOCTYPE html>
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
    .content {
        margin-left: 250px;
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
        padding: 5px 10px;
        font-size: 16px;
        border: none;
        border-radius: 3px;
    }

    .container {
        display: flex;
        justify-content: space-between;
        padding: 20px;
    }

    .card {
        background-color: #ccc;
        width: 18%;
        padding: 10px;
        box-sizing: border-box;
        border-radius: 5px;
        position: relative;
    }

    .card img {
        width: 100%;
        border-radius: 5px;
    }

    .rating {
        position: absolute;
        top: 10px;
        right: 10px;
        background-color: rgba(0, 0, 0, 0.7);
        color: #fff;
        padding: 5px;
        border-radius: 3px;
    }

    .title {
        margin-top: 10px;
        font-size: 16px;
        font-weight: bold;
    }

    .author {
        font-size: 14px;
        color: #555;
    }
    .books-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    gap: 20px;
}

.book-card {
    border: 1px solid #ddd;
    padding: 15px;
    text-align: center;
}

.book-card img {
    max-width: 100%;
    height: auto;
}

</style>
<body>
    <div class="sidebar">
        <div class="profile-section">
            <div class="profile-picture">
                <img id="profileImage" src="{{ asset('images/default-avatar.png') }}" >
                <h2>{{ Auth::user()->name }}</h2>
            </div>
        </div>
        <h2>Меню</h2>
        
        @include('sidebar')
    </div>

    <div class="content">
        <header class="header">
            <div class="header-title">Бібліотека</div>
            <div class="header-search">
                <input type="text" placeholder="Пошук...">
            </div>
        </header>
        <div class="header-subtitle">Фантастика</div>
        
<form method="GET" action="{{ route('library') }}">
    <select name="genre" onchange="this.form.submit()">
        <option value="">Всі жанри</option>
      
       
        
    </select>
    
    <div class="books-grid">
        @foreach($books as $book)
            <div class="book-card">
                @if($book->cover_image)
    <img src="{{ asset('storage/' . $book->cover_image) }}" alt="Обкладинка">
@endif

                <h3>{{ $book->title }}</h3>
                <p>{{ $book->description }}</p>
                <p><strong>Мова:</strong> {{ $book->language }}</p>
                <p><strong>Жанр:</strong> {{ $book->genre }}</p>
                <a href="{{ asset('storage/' . $book->book_file) }}" download>Завантажити</a>
            </div>
        @endforeach
    </div>
</form>

<div class="books-grid">
    @foreach($books as $book)
        <div class="book-card">
            <img src="{{ asset('storage/' . $book->cover_image) }}" alt="Обкладинка">
            <h3>{{ $book->title }}</h3>
            <p>{{ $book->description }}</p>
            <p><strong>Мова:</strong> {{ $book->language }}</p>
            <p><strong>Жанр:</strong> {{ $book->genre }}</p>
            <a href="{{ asset('storage/' . $book->book_file) }}" download>Завантажити</a>
        </div>
    @endforeach
</div>


        </div>
    </body> --}}
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
        .sidebar ul li a:hover {
        color: brown;
    }

        .sidebar ul li::before {
        content: '>'; 
        position: absolute;
        right: 3px;
        top:15px;
        color: black;
    }
        .content {
            margin-left: 250px;
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
            padding: 5px 10px;
            font-size: 16px;
            border: none;
            border-radius: 3px;
        }
    
        .container {
            display: flex;
            justify-content: space-between;
            padding: 20px;
        }
    
        .card {
            background-color: #ccc;
            width: 18%;
            padding: 10px;
            box-sizing: border-box;
            border-radius: 5px;
            position: relative;
        }
    
        .card img {
            width: 100%;
            border-radius: 5px;
        }
    
        .rating {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: rgba(0, 0, 0, 0.7);
            color: #fff;
            padding: 5px;
            border-radius: 3px;
        }
    
        .title {
            margin-top: 10px;
            font-size: 16px;
            font-weight: bold;
        }
    
        .author {
            font-size: 14px;
            color: #555;
        }
    .library-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

.books-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    gap: 20px;
}

.book-card {
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 10px;
    text-align: center;
    background-color: #f9f9f9;
}
.book-list {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

.book-item {
    border: 1px solid #ccc;
    padding: 10px;
    width: 200px;
    text-align: center;
}

.book-item img {
    max-width: 100%;
    height: auto;
}

.book-cover {
    width: 100%;
    height: auto;
    max-height: 300px;
    object-fit: cover;
    border-radius: 5px;
}

.book-title {
    font-size: 18px;
    margin-top: 10px;
}

.book-genre {
    font-size: 14px;
    color: #666;
}
    </style>
    <body>
        <div class="sidebar">
            <div class="profile-section">
                <div class="profile-picture">
                    <img id="profileImage" src="{{ asset('images/default-avatar.png') }}" >
                    <h2>{{ Auth::user()->name }}</h2>
                </div>
            </div>
            <h2>Меню</h2>
            @include('sidebar')
        </div>
    
        <div class="content">
            <header class="header">
                <div class="header-title">Бібліотека</div>
                <div class="header-search">
                    <input type="text" placeholder="Пошук...">
                </div>
            </header>
            <div class="book-list">
                @foreach($books as $book)
                    <div class="book-item">
                        <div class="book-cover">
                            <img src="{{ asset('storage/' . $book->cover_image) }}" alt="Cover of {{ $book->title }}">
                        </div>
                        <div class="book-info">
                            <div class="book-title">{{ $book->title }}</div>
                            <div class="book-author">{{ $book->author }}</div> 
                            <div class="book-rating">
                                ⭐⭐⭐⭐☆ 
                            </div>
                        </div>
                        {{-- <h2>{{ $book->title }}</h2>
                        <p><strong>Description:</strong> {{ $book->description }}</p>
                        <p><strong>Language:</strong> {{ $book->language }}</p>
                        <p><strong>Genre:</strong> {{ $book->genre }}</p>
                        <p><strong>Age:</strong> {{ $book->age }}</p>
                        <p><strong>Year:</strong> {{ $book->year }}</p>
                        <p><strong>Pages:</strong> {{ $book->pages }}</p>
                        <p><strong>Book File:</strong> <a href="{{ asset('storage/' . $book->book_file) }}">Download</a></p>
                        <p><strong>Cover:</strong> <img src="{{ asset('storage/' . $book->cover_image) }}" alt="Cover Image" width="150"></p> --}}
                    </div>
                    <hr>
                @endforeach
            </div>
            
            {{-- <div class="header-subtitle">Фантастика</div>
         
            @if($books && count($books) > 0)
            @foreach($books as $book)
                <h2>{{ $book['title'] }}</h2>
                <p>Опис: {{ $book['description'] }}</p>
                <p>Мова: {{ $book['language'] }}</p>
                <p>Жанр: {{ $book['genre'] }}</p>
                <p>Вік: {{ $book['age'] }}</p>
                <p>Рік видання: {{ $book['year'] }}</p>
                <p>Кількість сторінок: {{ $book['pages'] }}</p>
                @if(isset($book['cover_image_path']))
                    <img src="{{ Storage::url($book['cover_image_path']) }}" alt="Обкладинка книги" style="max-width: 200px;">
                @endif
                <hr>
            @endforeach
        @else
            <p>Немає даних для відображення.</p>
        @endif    --}}
            {{-- </div> --}}
            <script>
            </script>
        </body>
    </html>
