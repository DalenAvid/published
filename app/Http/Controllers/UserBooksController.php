<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class UserBooksController extends Controller
{
    public function index()
    {
        return view('our_books'); 

        // $books = Book::where('user_id', auth()->id())->get();
        
        // return view('user.books.index', compact('books'));
    }
    // public function show($id)
    // {
    //     $book = Book::findOrFail($id);
    //     if ($book->user_id !== auth()->id()) {
    //         abort(403, 'Ви не маєте доступу до цієї книги.');
    //     }
    //     return view('user.books.show', compact('book'));
    // }
}
