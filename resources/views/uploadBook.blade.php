<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Завантаження книги</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            background-color: #fff; /* Легкий фон для контрасту */
        }

        
        .content {
            flex-grow: 1;
            padding: 20px;
        }

        h1 {
            color: #8b4513; /* Коричневий заголовок */
        }

        .upload-container {
            background-color: #fff; /* Білий фон для контенту */
            padding: 20px;
            border-radius: 8px; /* Закруглені кути */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Тінь для контейнера */
        }

        label {
            display: block;
            margin: 10px 0 5px; /* Відступи між мітками і полями вводу */
        }

        input[type="text"],
        input[type="number"],
        input[type="file"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #8b4513; /* Коричнева рамка */
            border-radius: 4px; /* Закруглені кути */
            transition: border-color 0.3s ease; /* Плавний перехід рамки */
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        textarea:focus {
            border-color: #d2691e; /* Темніша коричнева при фокусі */
            outline: none; /* Вимкнення стандартного контурного маркера */
        }

        button {
            background-color: #8b4513; /* Коричневий фон */
            color: #fff; /* Білий текст */
            border: none; /* Без рамки */
            padding: 10px 15px;
            border-radius: 4px; /* Закруглені кути */
            cursor: pointer; /* Курсор при наведенні */
            transition: background-color 0.3s ease; /* Плавний перехід фону */
        }

        button:hover {
            background-color: #d2691e; /* Темніший коричневий при наведенні */
        }

        .file-upload {
            position: relative;
            width: 100%;
            height: 150px; /* Висота для блоку */
            border: 2px dashed #8b4513; /* Коричнева пунктирна рамка */
            border-radius: 4px; /* Закруглені кути */
            display: flex;
            justify-content: center;
            align-items: center;
            color: #8b4513; /* Коричневий текст */
            font-size: 24px; /* Розмір шрифту */
            margin-bottom: 15px; /* Відступ знизу */
            cursor: pointer; /* Курсор при наведенні */
        }

        .file-upload:hover {
            background-color: #f5f5f5; /* Світлий фон при наведенні */
        }

        .file-upload input[type="file"] {
            display: none; /* Сховати стандартний файл вводу */
        }

        .cover-preview {
            display: none; /* Сховати зображення за замовчуванням */
            max-width: 100%;
            border-radius: 4px; /* Закруглені кути */
            margin-top: 10px; /* Відступ зверху */
        }




        form {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    border-radius: 8px;
    align-items: center;
    display: flex;
    flex-direction: column;
}

form div {
    margin-bottom: 15px;
    width: 100%;
    text-align: center;
}
form label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
    text-align: center; 
}

form input[type="text"],
form input[type="number"],
form textarea {
    width: 40%;
    padding: 10px;
    border: 1px solid #8B4D31;
    border-radius: 4px;
    font-size: 16px;
    box-sizing: border-box;
    margin: 0 auto; 
}

form textarea {
    height: 100px;
    resize: vertical;
}

form input[type="file"] {
    padding: 10px;
    border: 1px solid #8B4D31;
    border-radius: 4px;
    background-color: #fff;
    cursor: pointer;
    width: 40%;
    margin: 0 auto;
}


    form button {
    background-color: #8B4D31; 
    color: #ffffff; 
    padding: 12px 20px;
    font-size: 16px;
    border-radius: 20px; 
    cursor: pointer;
    width: 40%; 
    margin: 0 auto;
    display: block;
}

form button:hover {
    background-color: #734222;
}
    </style>
</head>

<body>
    <div>
        <aside>
            @include('sidebar')
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
            <p style="font-size:20px;">Надихайте інших на творчість та створення!</p>
            <h2>Крок1</h2>
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
                    <input type="text" id="title" name="title" value="{{ old('title') }}" placeholder="Назва книги" required>
                </div>

                <div>
                    <textarea id="description" name="description" placeholder="Опис книги" required>{{ old('description') }}</textarea>
                </div>

                <div>
                    <input type="text" id="language" name="language" value="{{ old('language') }}" placeholder="Мова" required>
                </div>

                <div>
                    <input type="text" id="genre" name="genre" value="{{ old('genre') }}" placeholder="Жанр" required>
                </div>

                <div>
                    <input type="text" id="age" name="age" value="{{ old('age') }}" placeholder="Вік" required>
                </div>

                <div>
                    <input type="number" id="year" name="year" value="{{ old('year') }}" placeholder="Рік видання" required>
                </div>

                <div>
                    <input type="number" id="pages" name="pages" value="{{ old('pages') }}" placeholder="Кількість сторінок" required>
                </div>
                <div>
                    <input type="number" id="price" name="price" value="{{ old('price') }}" placeholder="Ціна" step="0.01" required>
                </div>

                <div>
                    <label for="book_file">Файл книги:</label>
                    <input type="file" id="book_file" name="book_file" accept=".pdf,.doc,.docx" required>
                </div>

                <div class="file-upload">
                    <span>+</span> <!-- Плюс по центру -->
                    <label for="cover_image" style="cursor: pointer;">Обкладинка книги:</label>
                    <input type="file" id="cover_image" name="cover_image" accept="image/*" required>
                </div>

                <button type="submit">Зберегти</button>
             
            </form>
            <img id="coverPreview" class="cover-preview" src="" alt="Preview of the cover image">

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
    </div>
</body>

</html>
