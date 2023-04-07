@extends("layout")
@section('title')
Test
@endsection
@section('content')
@include("inc/errors")
<form action="/testrequest" method="post"  class="shadow p-4 rounded mt-5" style="width: 90%; max-width: 50rem;">
	@csrf
  
	<div class="mb-3">
		<label class="form-label">
		Email
		</label>
		<input type="email" class="form-control" value="{{old('email')}}" name="email">
	</div>
	<div class="mb-3">
		<label class="form-label">
			password
		</label>
		<input type="password" class="form-control"  name="password">
	</div>

	<button type="submit" class="btn btn-primary">
		Submit</button>
</form>
</div>



@endsection
