<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
class LibraryController extends Controller
{
    public function index()
    {
        $book = Book::with('users')->get(); 
        $users = User::all(); 
        // return view('library', compact('books'));
        // $books = Book::all();
       // return view('library.index', compact('books'));

    return view('library.index', compact('books', 'users'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
            'language' => 'required',
            'genre' => 'required',
            'age' => 'required',
            'year' => 'required|integer',
            'pages' => 'required|integer',
            'cover_image' => 'required',
            'book_file' => 'required|file|mimes:pdf,doc,docx|max:2048', // Додано для перевірки
        ]);

        $book = new Book();
        $book->title = $request->title;
        $book->description = $request->description;
        $book->language = $request->language;
        $book->genre = $request->genre;
        $book->age = $request->age;
        $book->year = $request->year;
        $book->pages = $request->pages;
        $book->cover_image = $request->cover_image;

        // if ($request->hasFile('cover_image')) {
        //     $coverImage = $request->file('cover_image')->store('covers', 'public');
        //     $book->cover_image = $coverImage;
        // }

        if ($request->hasFile('book_file')) { // Додано для обробки файлів книг
            $bookFile = $request->file('book_file')->store('books', 'public');
            $book->book_file = $bookFile;
        }
        $books = Book::with('user')->get();
        $book = Book::with('user')->get();  

        $book->save();

        return redirect()->route('library.index')->with('success', 'Книгу додано успішно!');
    }

    public function preview(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string',
            'description' => 'required|string',
            'language' => 'required|string|max:50',
            'genre' => 'required|string|max:50',
            'age' => 'required|string|max:10',
            'year' => 'required|integer',
            'pages' => 'required|integer',
            'book_file' => 'required|file|mimes:pdf,doc,docx|max:2048', // Додано для валідації
            'cover_image' => 'required|string|max:255',
        ]);

        $coverImagePath = $request->file('cover_image')->store('public/covers');

        session()->put('book_data', [
            'title' => $validatedData['title'],
            'author' => $validatedData['author'],
            'description' => $validatedData['description'],
            'language' => $validatedData['language'],
            'genre' => $validatedData['genre'],
            'age' => $validatedData['age'],
            'year' => $validatedData['year'],
            'pages' => $validatedData['pages'],
            'cover_image_path' => $validatedData['cover_image'],
        ]);

        return redirect()->route('preview.new');
    }

    public function library()
    {
        $bookData = session()->get('book_data');
        $books = [];
        if ($bookData) {
            $books[] = [
                'title' => $bookData['title'],
                'author' => $bookData['author'],
                'description' => $bookData['description'],
                'language' => $bookData['language'],
                'genre' => $bookData['genre'],
                'age' => $bookData['age'],
                'year' => $bookData['year'],
                'pages' => $bookData['pages'],
                'cover_image_path' => $bookData['cover_image_path'] ?? null,
            ];
        }

        return view('library', compact('books'));
    }
}
