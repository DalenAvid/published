<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminOrderHistoryController extends Controller
{
    public function index()
    {
        return view('adminpanel.adminorderhistory');
    }
}
