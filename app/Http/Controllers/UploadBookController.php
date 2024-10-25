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
        'author' => 'required|string',
        'description' => 'required|string',
        'language' => 'required|string|max:50',
        'genre' => 'required|string|max:255',
        'age' => 'required|string|max:50',
        'year' => 'required|integer',
        'pages' => 'required|integer',
        'book_file' => 'required|file|max:2048',
        'cover_image' => 'required|string|max:255',
        'price' => 'required|numeric',
    ]);

    // Зберігаємо файли на диску
    $bookFilePath = $request->file('book_file')->store('books');
    //$coverImagePath = $request->file('cover_image')->store('covers');

    // Додаємо шляхи до файлів у дані для сесії
    $validatedData['book_file'] = $bookFilePath;
    //$validatedData['cover_image'] = $coverImagePath;

    // Зберігаємо валідаційні дані в сесії
    $request->session()->put('book_data', $validatedData);

    return redirect()->route('preview.new');
}


    

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string',
            'description' => 'required|string',
            'language' => 'required|string|max:50',
            'genre' => 'required|string|max:255',
            'age' => 'required|string|max:50',
            'year' => 'required|integer',
            'pages' => 'required|integer',
            'book_file' => 'required|file|max:2048',
            'cover_image' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        $book = new Book();

        $book->title = $validatedData['title'];
        $book->author = $validatedData['author'];
        $book->description = $validatedData['description'];
        $book->language = $validatedData['language'];
        $book->genre = $validatedData['genre'];
        $book->age = $validatedData['age'];
        $book->year = $validatedData['year'];
        $book->pages = $validatedData['pages'];
        $book->price = $validatedData['price'];
        $book->cover_image = $validatedData['cover_image'];

        // Обробка файлів
        if ($request->hasFile('book_file')) {
            $book->book_file = $request->file('book_file')->store('books');
        }

        // if ($request->hasFile('cover_image')) {
        //     $book->cover_image = $request->file('cover_image')->store('covers');
        // }

        $book->save();

        return redirect()->route('library')->with('success', 'Книга додана успішно!');
    }
    public function showPreviewPage(Request $request)
    {
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

