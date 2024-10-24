
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
    /* .header-search input {
        padding: 5px 10px;
        font-size: 16px;
        border: none;
        border-radius: 3px;
    } */
    .header-title {
        font-size:40px;
     margin-top: -10px;  
     font-family: 'Sumy', sans-serif;
    /* align-self: flex-end; */
}

/* .header-search input {
    padding: 5px 10px;
    font-size: 16px;
    border: none;
    border-radius: 3px;
} */
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
        font-size: 17px;
        font-weight: bold;
        font-family: 'Montserrat', sans-serif;
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
</style>
<body>
    <div >
        
        <h2>Меню</h2>
        @include('sidebar')
    </div>

    <div class="content">
        <header class="header">
            <div class="header-title">🔒 Збережені книги</div>
            <div class="title">Ви поширили цей список для інших користувачів. Ви можете 
                </div>
                <div class="title">
                    знову його приховати.</div>
            <div class="button-container">
                <form action="{{ route('saved.index') }}" method="GET">
                    <button type="submit" class="button1">Приховати</button>
                </form>
            </div>
           
        </header>
    </div>
 <script>
        </script>
    </body>
</html>
