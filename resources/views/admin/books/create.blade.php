@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-5">Add a new book</h1>

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

        <form action="{{ route('admin.books.store') }}" method="POST">
        @csrf

        {{-- Title --}}
            <div class="mb-3">
                <label for="title" class="form-label">Title *</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
            </div>
            {{-- Title error advertising --}}
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            {{-- Author --}}
            <div class="mb-3">
                <label for="author" class="form-label">Author *</label>
                <input type="text" name="author" id="author" class="form-control" value="{{ old('author') }}">
            </div>
            {{-- Author error advertising --}}
            @error('author')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            {{-- Content --}}
            <div class="mb-3">
                <label for="content">Content *</label>
                <textarea name="content" id="content" class="form-control" rows="10">
                    {{ old('content') }}
                </textarea>
                {{-- Content error advertising --}}
                @error('content')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn-success" type="submit">Add new book</button>
        </form>
    </div>
@endsection