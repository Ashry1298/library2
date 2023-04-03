@extends("layout")
@section("title")
Edit Book : {{$book->title}}
@endsection
@section("content")
@include('inc.errors')
<form action="{{route('book.update',$book->id)}}" method="post" enctype="multipart/form-data" class="shadow p-4 rounded mt-5" style="width: 90%; max-width: 50rem;">
	@csrf
	<h1 class="text-center pb-5 display-4 fs-3">
		Edit Book
	</h1>
  <div class="form-group ">
    <label> Book Title :</label>
    <input type="text" class="form-control" value="{{old('title')??$book->title}}" placeholder="" name="title">
  </div>
  <div class="form-group">
    <label >Book Description :</label>
    <textarea class="form-control" name="desc" rows="3">{{old('desc')??$book->desc}}</textarea>
  </div>
	<button type="submit" class="btn btn-primary">
  Update Book</button>
</form>
</div>




@endsection