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
                margin-left: 150px;
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
                margin-left:160px;
            }
    
            .book-item {
                display: flex;
                align-items: center;
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
                margin-left:170px;
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
                    <h2 >{{ $genre }}</h2> 
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