@extends('templates.template')

@section("title", "Create Profile")

@section('content')

<div class="login-bg">
	<div class="login-content">
		<div class="collection-container">
			<div class="row">
				<div class="col-6 p-5">
					<h3>You are insteresting.</h3>
					<br>
					<p>Let us know who you are. Maybe you can describe yourself.</p>
				</div>
				<div class="col-6">
					<form action="/add_new_profile/{{Auth::user()->id}}" method="post" enctype="multipart/form-data" class="form-control border">
						@csrf
						{{method_field("PATCH")}}
						<input type="text" name="name" id="name" value="{{$new_profile->name}}" class="form-control my-3">
						<input type="file" name="image" id="image" class="form-control my-3">
						<textarea name="description" id="description" cols="30" rows="10" class="form-control my-3" value="{{$new_profile->description}}" placeholder="Describe yourself here."></textarea>
						@if($new_profile->request==="professional")
						<input type="text" name="professional_title" id="professional_title" placeholder="Please enter your Title here" class="form-control my-3" value="{{$new_profile->professional_title}}">
						<input type="text" name="tel_number" id="tel_number" placeholder="Please enter your telephone number here" class="form-control my-3" value="{{$new_profile->tel_number}}">
						<input type="text" name="location" id="location" placeholder="Please enter your location here" class="form-control my-3" value="{{$new_profile->location}}">
						@endif
						<button class="btn btn-insp my-1 btn-block" type="submit">Save</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection