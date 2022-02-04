<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Lenguage;
use App\Book;

class LenguageController extends Controller
{
    //Lenguage list
    public function index() {
        $lenguages = Lenguage::all();
        $books = Book::all();

        return view('admin.lenguages.index', compact('lenguages', 'books'));
    }
}
