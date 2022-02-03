@extends('layouts.app')

@section('content')
<section class="py-3">
    <div class="container">
        <h1 class="text-center">{{ $genre->name }}</h1>

        <div class="d-flex justify-content-around flex-wrap">
            @foreach ($genre->books as $book)
                <article class="my-4">
                    <h3>{{ $book->title}}</h3>
                    <a href="{{ route('admin.books.show', $book->slug) }}" class="btn btn-primary"> Show</a>
                    <a href="{{ route('admin.books.edit', $book->id) }}" class="btn btn-success"> Edit</a>
                </article>
            @endforeach
        </div>

    </div>
</section>
@endsection