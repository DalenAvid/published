<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $book->title }} - Перегляд PDF</title>
</head>
<body>
    <h1>{{ $book->title }}</h1>
    <iframe src="{{ $book->book_file }}" width="100%" height="600px" frameborder="0"></iframe>
</body>
</html>