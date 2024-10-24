<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThanksForOrderController extends Controller
{
    public function index()
    {
        return view('reports.thanks_for_your_order');
    }
}
