@extends("layout")
@section("title")
@endsection
@section("content")
@include('inc.errors')
<form action="{{route('writer.update',$writer->id)}}" method="post" enctype="multipart/form-data" class="shadow p-4 rounded mt-5" style="width: 90%; max-width: 50rem;">
	@csrf
	<h1 class="text-center pb-5 display-4 fs-3">
		Edit Author
	</h1>
  <div class="form-group ">
    <label> Author Name :</label>
    <input type="text" class="form-control" value="{{old('name')??$writer->name}}" " name="name">
  </div>
	<button type="submit" class="btn btn-primary">
  Update Author</button>
</form>
</div>




@endsection