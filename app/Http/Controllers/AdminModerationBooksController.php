<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminModerationBooksController extends Controller
{
    public function index()
    {
        return view('adminpanel.adminmoderationbooks');
    }
}
