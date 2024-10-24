<div class="cart-items">
    <h1>Ваш кошик</h1>

    @if(session('cart') && count(session('cart')) > 0)
        @foreach(session('cart') as $id => $book)
            <div class="cart-item">
                <img src="{{ asset('storage/covers/' . $book->cover_image) }}" alt="{{ $book->title }}">
                <div class="item-details">
                    <div class="item-title">{{ $book->title }}</div>
                    <div class="item-author">{{ $book->author }}</div>
                    <div class="item-price">{{ $book->price }} грн</div>
                </div>
            </div>
        @endforeach
    @else
        <p>Ваш кошик порожній.</p>
    @endif
</div>