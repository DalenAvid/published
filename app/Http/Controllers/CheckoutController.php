<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Order;
use App\Models\PurchasedBook;
use Illuminate\Support\Facades\Auth;
class CheckoutController extends Controller
{
    // public function show($id)
    // {
    //     $book = Book::findOrFail($id); 
    //     return view('payments', compact('book'));
    // }
    public function show()
    {
        $cart = session()->get('cart', []);
        return view('payments', compact('cart'));
    }
    public function processOrder(Request $request)
    {
        $request->validate([
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'card_type' => 'required|string|in:Visa,MasterCard',
            'card_number' => 'required|string|max:20',
            'expiry_date' => 'required|string|max:5',
            'cvv' => 'required|string|max:3',
        ]);
        Order::create([
            'phone' => $request->phone,
            'address' => $request->address,
            'card_type' => $request->card_type,
            'card_number' => $request->card_number,
            'expiry_date' => $request->expiry_date,
            'cvv' => $request->cvv
        ]);
        $selectedBooks = session('selected_books', []);
        foreach ($selectedBooks as $id => $book) {
            PurchasedBook::create([
                'user_id' => Auth::id(),
                'book_id' => $book['id'], 
                // 'order_id' => $order->id, // Зв'язати книгу з замовленням
            ]);
        }

        session()->forget('selected_books');
        return redirect()->route('thanks_for_your_order');
    }
    public function thanksForYourOrder()
    {
        return view('thanks_for_your_order');
    }
}
