@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-5">Edit {{ $book->title }} book</h1>

        {{-- In case of error --}}
        @if ($errors->any()) {
            <div class="alert alert-danger">
                <ul>
                    @foreach ( $errors->all() as $error )
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        }@endif

        <form action="{{ route('admin.books.update', $book->id) }}" method="POST">
        @csrf
        @method('PATCH')

        {{-- Title --}}
            <div class="mb-3">
                <label for="title" class="form-label">Title *</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $book->title) }}">
            </div>
            {{-- Title error advertising --}}
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            {{-- Author --}}
            <div class="mb-3">
                <label for="author" class="form-label">Author *</label>
                <input type="text" name="author" id="author" class="form-control" value="{{ old('author', $book->author) }}">
            </div>
            {{-- Author error advertising --}}
            @error('author')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            {{-- Content --}}
            <div class="mb-3">
                <label for="content">Content *</label>
                <textarea name="content" id="content" class="form-control" rows="10">{{ old('content', $book->content) }}</textarea>
                {{-- Content error advertising --}}
                @error('content')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-success" type="submit">Update book</button>
        </form>
    </div>
@endsection