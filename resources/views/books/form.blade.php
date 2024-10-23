<style>
    /* Контейнер форми */
.container {
    max-width: 700px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f7f7f7;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Стиль для заголовків полів */
label {
    font-weight: bold;
    color: #333;
    margin-bottom: 8px;
    display: block;
}

/* Поля форми */
.form-group {
    margin-bottom: 20px;
}

/* Вхідні поля тексту, числа та URL */
input[type="text"],
input[type="number"],
input[type="url"],
textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 1rem;
    transition: border-color 0.3s ease;
}

/* Ефект при фокусі на вхідних полях */
input[type="text"]:focus,
input[type="number"]:focus,
input[type="url"]:focus,
textarea:focus {
    border-color: #007bff;
    outline: none;
}

/* Текстова область */
textarea {
    height: 100px;
    resize: vertical;
}

/* Валідація помилок */
input.is-invalid, textarea.is-invalid {
    border-color: #dc3545;
}

.invalid-feedback {
    color: #dc3545;
    font-size: 0.875rem;
}

/* Кнопка відправки форми */
.btn-primary {
    padding: 10px 20px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    font-size: 1rem;
    margin-top: 10px;
}

.btn-primary:hover {
    background-color: #0056b3;
}

/* Стиль для полів "Rating" та "Publication Year" */
input[type="number"] {
    max-width: 150px;
}

</style>

<div class="container">


    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" value="{{ old('title', $book->title ?? '') }}" required>
    </div>
    <div class="form-group">
        <label for="author">Author</label>
        <input type="text" name="author" class="form-control" value="{{ old('author', $book->author ?? '') }}" required>
    </div>
    <div class="form-group">
        <label for="rating">Rating</label>
        <input type="number" name="rating" class="form-control" value="{{ old('rating', $book->rating ?? '') }}"
            required min="0" max="5" step="0.1">
    </div>
    <div class="form-group">
        <label for="cover_image_url">Cover Image URL</label>
        <input type="url" name="cover_image_url" class="form-control"
            value="{{ old('cover_image_url', $book->cover_image_url ?? '') }}">
    </div>
    <div class="form-group">
        <label for="comment">Comment</label>
        <textarea name="comment" class="form-control">{{ old('comment', $book->comment ?? '') }}</textarea>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control"
            required>{{ old('description', $book->description ?? '') }}</textarea>
    </div>
    <div class="form-group">
        <label for="language">Language</label>
        <input type="text" name="language" class="form-control" value="{{ old('language', $book->language ?? '') }}"
            required>
    </div>
    <div class="form-group">
        <label for="age_recommendation">Age Recommendation</label>
        <input type="text" name="age_recommendation" class="form-control"
            value="{{ old('age_recommendation', $book->age_recommendation ?? '') }}">
    </div>
    <div class="form-group">
        <label for="publication_year">Publication Year</label>
        <input type="number" name="publication_year" class="form-control"
            value="{{ old('publication_year', $book->publication_year ?? '') }}" required min="1000" max="9999">
    </div>
</div>