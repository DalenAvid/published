<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class CartController extends Controller
{
    public function addToCart($id)
    {
        $book = Book::findOrFail($id); 
        $cart = session()->get('cart', []);
        if (!array_key_exists($id, $cart)) {
            $cart[$id] = $book;
        }
        session()->put('cart', $cart);
        return redirect()->route('cart.show')->with('success', 'Книга додана до кошика');
    }

    public function showCart()
    {
        $cart = session()->get('cart', []);
        return view('cart', compact('cart')); 
    }
}
