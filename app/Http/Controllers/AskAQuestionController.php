<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AskAQuestionController extends Controller
{
    public function index()
    {
        return view('reports.ask_a_question');
    }
}
