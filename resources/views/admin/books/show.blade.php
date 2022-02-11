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
                {{-- Dates --}}
                <li class="list-group-item">
                    @if (  $book->created_at->notEqualTo($book->created_at))
                        <strong>Book register: </strong> {{  $book->created_at->isoFormat('dddd DD/MM/YYYY') }} ( {{ $book->created_at->diffForHumans() }} )
                </li>
                @else
                <strong>Book register: </strong> {{ $book->created_at->format('l d/m/Y') }} 
                <li class="list-group-item">
                    <strong>Updated: </strong> {{ $book->updated_at->diffForHumans() }}
                @endif
                </li>
                {{-- Language --}}
                <li class="list-group-item">
                    <strong>Language: </strong> 
                    @if ( $book->languages->isEmpty())
                        Sorry no available language has been specified.
                    @else
                        @foreach ($book->languages as $language)
                            <span class="badge rounded-pill bg-success ms-1">{{ $language->name }}</span>
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