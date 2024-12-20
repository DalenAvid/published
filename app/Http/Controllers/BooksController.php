<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;
use App\Models\Book;
class BooksController extends Controller
{
    public function index()
    {
        $books = Books::all();
        return view('books.index', compact('books'));
    }
    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'rating' => 'required|numeric|min:0|max:5',
            'cover_image_url' => 'required|string|max:255',
            'comment' => 'nullable|string',
            'description' => 'required|string',
            'language' => 'required|string|max:255',
            'age_recommendation' => 'nullable|string|max:255',
            'publication_year' => 'required|integer|min:1000|max:9999',
        ]);

        Books::create($request->all());

        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }

    public function show($id)
    {
        $book = Books::findOrFail($id);
        return view('books.show', compact('book'));
    }
    public function edit($id)
    {
        $book = Books::findOrFail($id);
        return view('books.edit', compact('book'));
    }
    public function incrementReadCount($id)
    {
        $book = Book::find($id);
        if ($book) {
            $book->increment('read_count');
            return response()->json(['success' => true, 'count' => $book->read_count]);
        }
        return response()->json(['success' => false], 404);
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'rating' => 'required|numeric|min:0|max:5',
            'cover_image_url' => 'required|string|max:255',
            'comment' => 'nullable|string',
            'description' => 'required|string',
            'language' => 'required|string|max:255',
            'age_recommendation' => 'nullable|string|max:255',
            'publication_year' => 'required|integer|min:1000|max:9999',
        ]);

        $book = Books::findOrFail($id);
        $book->update($request->all());

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }
    public function destroy($id)
    {
        $book = Books::findOrFail($id);
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
}
