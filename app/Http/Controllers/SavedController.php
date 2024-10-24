<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SavedBook;
use Illuminate\Support\Facades\Auth;
class SavedController extends Controller
{
    // public function index()
    // {
    //     return view('saved');
    // }
    public function index()
{
    $savedBooks = SavedBook::where('user_id', Auth::id())->with('book')->get();
    return view('saved', compact('savedBooks'));
}
public function share()
{
    return redirect()->back()->with('success', 'Список книг поділений!');
}

}
