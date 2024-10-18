<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class LibraryController extends Controller
{
    public function preview(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'language' => 'required|string|max:50',
            'genre' => 'required|string|max:50',
            'age' => 'required|string|max:10',
            'year' => 'required|integer',
            'pages' => 'required|integer',
            'book_file' => 'required|file|mimes:pdf,doc,docx',
            'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $coverImage = $request->file('cover_image');
        $coverImagePath = $coverImage->store('public/covers');

        session()->put('book_data', [
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'language' => $validatedData['language'],
            'genre' => $validatedData['genre'],
            'age' => $validatedData['age'],
            'year' => $validatedData['year'],
            'pages' => $validatedData['pages'],
            'cover_image_path' => $coverImagePath,
        ]);

        return redirect()->route('preview.new');
    }
    public function index()
    {
        $books = Book::all();
        
        return view('library.index', compact('books'));
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

        return view('library', compact('books'));
    }
   
}
