<style>
    * {
        box-sizing: border-box;
        /* Включити box-sizing для всіх елементів */
    }

    html,
    body {
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
    }

    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #f0f0f0;
        font-family: Arial, sans-serif;
    }

    .container {
        width: 100%;
        /* Контейнер займає всю ширину */
        background-color: white;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    label {
        display: block;
        margin-bottom: 5px;
        color: brown;
        font-size: 14px;
    }

    input[type="text"],
    input[type="number"],
    input[type="url"],
    textarea {
        width: 100%;
        /* Всі інпут-поля займають 100% ширини */
        padding: 10px;
        border: 2px solid brown;
        border-radius: 5px;
        font-size: 14px;
    }
    
    textarea {
        resize: none;
    }

    .button {
        background-color: brown;
        color: white;
        border: none;
        border-radius: 20px;
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
        width: 100%;
        /* Для повної ширини */
        transition: background-color 0.3s;
    }

    .button:hover {
        background-color: #8B4513;
    }

    .form-control {
        border: 2px solid brown;
        padding: 10px;
        border-radius: 5px;
        width: 100%;
        /* Для повної ширини */
    }
</style>

<div class="container">
    <form class="form" method="POST" action="">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $book->title ?? '') }}"
                required>
        </div>
        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" name="author" class="form-control" value="{{ old('author', $book->author ?? '') }}"
                required>
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
        <button type="submit" class="button">Save</button>
    </form>
</div>