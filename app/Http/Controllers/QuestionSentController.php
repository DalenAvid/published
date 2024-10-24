<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionSentController extends Controller
{
    public function index()
    {
        return view('reports.question_sent');
    }
}
