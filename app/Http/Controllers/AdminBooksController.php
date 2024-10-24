<?php

namespace App\Http\Controllers;

use App\Models\Book; // імпортуйте модель
use Illuminate\Http\Request;

class AdminBooksController extends Controller
{
    public function index()
    {
        $books = Book::all(); // отримати всі книги
        return view('adminpanel.adminbooks', compact('books')); // передати книги в вигляд
    }
}
