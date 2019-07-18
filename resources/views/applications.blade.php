@extends('templates.template')

@section("title", "Applications")

@section('content')
<div class="login-bg">
	<div class="login-content">
		<div class="collection-container">
			 <div class="my-5 mx-4">
<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-12">
        <table class="table table-hover">
			<thead class="thead">
				<tr>
					<th scope="col">Id</th>
					<th scope="col">Name</th>
					<th scope="col">Professional ID</th>
					<th scope="col">Proffesional Title</th>
					<th scope="col">Telephone Number</th>
					<th scope="col">Clinic Location</th>
				</tr>
			</thead>
			<tbody>
				@foreach($profiles as $profile)
				<tr>
					<th scope="row">{{$profile->id}}</th>
					<td scope="row">{{$profile->name}}</td>
					<td scope="row">{{$profile->professional_id}}</td>
					<td scope="row">{{$profile->professional_title}}</td>
					<td scope="row">{{$profile->tel_number}}</td>
					<td scope="row">{{$profile->location}}</td>
						<form action="/admin/delete_application/{{$profile->id}}" method="post" class="form-control">
						@csrf
						{{method_field("PATCH")}}
					<td>
						<button type="submit" class="btn btn-sm btn-danger">Delete</button>
					</td>
						</form>
						<form action="/admin/approve_application/{{$profile->id}}" method="post" class="form-control">
						@csrf
						{{method_field("PATCH")}}
					<td>
						<button type="submit" class="btn btn-sm btn-success">Approve</button>
					</td>
						</form>
				</tr>
				@endforeach
			</tbody>
		</table>
    </div>
    </div>
    </div>
    </div>
</div>
@endsection