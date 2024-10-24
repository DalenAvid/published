<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModerationOfTheBookController extends Controller
{

    public function index()
    {
        return view('reports.moderation_of_the_book');
    }
}
