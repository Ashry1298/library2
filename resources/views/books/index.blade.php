@extends('layout')


@section('title')
    Book Store
@endsection
@section('content')
    @include('inc.errors')
    @auth
    <a href="{{ route('book.create') }}">
        <button type="button" class="btn btn-outline-primary active">Create</button>
    </a>
    @endauth
    
    @if (!empty($books))
        @foreach ($books as $book)
            <h2> {{ $book->title }} </h2>
            @auth
                <a href="{{ route('book.show', $book->id) }}">
                    <button type="button" class="btn btn-outline-primary active">Show</button>
                </a>
                <a href="{{ route('book.edit', $book->id) }}">
                    <button type="button" class="btn btn-outline-primary active">Edit</button>
                </a>
                <a href="{{ route('book.destroy', $book->id) }}">
                    <button type="button" class="btn btn-outline-danger active">Delete</button>
                </a>
            @endauth
            <p>
                {{ $book->desc }}
            </p>
            <hr>
        @endforeach
    @else
        {{ 'Sorry There are no books here' }}
    @endif
@endsection
