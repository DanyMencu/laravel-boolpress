@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="text-center">
            <h1>Book Details</h1>
            <h3>{{ $book->title }}</h3>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <strong>Id: </strong> {{ $book->id }}
                </li>
                <li class="list-group-item">
                    <strong>Title: </strong> {{ $book->title }}
                </li>
                <li class="list-group-item">
                    <strong>Genre: </strong> 
                    @if ($book->genre)
                        
                    @else
                        
                    @endif
                </li>
                <li class="list-group-item">
                    <strong>Author: </strong> {{ $book->author }}
                </li>
                <li class="list-group-item">
                    <strong>Content: </strong> {{ $book->content }}
                </li>
                <li class="list-group-item">
                    <strong>Actions: </strong>
                    <a href="{{ route('admin.books.index') }}" class="btn btn-primary mx-2">Return to list</a>
                    <a href="{{ route('admin.books.edit', $book->id) }}" class="btn btn-warning mx-2">Edit book details</a>
                </li>
            </ul>
        </div>
    </div>
@endsection