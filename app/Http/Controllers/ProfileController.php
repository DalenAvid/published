<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }
    public function showPreviewPage(Request $request)
    {
        $bookData = $request->session()->get('book_data');
    
        if (!$bookData) {
            return redirect()->route('book.upload')->with('error', 'Дані книги не знайдені');
        }
    
        return view('preview', ['book' => $bookData]);
    }
    
    public function edit()
    {
        $user = auth()->user(); 
        return view('modify', compact('user'));
    }

    public function questionsAnswers()
    {
        $user = auth()->user(); 
        return view('questions_answers', compact('user'));
    }

    public function uploadPhoto(Request $request)
    {
        if ($request->hasFile('photo')) {
            $user = Auth::user();
            $file = $request->file('photo');
            $filePath = $file->store('uploads/photos', 'public'); 
            $user->photo = $filePath;
            $user->save();
    
            return response()->json(['success' => true, 'filePath' => $filePath]);
        }
    
        if ($request->input('delete')) {
            $user = Auth::user();
            $user->photo = null; 
            $user->save();
    
            return response()->json(['success' => true]);
        }
    
        return response()->json(['success' => false]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
             'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    $user->name = $request->input('first_name') . ' ' . $request->input('last_name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone') ?: $user->phone;
        $user->address = $request->input('address');
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('profile_photos'), $filename);
            
            if ($user->photo && $user->photo !== 'profile_photos/default-avatar.png') {
                unlink(public_path($user->photo));
            }
            $user->photo = 'profile_photos/' . $filename;
        }
        $user->photo = 'profile_photos/' . $filename;
        $user->save();
    
        return redirect()->route('profile.show')->with('success', 'Профіль оновлено!');
    }
    public function showUserBooks()
{
    $user = Auth::user(); 
    $books = $user->books; 
    return view('profile', compact('books'));
}

}