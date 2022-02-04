@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center my-3">Languages and books available</h1>
        <div class="d-flex justify-content-center">
            @foreach ($languages as $language)
                <ul class="list-group text-center mx-1">
                    <li class="list-group-item list-group-item-primary">
                        {{ $language->name }}
                    </li>
    
                    @if ( $language->books->isEmpty() )
                        Sorry, no books available for this language.
                    @else
                        @foreach ($language->books as $book)
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