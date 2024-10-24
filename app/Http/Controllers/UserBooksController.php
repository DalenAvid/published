<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
class UserBooksController extends Controller
{
    public function index()
    {
        $books = Book::where('user_id', Auth::id())->get();
        return view('our_books', compact('books'));
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        if ($book->user_id !== Auth::id()) {
            abort(403, 'Ви не маєте доступу до цієї книги.');
        }
        return view('user.books.show', compact('book'));
    }
}
