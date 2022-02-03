@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-5">Add a new book</h1>

        {{-- In case of error --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ( $errors->all() as $error )
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.books.store') }}" method="POST">
        @csrf

            {{-- Title --}}
            <div class="mb-3">
                <label for="title" class="form-label">Title *</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">

                {{-- Title error advertising --}}
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- Author --}}
            <div class="mb-3">
                <label for="author" class="form-label">Author *</label>
                <input type="text" name="author" id="author" class="form-control" value="{{ old('author') }}">

                {{-- Author error advertising --}}
                @error('author')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- Genre --}}
            <div class="mb-3">
                <label for="genre_id" class="form-label">Category</label>
                <select name="genre_id" id="genre_id" class="form-control">
                    <option value="">No genre</option>
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}"
                            @if ($genre->id == old('genre_id')) selected @endif>
                            {{ $genre->name }}
                        </option>
                    @endforeach
                </select>

                {{-- Genre error advertising --}}
                @error('genre')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- Content --}}
            <div class="mb-3">
                <label for="content">Content *</label>
                <textarea name="content" id="content" class="form-control" rows="10">{{ old('content') }}</textarea>

                {{-- Content error advertising --}}
                @error('content')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-success" type="submit">Add new book</button>
        </form>
    </div>
@endsection