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

        .upload-container h1 {
            font-size: 50px;
            margin: 10px 0 5px;
            text-align: center;
        }

        .upload-container h2 {
            font-size: 30px;
            margin-bottom: 10px;
            text-align: center;
        }

        .upload-container p {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .upload-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .file-input-wrapper {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-bottom: 15px;
        }

        .file-input-wrapper div {
            width: 120px;
            height: 120px;
            border: 2px solid #8b4513;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            position: relative;
        }

        .file-input-wrapper div:before {
            content: '+';
            font-size: 48px;
            color: #8b4513;
            position: absolute;
        }

        input[type="file"] {
            display: none;
        }

        form {
            margin-top: 20px;
        }

        .input-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 60px;
        }

        .input-container input,
        .input-container button {
            width: 100%;
            max-width: 500px;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #8b4513;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }

        button {
            background-color: #8b4513;
            color: #fff;
        }

        button:hover {
            background-color: #734222;
        }

        @media (max-width: 500px) {
            .file-input-wrapper {
                flex-direction: column;
                align-items: center;
            }

            .file-input-wrapper div {
                margin-bottom: 20px;
                width: 100%;
                height: auto;
                max-width: 120px;
                max-height: 120px;
            }
        }
    </style>
</head>

<body>
    <div >
       
        <aside>
            @include('sidebar')  <!-- Подключаем боковое меню -->
        </aside>
    </div>
    <div class="content">
        <div class="upload-container">
            <!-- <h1>Завантаження власної книги</h1>
            <p>Надихайте інших на творчість та створення!</p>
            <h2>Крок 1</h2>
            <form action="{{ route('book.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- @method('PUT')  --}}
                 <div class="file-input-wrapper">
                    <div onclick="document.getElementById('book_file').click();">
                        <input type="file" id="book_file" name="book_file" accept=".pdf,.doc,.docx" required style="display: none;">
                        <p style="position: absolute; bottom: -56px; font-size: 12px;">Завантажте файл у форматі .word</p>
                        <span id="bookFileName" style="font-size: 14px; color: green;"></span>
                    </div>
                    <div onclick="document.getElementById('cover_image').click();">
                        <input type="file" id="cover_image" name="cover_image" accept="image/*" required style="display: none;">
                        <p style="position: absolute; bottom: -70px; font-size: 12px;">Завантажте обкладинку у форматі .jpg</p>
                        <span id="coverFileName" style="font-size: 14px; color: green;"></span> 
                    </div>
                </div> 
                <div class="input-container">
                <input type="text" name="title" placeholder="Введіть назву вашої книги" required>
                {{-- <input type="text" name="author" placeholder="Введіть автора" required>
                <input type="description" placeholder="Додайте інформацію про автора" required></input> --}}
                <input type="description" placeholder="Додайте опис" required></input>
                <input type="text" name="language" placeholder="Мова" required>
                <input type="text" name="genre" placeholder="Жанр" required>
                <input type="text" name="age" placeholder="Вік" required>
                <input type="number" name="year" placeholder="Рік видання" required>
                <input type="number" name="pages" placeholder="К-ть сторінок" required>
                <input type="number" name="price" placeholder="Ціна" required>
                <button type="submit">Далі</button>
              
            </form>
            
          
        </div>    -->
            <h1>Завантаження книги</h1>

            @if ($errors->any())
                <div style="color: red;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('book.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="title">Назва книги:</label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}" required>
                </div>

                <div>
                    <label for="description">Опис книги:</label>
                    <textarea id="description" name="description" required>{{ old('description') }}</textarea>
                </div>

                <div>
                    <label for="language">Мова:</label>
                    <input type="text" id="language" name="language" value="{{ old('language') }}" required>
                </div>

                <div>
                    <label for="genre">Жанр:</label>
                    <input type="text" id="genre" name="genre" value="{{ old('genre') }}" required>
                </div>

                <div>
                    <label for="age">Вік:</label>
                    <input type="text" id="age" name="age" value="{{ old('age') }}" required>
                </div>

                <div>
                    <label for="year">Рік видання:</label>
                    <input type="number" id="year" name="year" value="{{ old('year') }}" required>
                </div>

                <div>
                    <label for="pages">Кількість сторінок:</label>
                    <input type="number" id="pages" name="pages" value="{{ old('pages') }}" required>
                </div>

                <div>
                    <label for="book_file">Файл книги:</label>
                    <input type="file" id="book_file" name="book_file" accept=".pdf,.doc,.docx" required>
                </div>

                <div>
                    <label for="cover_image">Обкладинка книги:</label>
                    <input type="file" id="cover_image" name="cover_image" accept="image/*" required>
                </div>

                <div>
                    <label for="price">Ціна:</label>
                    <input type="number" id="price" name="price" value="{{ old('price') }}" step="0.01" required>
                </div>

                <button type="submit">Перегляд</button>
            </form>
            <script>

                document.getElementById('book_file').addEventListener('change', function (event) {
                    var fileName = event.target.files[0].name;
                    document.getElementById('bookFileName').textContent = 'Вибраний файл: ' + fileName;
                });

                document.getElementById('cover_image').addEventListener('change', function (event) {
                    var fileName = event.target.files[0].name;
                    document.getElementById('coverFileName').textContent = 'Вибрана обкладинка: ' + fileName;

                    var reader = new FileReader();
                    reader.onload = function () {
                        var coverUrl = reader.result;
                        document.getElementById('coverPreview').src = coverUrl;
                        document.getElementById('coverPreview').style.display = 'block';
                    };
                    reader.readAsDataURL(event.target.files[0]);
                });
            </script>
        </div>
</body>

</html>