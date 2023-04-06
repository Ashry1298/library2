@extends("layout")
@section('title')
Login
@endsection
@section('content')
@include("inc/errors")
<form action="{{route('auth.handleLogin')}}" method="post"  class="shadow p-4 rounded mt-5" style="width: 90%; max-width: 50rem;">
	@csrf
    <h1 class="text-center pb-5 display-4 fs-3">
		@lang('site.login')
	</h1>
	<div class="mb-3">
		<label class="form-label">
			@lang('site.email')
		</label>
		<input type="email" class="form-control" value="{{old('email')}}" name="email">
	</div>
	<div class="mb-3">
		<label class="form-label">
			@lang('site.password')
		</label>
		<input type="password" class="form-control"  name="password">
	</div>

	<button type="submit" class="btn btn-primary">
		@lang('site.submit')</button>
</form>
</div>



@endsection

