<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminAddBook;

class AdminAddBookController extends Controller
{
    public function index()
    {
        $book = AdminAddBook::all();

        return view('adminpanel.adminaddbook', compact('book'));
    }

    // Створює нову книгу
    public function create()
    {
        echo 'Creating...';
        return view('adminpanel.adminaddbook');
    }

    // Зберігає нову книгу в базу даних
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'language' => 'required|string|max:50',
            'genre' => 'required|string|max:255',
            'age' => 'required|string|max:50',
            'year' => 'required|integer',
            'pages' => 'required|integer',
            'book_file' => 'required|file|max:2048',
            'cover_image' => 'required|file|max:2048',
            'price' => 'required|numeric',
        ]);

        $book = new AdminAddBook();

        $book->title = $validatedData['title'];
        $book->description = $validatedData['description'];
        $book->language = $validatedData['language'];
        $book->genre = $validatedData['genre'];
        $book->age = $validatedData['age'];
        $book->year = $validatedData['year'];
        $book->pages = $validatedData['pages'];
        $book->price = $validatedData['price'];

        // Обробка файлів
        if ($request->hasFile('book_file')) {
            $book->book_file = $request->file('book_file')->store('books');
        }

        if ($request->hasFile('cover_image')) {
            $book->cover_image = $request->file('cover_image')->store('covers');
        }

        $book->save();

        return redirect()->route('adminpanel.adminbooks')->with('success', 'Книга додана успішно!');
    }

    public function edit($id)
    {
        $book = AdminAddBook::findOrFail($id);
        return view('adminpanel.adminedit', compact('book'));
    }
    public function update(Request $request, $id)
{
    $book = AdminAddBook::findOrFail($id);

    $book->title = $request->input('title');
    $book->description = $request->input('description');
    $book->language = $request->input('language');
    $book->genre = $request->input('genre');
    $book->age = $request->input('age');
    $book->year = $request->input('year');
    $book->pages = $request->input('pages');
    $book->price = $request->input('price');

    // Оновлення файлів
    if ($request->hasFile('cover_image')) {
        $book->cover_image = $request->file('cover_image')->store('covers');
    }

    if ($request->hasFile('book_file')) {
        $book->book_file = $request->file('book_file')->store('books');
    }

    $book->save();

    return redirect()->route('adminaddbook.store')->with('success', 'Книга успішно оновлена!');
}

    public function destroy($id)
    {
        $book = AdminAddBook::findOrFail($id);
        $book->delete();
        return redirect()->route('adminaddbook.store')->with('success', 'Книга успішно видалена!');
    }
    // public function show($id)
    // {
    //     $book = AdminAddBook::findOrFail($id);
    //     return view('admin.books.show', compact('book'));
    // }


}
