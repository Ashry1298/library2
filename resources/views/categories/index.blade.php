@extends('layout')


@section('title')
    Book Store
@endsection
@section('content')
@include('inc.errors')
@auth
<a href="{{route('category.create')}}">
    <button type="button" class="btn btn-outline-primary active">Create</button>
</a>
@endauth
@if(!empty($categories))
    @foreach ($categories as $category)
        <h2> {{ $category->name }} </h2>
        @auth
            <a href="{{route('category.show',$category->id)}}">
                <button type="button" class="btn btn-outline-primary active">Show</button>
            </a>
            <a href="{{route('category.edit',$category->id)}}">
                <button type="button" class="btn btn-outline-primary active">Edit</button>
            </a>
            <a href="{{route('category.destroy',$category->id)}}">
                <button type="button" class="btn btn-outline-danger active">Delete</button>
            </a>
            @endauth

        <hr>
    @endforeach
    @else
    {{"Sorry There are no Categories here"}}
@endif

@endsection
