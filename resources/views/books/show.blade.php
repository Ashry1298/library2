@extends('layout')
@section('title')
    {{ $book->title }}
@endsection
@section('content')
    @include('inc.errors')
    <h1>{{ $book->title }}</h1>
    <h2>Book ID : {{ $book->id }}</h2>
    <div>
        <h2> Book Description </h2>
        <p>{{ $book->desc }}</p>
    </div>
    <div>
        <h2> Book Image </h2>
        <img src="" width="100px">
    </div>
    <div>
        <div>
            <h2> Book category :</h2>
        </div>



        <a href="{{ route('book.index') }}">
            <button type="button" class="btn btn-info active">Back</button>
        </a>
    @endsection
