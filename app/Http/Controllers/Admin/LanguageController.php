<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Language;
use App\Book;

class LanguageController extends Controller
{
    //Language list
    public function index() {
        $languages = Language::all();
        $books = Book::all();

        return view('admin.languages.index', compact('languages', 'books'));
    }
}
