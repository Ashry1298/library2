@extends('layout')
@section('title')
    {{ $category->name }}
@endsection
@section('content')
    @include('inc.errors')
    <h1>{{ $category->name }}</h1>
 



    <a href="{{ route('book.index') }}">
        <button type="button" class="btn btn-info active">Back</button>
    </a>
@endsection
