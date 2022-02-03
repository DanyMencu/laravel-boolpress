@extends('layouts.app')

@section('content')
<section class="py-3">
    <div class="container">
        <h1 class="text-center">Books List</h1>

        @if (session('deleted'))
            <div class="alert alert-success border border-success text-center text-decoration-underline fs-6 opacity-an">
                {{ session('deleted') }}
                deleted successfully!
            </div>
        @endif

        @if ($books->isEmpty())
            Sorry, no boos found yet.
            <a href="{{ route('admin.books.create') }}">Create a new one</a>
        @else
            <table class="table table-light table-hover my-4">
                <thead class="table-light">
                    <tr class="fw-bolder">
                        <td scope="col">Id</td>
                        <td scope="col">Title</td>
                        <td scope="col">Genre</td>
                        <td scope="col">Author</td>
                        <td scope="col">Content</td>
                        <td scope="col" colspan="3" class="text-center">Actions</td>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($books as $book)
                        <tr>
                            <td>{{ $book->id }}</td>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->genre->name }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->content }}</td>
                            <td>
                                <a class="btn btn-primary"
                                href="{{ route('admin.books.show', $book->slug) }}">
                                    Details
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-success"
                                href="{{ route('admin.books.edit', $book->id) }}">
                                    Modify
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('admin.books.destroy', $book->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <input type="submit" class="btn btn-danger" value="Delete">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        {{ $books->links() }}
    </div>
</section>
@endsection