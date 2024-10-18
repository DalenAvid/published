<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminAddBook;

class AdminAddBookController extends Controller
{
    public function index()
    {
        $books = AdminAddBook::all();

        return view('adminpanel.adminaddbook', compact('books'));
    }
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
            'author' => 'required|string|max:255',
            'rating' => 'nullable|numeric|min:0|max:5',
            'cover_image_url' => 'nullable|url',
            'comment' => 'nullable|string',
            'description' => 'required|string',
            'language' => 'required|string|max:50',
            'age_recommendation' => 'nullable|integer|min:0',
            'publication_year' => 'required|integer|min:1000|max:9999',
        ]);

        AdminAddBook::create($validatedData);
        echo $request->all();
        echo ' Книга успішно додана!';
        return redirect()->route('adminpanel.adminaddbook')->with('success', 'Книга успішно додана!');
        
    }
}
