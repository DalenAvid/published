<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function checkout(Request $request)
    {
        $request->validate([
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'card_type' => 'required|string|max:20',
            'card_number' => 'required|string|size:16',
            'expiry_date' => 'required|string|size:5',
            'cvv' => 'required|string|size:3',
        ]);
        $selected_books = session()->get('selected_books', []);
        $total_price = 0;
        foreach ($selected_books as $book) {
            $total_price += $book['price'];
        }
        $order = Order::create([
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'card_type' => $request->input('card_type'),
            'card_number' => $request->input('card_number'),
            'expiry_date' => $request->input('expiry_date'),
            'cvv' => $request->input('cvv'),
        ]);


        
        session(['ordered_books' => $selected_books]);
        session()->forget('selected_books');
        return redirect()->route('thanks_for_your_order');
    }
    public function checkout1(Request $request)
    {
        app(PurchasedBookController::class)->addPurchasedBooks($request);
    
        return redirect()->route('thanks_for_your_order');
    }
    public function showThanks()
    {
        return view('thanks_for_your_order');
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
public function showPage1()
{
    $selected_books = session()->get('selected_books', []);

    $total_price = 0;

    foreach ($selected_books as $book) {
        $total_price += $book['price'];
    }

    return view('page1', [
        'selected_books' => $selected_books,
        'total_price' => $total_price 
    ]);
}


}
