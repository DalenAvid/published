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
        $reviews = $book->reviews()->with('user')->get();
        return view('books.reviews', compact('book', 'reviews'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);
        Review::create([
            'user_id' => auth()->id(),
            'book_id' => $id,
            'content' => $request->input('content'),
        ]);
        return redirect()->route('book.reviews', $id)->with('success', 'Відгук успішно додано!');
    }
    

}