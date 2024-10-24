@extends('layouts.app')
<style>
.reviews-section {
    padding: 20px;
    margin-left: 200px;
}

.review {
    border-bottom: 1px solid #ccc;
    padding: 10px 0;
}

textarea {
    width: 100%;
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 10px;
    margin-top: 10px;
}

.submit-btn {
    background-color: #8F5E48; 
    color: white; 
    border: none; 
    border-radius: 5px;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    margin-top: 10px;
}


</style>
@section('content')
<div class="reviews-section">
    <h1>Відгуки до книги "{{ $book->title }}"</h1>

    <h2>Відгуки</h2>
    @foreach ($reviews as $review)
        <div class="review">
            <p><strong>{{ $review->user->name }}:</strong> {{ $review->content }}</p>
        </div>
    @endforeach

    <h2>Додати відгук</h2>
    <form action="{{ route('reviews.store', $book->id) }}" method="POST">
        @csrf
        <textarea name="content" rows="5" placeholder="Напишіть ваш відгук" required></textarea>
        <button type="submit" class="submit-btn">Залишити відгук</button>
    </form>
</div>
@endsection
