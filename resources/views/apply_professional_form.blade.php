@extends('templates.template')

@section("title", "Profile-Apply as Professional")

@section('content')

<div class="login-bg">
	<div class="login-content">
		<div class="collection-container">
	<div class="row">
		<div class="col-5 offset-1 my-5 p-5">
			<h3>Help the community.</h3>
			<br>
			<p>Apply as a professional and be advertised in this community.</p>
		</div>
		<div class="col-5">
			<form action="/applyProffesionalAcct/{{Auth::user()->id}}" method="post" class="form-control border my-5">
				@csrf
				{{method_field("PATCH")}}
				<input type="text" name="professional_id" id="professional_id" placeholder="Please enter your Physician's ID here" class="form-control my-3">
				<input type="text" name="professional_title" id="professional_title" placeholder="Please enter your Title here" class="form-control my-3">
				<input type="text" name="tel_number" id="tel_number" placeholder="Please enter your telephone number here" class="form-control my-3">
				<input type="text" name="location" id="location" placeholder="Please enter your location here" class="form-control my-3">
				<button type="submit" class="btn btn-insp btn-block my-3">Submit</button>
			</form>
		</div>
	</div>
	</div>
	</div>
	</div>
</div>


@endsection