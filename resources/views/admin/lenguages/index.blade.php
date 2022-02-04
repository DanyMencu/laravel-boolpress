@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center my-3">Lenguages and books available</h1>
        <div class="d-flex justify-content-center">
            @foreach ($lenguages as $lenguage)
                <ul class="list-group text-center mx-1">
                    <li class="list-group-item list-group-item-primary">
                        {{ $lenguage->name }}
                    </li>
    
                    @if ( $lenguage->books->isEmpty() )
                        Sorry, no books available for this lenguage.
                    @else
                        @foreach ($lenguage->books as $book)
                            <li class="list-group-item">
                                <a class="list-group-item-action" href="{{ route('admin.books.show', $book->slug) }}">
                                    {{ $book->title }}
                                </a>
                            </li>
                        @endforeach
                    @endif
                </ul>
            @endforeach

        </div>
    </div>
@endsection