@extends('layout')
@section('title')
    Add Book
@endsection
@section('content')
    @include('inc.errors')
    <form action="{{ route('book.store') }}" method="post" enctype="multipart/form-data" class="shadow p-4 rounded mt-5"
        style="width: 90%; max-width: 50rem;">
        @csrf
        <h1 class="text-center pb-5 display-4 fs-3">
           @lang('site.addnewBook')
        </h1>
        <div class="mb-3">
            <label class="form-label">
                @lang('site.BookTitle')
            </label>
            <input type="text" class="form-control" name="title">
        </div>

        <div class="form-group">
            <label> @lang('site.Bookdesc')</label>
            <textarea class="form-control" name="desc" rows="3"></textarea>
        </div>
        {{-- Select Categories :
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name='category_ids[]' value="" id="defaultCheck1">
            <label class="" for="defaultCheck1">

            </label>
        </div> --}}
        <div class="mb-3">
            <label for="formFile" class="form-label"> @lang('site.Bookimg')</label>
            <input class="form-control" type="file" name="img" id="formFile">
        </div>
        <button type="submit" class="btn btn-primary">
            @lang('site.submit')</button>
    </form>
    </div>
@endsection
