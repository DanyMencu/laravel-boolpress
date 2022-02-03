<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Genre;

class GenreController extends Controller
{
    public function show($id) {
        $genre = Genre::find($id);

        dump($genre->books);

        return view('admin.genres.show', compact('genre'));
    }
}
