<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
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
    margin-top: 20px;
    margin-left: 20px;
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
    margin-bottom: 20px;
    margin-left: 70px;
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
    margin-left: 250px;
    padding: 20px;
    flex-grow: 1;
}

.header {
    display: flex;
    flex-direction: column; 
    align-items: flex-start; 
    padding: 30px 170px;
}

.header-title {
    color: black;
    font-size: 26px;
    font-weight: bold;
    margin: 0; 
}

.header-subtitle {
    font-size: 18px;
    color: #555;
    margin-left: 220px;
}

.container {
    display: grid;
    grid-template-columns: repeat(4, 1fr); /* 4 книги в ряд */
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

.button-container {
    margin: 20px 0; 
    display: flex;
    justify-content: center;
    gap: 10px; 
}

.button1 {
    padding: 10px 20px;
    background-color: #8B4513; 
    color: white;
    border: none;
    border-radius: 25px; 
    cursor: pointer;
    font-size: 14px;
    transition: background-color 0.3s; 
}

.button1:hover {
    background-color: #6F4C3E; 
}

</style>
<body>
    <div >
        
        
        <aside>
            @include('sidebar')  <!-- Подключаем боковое меню -->
        </aside>
    </div>

    <div class="content">
        <header class="header">
            <div class="header-title">🔒 Збережені книги</div>
            <div class="title">Цей список книг є прихованим від інших користувачів, але ви 
                </div>
                <div class="title">
                    можете поділитись ним на своїй сторінці</div>
           
            <div class="button-container">
                <form action="{{ route('saved1') }}" method="GET">
                    <button type="submit" class="button1">Поділитися</button>
                </form>
            </div>
           
        </header>
      
        <div class="container">
            @if($savedBooks->isEmpty())
                <p>У вас немає збережених книг.</p>
            @else
                @foreach($savedBooks as $savedBook)
                    <div class="book-item">
                        <img src="{{ asset($savedBook->book->cover_image) }}" alt="{{ $savedBook->book->title }}">
                        <div class="book-info">
                            <h3>{{ $savedBook->book->title }}</h3>
                            <p>{{ $savedBook->book->author }}</p>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
            
          
    </div>
</body>
</html>
