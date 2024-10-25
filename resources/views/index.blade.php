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
    margin-left:200px;
    gap: 50px;
}

.book-card {
    background-color: #DACFC3;
    padding: 10px; 
    width: 40%; 
    box-sizing: border-box;
}

.book-content {
    display: flex;
    align-items: center;
}
.book-content img {
    width: 100px; 
    height: 160px;
    margin: 0 20px; 
}

.book-info {
    text-align: center;
}

.book-info h3 {
    font-size: 16px;
    margin: 10px 0 5px 0;
}

.book-info p {
    font-size: 14px;
    color: #555;
    margin-bottom: 5px; 
}
.content {
    margin-left: 190px;
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
    width: 120px; 
    height: 180px; 
    object-fit: cover; 
    border-radius: 5px;
    margin-right: 20px;
}

.card-content {
    display: flex;
    flex-direction: column;
    align-items: flex-start; 
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

.buy {
    background-color: #8F5E48; 
    color: white; 
    border: none; 
    border-radius: 20px; 
    padding: 10px 20px;
    font-size: 14px; 
    cursor: pointer; 
    margin-bottom: 5px; 
}
.carousel {
    display: flex;
    align-items: center;
    margin-left: 230px;
    position: relative;
}

.carousel-container {
    overflow: hidden;
    max-width: 820px;
    position: relative;
}

.carousel-track {
    display: flex;
    transition: transform 0.5s ease;
    will-change: transform;
}

.carousel-item {
    flex: 0 0 240px; 
    margin-right: 40px; 

}
.carousel-item:hover {
        transform: scale(1.1);
        transition: transform 0.5s ease;
        
        cursor: pointer;
        z-index: 1;
        position: relative;
        
        margin-bottom: 40px;

    }
.carousel-item img {
    width: 140px; 
    height: 200px; 
    object-fit: cover; 
    border-radius: 5px;
}

.carousel-content {
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.prev, .next {
    background-color: #8F5E48;
    color: white;
    border: none;
    font-size: 24px;
    padding: 10px;
    cursor: pointer;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 1;
    transition: background-color 0.3s ease, opacity 0.3s ease;
}

.prev {
    left: -60px; 
}

.next {
    right: 320px; 
}

.prev.disabled, .next.disabled {
    background-color: #ccc;
    cursor: not-allowed;
    opacity: 0.5;
}
.rating {
    margin-top: 5px;
    font-size: 14px;
    color: #5a3e2b;
}

</style>
<body>
    <div>


        <aside>
            @include('sidebar') 
        </aside>
    </div>
    {{-- <div class="sidebar">
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
    </div> --}}

    <div class="content">
        <header class="header">
            <div class="header-title">Домівка</div>
            <div class="header-search" style="position: relative;">
                <input id="search-input" type="text" placeholder="Шукати за назвою, жанром або автором" style="padding-right: 40px;">
                <button id="search-button" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); border: none; background: transparent; cursor: pointer;">
                    <img src="icons/search.jpg" alt="" style="width: 20px; height: 20px;">
                </button>
            </div>
        </header>
        <h2 style="margin-left: 220px;  margin-top:-10px;">Для Вас</h2>
        <div class="featured-books" id="featured-books">
            @foreach($books->take(2) as $book) 
                <div class="book-card">
                    <div class="book-content">
                        <img src="{{ $book->cover_image }}" alt="{{ $book->title }}">
                        <div class="book-info">
                            <h3>{{ $book->title }}</h3>
                            <p>{{ $book->author ?? 'Автор невідомий' }}</p>
                            <p> ⭐⭐⭐⭐⭐</p>
                            <p>{{ $book->genre }}</p>
                            <button class="buy" onclick="window.location.href='{{ route('more_detail', ['id' => $book->id]) }}'">Придбати</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <h2 style="margin-left: 220px; margin-top:-10px;">Вибране</h2>
        <div class="carousel">
            <button class="prev">&#8249;</button>
            <div class="carousel-container">
                <div class="carousel-track">
                    @foreach($books as $book)
                        <div class="carousel-item" data-url="{{ route('more_detail', ['id' => $book->id]) }}">
                            <img src="{{ $book->cover_image }}" alt="Обложка книги">
                            <div class="carousel-content">
                                <div class="title">{{ $book->title }}</div>
                                <div class="author">{{ $book->author ?? 'Автор невідомий' }}</div>
                                <div class="genre"  style="display: none;">{{ $book->genre ?? 'Невідомий жанр' }}</div>
                                <p> ⭐⭐⭐⭐⭐</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <button class="next">&#8250;</button>
        </div>
    
    </div>
 
</body>
<script>
     const prevButton = document.querySelector('.prev');
const nextButton = document.querySelector('.next');
const track = document.querySelector('.carousel-track');
const items = document.querySelectorAll('.carousel-item');

let currentIndex = 0;
const itemsToShow = 3;
const itemWidth = 280;

function updateButtons() {
    const visibleItems = Array.from(items).filter(item => item.style.display !== 'none'); 
if (currentIndex === 0) {
    prevButton.classList.add('disabled');
} else {
    prevButton.classList.remove('disabled');
}

if (currentIndex >= visibleItems.length - itemsToShow) {
    nextButton.classList.add('disabled');
} else {
    nextButton.classList.remove('disabled');
}
}

prevButton.addEventListener('click', () => {
    if (currentIndex > 0) {
        currentIndex--;
        track.style.transform = `translateX(-${currentIndex * itemWidth}px)`;
        updateButtons();
    }
});

nextButton.addEventListener('click', () => {
    if (currentIndex < items.length - itemsToShow) {
        currentIndex++;
        track.style.transform = `translateX(-${currentIndex * itemWidth}px)`;
        updateButtons();
    }
});

updateButtons();

function selectBook(coverImage, title, author, genre, bookUrl) {
    const featuredBooks = document.getElementById('featured-books');
    featuredBooks.innerHTML = ''; 

    featuredBooks.innerHTML = `
        <div class="book-card">
            <div class="book-content">
                <img src="${coverImage}" alt="${title}">
                <div class="book-info">
                    <h3>${title}</h3>
                    <p>${author}</p>
                    <p> ⭐⭐⭐⭐⭐</p>
                    <p>${genre}</p>
                    <button class="buy" onclick="window.location.href='${bookUrl}'">Придбати</button>
                </div>
            </div>
        </div>
    `;
}

document.querySelectorAll('.carousel-item').forEach(item => {
    item.addEventListener('click', function() {
        const coverImage = this.querySelector('img').src;
        const title = this.querySelector('.title').textContent;
        const author = this.querySelector('.author').textContent;
        const genre = this.querySelector('.genre') ? this.querySelector('.genre').textContent : '';
        const bookUrl = this.getAttribute('data-url'); 
        selectBook(coverImage, title, author, genre, bookUrl);
    });
});

document.getElementById('search-button').addEventListener('click', filterBooks);
document.getElementById('search-input').addEventListener('input', filterBooks);

function filterBooks() {
    const query = document.getElementById('search-input').value.toLowerCase();

    const carouselItems = document.querySelectorAll('.carousel-item');
    
    carouselItems.forEach(item => {
        const title = item.querySelector('.title').textContent.toLowerCase();
        const author = item.querySelector('.author').textContent.toLowerCase();
        const genre = item.querySelector('.genre') ? item.querySelector('.genre').textContent.toLowerCase() : '';

        if (title.includes(query) || author.includes(query) || genre.includes(query)) {
            item.style.display = 'block';
        } else {
            item.style.display = 'none'; 
        }
    });
    document.getElementById('featured-books').innerHTML = '';
    updateCarouselWidth();
}

function updateCarouselWidth() {
    const carouselItems = document.querySelectorAll('.carousel-item');
    const track = document.querySelector('.carousel-track');

    let visibleItems = 0;
    carouselItems.forEach(item => {
        if (item.style.display !== 'none') {
            visibleItems++;
        }
    });

    const totalWidth = visibleItems * itemWidth;
    track.style.width = `${totalWidth}px`;
    currentIndex = 0; 
    track.style.transform = `translateX(0)`; 
    updateButtons(); 
}

updateCarouselWidth();
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
    }
</script>

</html>