@extends('layout')
@section('title')
    {{ $category->name }}
@endsection
@section('content')
    @include('inc.errors')
    <h1>{{ $category->name }}</h1>
    <div>
        <h2> Books Under this Category :</h2>
        {{$category->books}}
    </div>



    <a href="{{ route('book.index') }}">
        <button type="button" class="btn btn-info active">Back</button>
    </a>
@endsection
