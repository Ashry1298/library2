@extends("layout")
@section('title')
register
@endsection
@section('content')
@include("inc/errors")
<form action="{{route('auth.handleRegister')}}" method="post"  class="shadow p-4 rounded mt-5" style="width: 90%; max-width: 50rem;">
	@csrf
	<h1 class="text-center pb-5 display-4 fs-3">
		register
	</h1>
	<div class="mb-3">
		<label class="form-label">
			Name
		</label>
		<input type="text" class="form-control"value="{{old('name')}}" name="name">
	</div>
	<div class="mb-3">
		<label class="form-label">
			Email
		</label>
		<input type="email" class="form-control" value="{{old('email')}}"  name="email">
	</div>
	<div class="mb-3">
		<label class="form-label">
			password
		</label>
		<input type="password" class="form-control"  name="password">
	</div>

	<button type="submit" class="btn btn-primary">
		submit</button>
</form>
</div>



@endsection

