<?php

namespace App\Http\Controllers;

use App\Models\Books; // імпортуйте модель
use Illuminate\Http\Request;

class AdminBooksController extends Controller
{
    public function index()
    {
        $books = Books::all(); // отримати всі книги
        return view('adminpanel.adminbooks', compact('books')); // передати книги в вигляд
    }
}
