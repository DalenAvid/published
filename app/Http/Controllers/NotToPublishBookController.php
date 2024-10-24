<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotToPublishBookController extends Controller
{
    public function index()
    {
        return view('reports.not_to_publish_book');
    }
}
