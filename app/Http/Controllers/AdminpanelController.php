<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
class AdminpanelController extends Controller
{
    //     public function index()
// {
//     $orders = Order::with(['user', 'book'])->orderBy('created_at', 'desc')->get();
//     return view('adminpanel.index', compact('orders')); // Передаємо змінну $orders у вигляд
// }
    public function index()
    {
        $orders = Order::with(['user', 'book'])->orderBy('created_at', 'desc')->get();

        $totalOrders = $orders->count();
        $pendingOrders = $orders->where('status', 'pending')->count(); // Якщо у вас є поле статусу
        $shippedOrders = $orders->where('status', 'shipped')->count(); // Якщо у вас є поле статусу

        return view('adminpanel.index', compact('orders', 'totalOrders', 'pendingOrders', 'shippedOrders'));
    }


}
