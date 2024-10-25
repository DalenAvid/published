<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order; // ��мпортуйте модель Order

class AdminOrderHistoryController extends Controller
{
    public function index()
    {
        $orders = Order::with(['user', 'book'])->orderBy('created_at', 'desc')->get();
        return view('adminpanel.adminorderhistory', compact('orders')); // Передаємо змінну $orders у вигляд

    }
}
