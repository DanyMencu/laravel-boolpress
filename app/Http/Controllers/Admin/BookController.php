<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Shoow all books
        $books = Book::paginate(3);

        return view('admin.books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Add new book
        return view('admin.books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validation
        /*         $request->validate([
            'title' => 'required|unique:books',
            'author' => 'required|max:255',
            'content' => 'required',
        ], [//Custom errors message
            'required' => 'The :attribute is a required field!',
            'max' => 'Max :max characters allowed for the :attribute',
            'unique' => 'Sorry but the :attribute must be unique.',
        ]); */
        $request->validate($this->validation_rules(), $this->validation_messages());

        //Register new book
        $data = $request->all();

        //Create a new book
        $new_book = new Book();

        //Gen unique slug
        $slug = Str::slug($data['title'], '-');
        $count = 1;
        $base_slug = $slug;

        //Unique validation
        while(Book::where('slug', $slug)->first()) {
            $slug = $base_slug . '-' . $count;
            $count++;
        }

        //Create a slug inside DATA array
        $data['slug'] = $slug;

        $new_book->fill($data);
        $new_book->save();

        return redirect()->route('admin.books.show', $new_book->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //Show book details
        $book = Book::where('slug', $slug)->first();
        
        if(! $book) {
            abort(404);
        }

        return view('admin.books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Edit a book
        $book = Book::find($id);

        if (!$book) {
            abort(404);
        }

        return view('admin.books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Update book details
        //Validation
        $request->validate($this->validation_rules(), $this->validation_messages());

        $data = $request->all();

        $book = Book::find($id);

        //Slug update if title is changed
        if($data['title'] != $book->title) {
            //Gen unique slug
            $slug = Str::slug($data['title'], '-');
            $count = 1;
            $base_slug = $slug;

            //Unique validation
            while (Book::where('slug', $slug)->first()) {
                $slug = $base_slug . '-' . $count;
                $count++;
            }

            //Create a slug inside DATA array
            $data['slug'] = $slug;
        }
        else {
            $data['slug'] = $book->slug;
        };

        $book->update($data);

        return redirect()->route('admin.books.show', $book->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Delete a book record
        $book = Book::find($id);

        $book->delete();

        return redirect()->route('admin.books.index')->with('deleted', $book->title);
        }


    //*Validation RULES
    private function validation_rules() {
        return [
            'title' => 'required|unique:books',
            'author' => 'required|max:255',
            'content' => 'required',
        ];
    }
    private function validation_messages() {
        return [
            'required' => 'The :attribute is a required field!',
            'max' => 'Max :max characters allowed for the :attribute',
            'unique' => 'Sorry but the :attribute must be unique.',
        ];
    }
}
