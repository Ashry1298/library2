@extends('layout')
@section('title')
    {{$writer->name}}
@endsection
@section('content')
    @include('inc.errors')
    <div>
        <h1>Author Name : {{$writer->name}}</h1>
        <h2>Author Id : {{$writer->id}}</h2>
   
    </div>
    <a href="{{route('writer.index')}}">
        <button type="button" class="btn btn-info active">Back</button>
    </a>
@endsection
