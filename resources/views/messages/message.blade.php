<!-- error message -->
@if ($errors->any())
   @foreach ($errors->all() as $error)
       <div class="alert alert-danger">{{$error}}</div>
   @endforeach
 @endif

	<!-- success message -->
	@if(session()->has('success'))
	<div class="alert alert-success">
		{{session()->get('success')}}
	</div>
	@endif
	<!-- warning message -->
	@if(session()->has('warning'))
	<div class="alert alert-danger">
		{{session()->get('warning')}}
	</div>
	@endif