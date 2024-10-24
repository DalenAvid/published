<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PurchasedBook;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
class PurchasedBookController extends Controller
{
    public function index()
{
    $user_id = Auth::id();
    $purchasedBooks = PurchasedBook::where('user_id', $user_id)->with('book')->get();
    return view('our_books', compact('purchasedBooks'));
}
    public function addPurchasedBooks(Request $request)
    {
        $selected_books = session()->get('selected_books', []);
    
        if (empty($selected_books)) {
            return redirect()->back()->with('error', 'Ваш кошик порожній');
        }
        $order = Order::create([
            'user_id' => Auth::id(),
            // Додайте інші поля замовлення, якщо потрібно
        ]);

        foreach ($selected_books as $book) {
            PurchasedBook::create([
                'user_id' => Auth::id(),
                'book_id' => $book['id'], 
                'order_id' => $order->id, 
            ]);
        }
        session()->forget('selected_books');
        return redirect()->route('thanks_for_your_order');
    }
}
