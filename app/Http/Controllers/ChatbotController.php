<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book;

class ChatbotController extends Controller
{
   
    public function index() {
        return view('chatbot');
    }

    public function query(Request $request) {
        $message = strtolower($request->input('message'));

        if (str_contains($message, 'how many authors')) {
            return response()->json(['reply' => 'There are ' . Author::count() . ' authors.']);
        }

        if (str_contains($message, 'how many books')) {
            return response()->json(['reply' => 'There are ' . Book::count() . ' books.']);
        }

        if (str_contains($message, 'top 5 authors')) {
            $authors = Author::withCount('books')->orderBy('books_count', 'desc')->take(5)->get();
            $list = $authors->pluck('name')->join(', ');
            return response()->json(['reply' => 'Top 5 authors are: ' . $list]);
        }

        return response()->json(['reply' => "Sorry, I didn’t understand that."]);
    }

}
