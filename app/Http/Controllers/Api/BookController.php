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
        $books = Book::all();

        return response()->json($books);
    }
}
