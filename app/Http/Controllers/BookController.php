<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\SavedBook;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('library', compact('books'));
    }
    public function index1()
    {
        $books = Book::all(); 
        return view('books.index', compact('books'));
    }
    public function show($id) {
        $books = Book::findOrFail($id); 
        return view('more_detail', compact('book'));
    }
    
    public function addToCart(Request $request, $id)
{
    $book = Book::findOrFail($id);

    $cart = session()->get('cart', []);

    if (!isset($cart[$id])) {
        $cart[$id] = [
            "title" => $book->title,
            "author" => $book->author,
            "price" => $book->price,
            "image_url" => $book->cover_image,
            "quantity" => 1,
        ];
    } else {
        $cart[$id]['quantity']++;
    }

    session()->put('cart', $cart);

    return redirect()->route('payments');
}
public function viewCart()
{
    $cart = session()->get('cart', []);

    return view('payments', compact('cart'));
}
public function showOnPage1($id)
{
    $book = Book::findOrFail($id);
    return view('page1', compact('book'));
}
public function addBookToPage1(Request $request, $id)
{
    $book = Book::findOrFail($id);
    $selected_books = session()->get('selected_books', []);
    if (!isset($selected_books[$id])) {
        $selected_books[$id] = [
            'title' => $book->title,
            'author' => $book->author,
            'price' => $book->price,
            'cover_image' => $book->cover_image,
            'description' => $book->description,
        ];
    }
    session()->put('selected_books', $selected_books);
    return redirect()->route('page1', ['id' => $book->id]);
}
public function showPage1()
{  
    $selected_books = session('selected_books', []); 
    $total_price = array_sum(array_column($selected_books, 'price'));
    return view('page1', compact('selected_books', 'total_price'));
}
public function saveBook(Request $request, $id)
{
    $book = Book::findOrFail($id);
    $savedBook = SavedBook::where('user_id', Auth::id())->where('book_id', $book->id)->first();
    if (!$savedBook) {
        SavedBook::create([
            'user_id' => Auth::id(),
            'book_id' => $book->id,
        ]);
    }

    return redirect()->back()->with('success', 'Книга збережена!');
}

public function removeBookFromPage1($id)
{
    $selected_books = session()->get('selected_books', []);

    if (isset($selected_books[$id])) {
        unset($selected_books[$id]);
        session()->put('selected_books', $selected_books);
    }
    return redirect()->route('page1');
}

public function store(Request $request)
{
    $validatedData = $request->validate([
        'user_id' => Auth::id(),
        'title' => 'required|max:255',
        'description' => 'required',
        'language' => 'required|max:50',
        'genre' => 'required|max:255',
        'age' => 'required|max:50',
        'year' => 'required|integer',
        'pages' => 'required|integer',
        'price' => 'required|numeric',
        'book_file' => 'required|mimes:pdf,fb2|max:10240', 
        'cover_image' => 'required|mimes:jpg,jpeg|max:2048',
    ]);

    $bookFilePath = $request->file('book_file')->store('books');
    $coverImagePath = $request->file('cover_image')->store('covers');

    Book::create([
         'user_id' => Auth::id(),
        'title' => $validatedData['title'],
        'description' => $validatedData['description'],
        'language' => $validatedData['language'],
        'genre' => $validatedData['genre'],
        'age' => $validatedData['age'],
        'year' => $validatedData['year'],
        'pages' => $validatedData['pages'],
        'price' => $validatedData['price'],
        'book_file' => $bookFilePath,
        'cover_image' => $coverImagePath,
    ]);

    return redirect()->back()->with('success', 'Книга успішно додана!');
}
public function show1($id)
{
    $book = Book::findOrFail($id); 
    return view('books.show', compact('book'));
}
public function showMoreDetail()
{
    return view('more_detail'); 
}
public function featuredBooks()
{
    $featuredBooks = Book::where('is_featured', true)->get(); 

    return view('books.featured', compact('featuredBooks'));
}
public function search(Request $request)
{
    $query = $request->input('query');
    
    $books = Book::where('title', 'LIKE', "%$query%")
                  ->orWhere('author', 'LIKE', "%$query%")
                  ->get();
    
    return view('books.index', compact('books'));
}
public function showCheckout()
{
    $selected_books = session()->get('selected_books', []);
    $total_price = 0;

    foreach ($selected_books as $book) {
        $total_price += $book['price'];
    }

    return view('checkout', compact('selected_books', 'total_price'));
}
public function savedBooks()
{
    $savedBooks = SavedBook::where('user_id', Auth::id())->with('book')->get();
    
    return view('saved', compact('savedBooks'));
}
public function showReviews($id) {
    $book = Book::findOrFail($id);
    $reviews = $book->reviews; 
    return view('book.reviews', compact('book', 'reviews'));
 }

}