<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublishBookController extends Controller
{
    public function index()
    {
        return view('reports.publish_book');
    }
}