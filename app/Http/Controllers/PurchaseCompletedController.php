<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PurchaseCompletedController extends Controller
{

    public function index()
    {
        return view('reports.purchase_completed');
    }
}
