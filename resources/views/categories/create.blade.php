@extends('layout')
@section('title')
    Add Category
@endsection
@section('content')
    @include('inc.errors')
    <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data" class="shadow p-4 rounded mt-5"
        style="width: 90%; max-width: 50rem;">
        @csrf
        <h1 class="text-center pb-5 display-4 fs-3">
            Add New Category
        </h1>
        <div class="mb-3">
            <label class="form-label">
                Category name
            </label>
            <input type="text" class="form-control" name="name">
        </div>
        <button type="submit" class="btn btn-primary">
            Add Category</button>
    </form>
    </div>
@endsection
