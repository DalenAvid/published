<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SavedBook;
use App\Models\Book;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
class ReviewController extends Controller
{
    public function index($id)
    {
        $book = Book::findOrFail($id);
        $reviews = Review::where('book_id', $id)->latest()->get();

        return view('reviews.index', compact('book', 'reviews'));
    }
    public function store(Request $request, $id)
{
    $request->validate([
        'rating' => 'required|integer|min:1|max:5',
        'comment' => 'required|string|max:1000',
    ]);
    $review = new Review();
    $review->user_id = auth()->id();
    $review->book_id = $id;
    $review->content = $request->comment;
    $review->rating = $request->rating;
    $review->created_at = now();
    $review->updated_at = now();
    
    $review->save();
    return redirect()->route('books.reviews', ['id' => $id])
                     ->with('success', 'Ваш відгук було успішно додано!');
}
    // public function store(Request $request, $id)
    // {
    //     $request->validate([
    //         'rating' => 'required|integer|min:1|max:5',
    //         'content' => 'required|string|max:500',
    //     ]);

    //     Review::create([
    //         'user_id' => Auth::id(),
    //         'book_id' => $id,
    //         'rating' => $request->input('rating'),
    //         'content' => $request->input('content'),
    //     ]);

    //     return redirect()->route('books.reviews', ['id' => $id])
    //                      ->with('success', 'Ваш відгук успішно додано!');
    // }

}