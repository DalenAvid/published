<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Order;
class CheckoutController extends Controller
{
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
        return redirect()->route('thanks_for_your_order');
    }
}
