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
                {{-- Title --}}
                <li class="list-group-item">
                    <strong>Title: </strong> {{ $book->title }}
                </li>
                {{-- Genre --}}
                <li class="list-group-item">
                    <strong>Genre: </strong> 
                    @if ($book->genre)
                        <a href="{{ route('admin.genre', $book->genre->id) }}">
                            {{ $book->genre->name }}
                        </a>
                    @else
                        No genre
                    @endif
                </li>
                {{-- Author --}}
                <li class="list-group-item">
                    <strong>Author: </strong> {{ $book->author }}
                </li>
                {{-- Lenguage --}}
                <li class="list-group-item">
                    <strong>Lenguage: </strong> 
                    @if ( $book->lenguages->isEmpty())
                        Sorry no available language has been specified.
                    @else
                        @foreach ($book->lenguages as $lenguage)
                            <span class="badge rounded-pill bg-success ms-1">{{ $lenguage->name }}</span>
                        @endforeach
                    @endif
                </li>
                {{-- Content --}}
                <li class="list-group-item">
                    <strong>Content: </strong> <br> {{ $book->content }}
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