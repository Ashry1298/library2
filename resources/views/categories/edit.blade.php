@extends("layout")
@section("title")
Edit Category : {{$category->name}}
@endsection
@section("content")
@include('inc.errors')
<form action="{{route('category.update',$category->id)}}" method="post" enctype="multipart/form-data" class="shadow p-4 rounded mt-5" style="width: 90%; max-width: 50rem;">
	@csrf
	<h1 class="text-center pb-5 display-4 fs-3">
		Edit Category
	</h1>
  <div class="form-group ">
    <label> Category Name :</label>
    <input type="text" class="form-control" value="{{old('name')??$category->name}}" placeholder="" name="name">
  </div>

	<button type="submit" class="btn btn-primary">
  Update Category</button>
</form>
</div>




@endsection