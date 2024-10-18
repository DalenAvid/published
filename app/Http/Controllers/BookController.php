<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('library', compact('books'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'language' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'age' => 'required|string|max:10',
            'year' => 'required|integer',
            'pages' => 'required|integer',
            'book_file' => 'required|file|mimes:pdf',
            'cover_image' => 'required|image|mimes:jpeg,png',
        ]);
        if ($request->hasFile('book_file')) {
            $bookFilePath = $request->file('book_file')->store('books', 'public'); 
        }

        if ($request->hasFile('cover_image')) {
            $coverImagePath = $request->file('cover_image')->store('covers', 'public'); 
        }

        Book::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'language' => $validated['language'],
            'genre' => $validated['genre'],
            'age' => $validated['age'],
            'year' => $validated['year'],
            'pages' => $validated['pages'],
            'book_file' => $bookFilePath ?? null, 
            'cover_image' => $coverImagePath ?? null, 
        ]);

        return redirect('/library')->with('success', 'Книга успішно додана!');
     
    }
}
