<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\Book;
use Illuminate\Http\Request;

class IndexController extends Controller
{
  
    public function index()
    {
        $books = Book::all(); 
        return view('index', compact('books'));
    }
    public function library()
    {
        $bookData = session()->get('book_data');
        $books = [];
        if ($bookData) {
            $books[] = [
                'title' => $bookData['title'],
                'description' => $bookData['description'],
                'language' => $bookData['language'],
                'genre' => $bookData['genre'],
                'age' => $bookData['age'],
                'year' => $bookData['year'],
                'pages' => $bookData['pages'],
                'cover_image_path' => $bookData['cover_image_path'] ?? null,
            ];
        }

        return view('index', compact('books'));
    }

}