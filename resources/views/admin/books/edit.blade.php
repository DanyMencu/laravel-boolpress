@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-5">Edit {{ $book->title }} book</h1>

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

        <form action="{{ route('admin.books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

            {{-- Title --}}
            <div class="mb-3">
                <label for="title" class="form-label">Title *</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $book->title) }}">
                
                {{-- Title error advertising --}}
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- Author --}}
            <div class="mb-3">
                <label for="author" class="form-label">Author *</label>
                <input type="text" name="author" id="author" class="form-control" value="{{ old('author', $book->author) }}">

                {{-- Author error advertising --}}
                @error('author')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- Genre --}}
            <div class="mb-3">
                <label for="genre_id" class="form-label">Genre</label>
                <select name="genre_id" id="genre_id" class="form-control">
                    <option value="">No genre</option>
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}"
                            @if ($genre->id == old('genre_id', $book->genre_id)) selected @endif>
                            {{ $genre->name }}
                        </option>
                    @endforeach
                </select>

                {{-- Genre error advertising --}}
                @error('genre_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- Content --}}
            <div class="mb-3">
                <label for="content">Content *</label>
                <textarea name="content" id="content" class="form-control" rows="10">{{ old('content', $book->content) }}</textarea>

                {{-- Content error advertising --}}
                @error('content')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            {{-- Image --}}
            <div class="mb-3">
                <lablel class="form-label" for="image">Image: </lablel>
                @if ($book->image)
                <figure class="mb-3">
                    <img class="img-fluid" src="{{ asset( 'storage/' . $book->image ) }}" alt="{{ $book->title }}">
                </figure>
                @endif
                <input type="file" name="image" id="image" class="form-control">
            
                {{-- Image error advertising --}}
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- Languages --}}
            <div class="mb-3">
                <label class="form-label">Languages:</label>
                @foreach ($languages as $language)
                    <input type="checkbox" class="ms-3" name="languages[]" id="language{{ $loop->iteration}}" value="{{ $language->id}}"
                    @if ($errors->any() && in_array($language->id, old('languages')))
                        checked
                    @elseif ( !$errors->any() && $book->languages->contains($language->id))
                        checked
                    @endif>
                    <label class="me-3" for="language{{ $loop->iteration}}">
                        {{ $language->name }}
                    </label>
                @endforeach
                
                {{-- languages error advertising --}}
                @error('languages')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-success" type="submit">Update book</button>
        </form>
    </div>
@endsection