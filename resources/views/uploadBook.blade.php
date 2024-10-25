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
    </style>
</head>

<body>
    <div>
        <aside>
            @include('sidebar')  <!-- Подключаем боковое меню -->
        </aside>
    </div>
    <div class="content">
        <div class="upload-container">
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
                    <label for="author">Автор:</label>
                    <input type="text" id="author" name="author" value="{{ old('author') }}" required>
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

                <div class="file-upload">
                    <span>+</span> <!-- Плюс по центру -->
                    <label for="book_file" style="cursor: pointer;">Файл книги:</label>
                    <input type="file" id="book_file" name="book_file" accept=".pdf,.doc,.docx" required>
                </div>

                <div class="file-upload">
                    <span>+</span> <!-- Плюс по центру -->
                    <label for="cover_image" >Обкладинка книги:</label>
                    <input type="text" id="cover_image" name="cover_image"  required>
                </div>

                <div>
                    <label for="price">Ціна:</label>
                    <input type="number" id="price" name="price" value="{{ old('price') }}" step="0.01" required>
                </div>

                <button type="submit">Перегляд</button>
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