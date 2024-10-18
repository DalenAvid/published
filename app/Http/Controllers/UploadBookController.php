<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Book;
class UploadBookController extends Controller
{
    public function create()
    {
        return view('uploadBook');
    }

    public function preview(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'language' => 'required|string|max:50',
            'genre' => 'required|string|max:255',
            'age' => 'required|integer',
            'year' => 'required|integer',
            'pages' => 'required|integer',
            'book_file' => 'required|file',
            'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('cover_image')) {
            $path = $request->file('cover_image')->store('temp_cover_images', 'public');
            $validatedData['cover_image'] = $path;
        }

        $request->session()->put('book_data', $validatedData);

        return redirect()->route('preview.new');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'language' => 'required|string|max:50',
            'genre' => 'required|string|max:255',
            'age' => 'required|integer',
            'year' => 'required|integer',
            'pages' => 'required|integer',
            'book_file' => 'required|file|mimes:pdf,doc,docx',
            'cover_image' => 'required|image|mimes:jpg,jpeg,png',
        ]);
    
        try {
            $bookFilePath = $request->file('book_file')->store('books', 'public');
            $coverImagePath = $request->file('cover_image')->store('covers', 'public');
    
            $book = new Book();
            $book->title = $validatedData['title'];
            $book->description = $validatedData['description'];
            $book->language = $validatedData['language'];
            $book->genre = $validatedData['genre'];
            $book->age = $validatedData['age'];
            $book->year = $validatedData['year'];
            $book->pages = $validatedData['pages'];
            $book->book_file = $bookFilePath;
            $book->cover_image = $coverImagePath;
            $book->save();
            echo "Книга успішно додана!";
    
            return redirect()->route('library')->with('success', 'Книга успішно додана!');
        } catch (\Exception $e) {
            echo "Помилка при додаванні книги: " . $e->getMessage();
            return redirect()->route('library')->with('error', 'Помилка при додаванні книги!');
        }
    }
    

    public function showPreviewPage(Request $request)
    {
        // $data = $request->session()->get('book_data', []);

       
        // $title = $data['title'] ?? ''; 
        // $description = $data['description'] ?? '';
        // $language = $data['language'] ?? '';
        // $genre = $data['genre'] ?? '';
        // $age = $data['age'] ?? '';
        // $year = $data['year'] ?? '';
        // $pages = $data['pages'] ?? '';
        // $book_file = $data['book_file'] ?? '';
        // $cover_image = $data['cover_image'] ?? '';
    
        // return view('preview', compact('title', 'description', 'language', 'genre', 'age', 'year', 'pages', 'book_file', 'cover_image'));
        $data = $request->session()->get('book_data', []);

        return view('preview', compact('data'));
    }
    public function showPreview(Request $request)
    {
        $data = $request->session()->get('book_data'); 
        return view('preview', compact('data'));
    }

    public function showLibrary()
    {
        $books = Book::all(); 
        return view('library', compact('books'));
    }
}

