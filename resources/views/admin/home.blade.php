@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Hey! Welcome back {{ Auth::user()->name }}</h1>
                </div>

                <div class="card-body">
                    <h3>What to do next?</h3>
                    <ul>
                        <li>
                            <a href="{{ route('admin.books.index') }}">Books list</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.books.create') }}">Register new book?</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.lenguages.index') }}">Lenguages</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
