<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Language;

class LanguageController extends Controller
{
    //Get all languages
    public function index()
    {
        //Get all books
        $languages = Language::all();

        return response()->json($languages);
    }
}
