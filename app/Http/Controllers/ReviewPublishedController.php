<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewPublishedController extends Controller
{
    public function index()
    {
        return view('reports.review_published');
}
}