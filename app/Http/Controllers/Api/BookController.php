<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Book;

class BookController extends Controller
{
    //Book archive
    public function index() {
        //Get all books
        $books = Book::paginate(4);

        return response()->json($books);
    }

    //Book details
    public function show($slug) {
        $book = Book::where('slug', $slug)->with(['genre', 'languages'])->first();

        return response()->json($book);
    }
}
