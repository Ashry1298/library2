@extends('layout')
@section('title')
    Add Author
@endsection
@section('content')
    @include('inc.errors')
    <form action="{{ route('writer.store') }}" method="post" enctype="multipart/form-data" class="shadow p-4 rounded mt-5"
        style="width: 90%; max-width: 50rem;">
        @csrf
        <h1 class="text-center pb-5 display-4 fs-3">
            Add New Author
        </h1>
        <div class="mb-3">
            <label class="form-label">
                Author Name
            </label>
            <input type="text" class="form-control" name="name">
        </div>
        <button type="submit" class="btn btn-primary">
            Add Author</button>
    </form>
    </div>
@endsection
