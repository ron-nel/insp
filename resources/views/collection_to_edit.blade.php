@extends('templates.template')

@section("title", "Edit Collection")

@section('content')
<div class="login-bg">
	<div class="login-content">
		<div class="collection-container">
			<div class="row">
				<div class="col-6">
					<form action="/admin/edit_collection/{{$collectionToEdit->id}}" method="post" enctype="multipart/form-data" class="form-control bg-transparent my-5 ">
						@csrf
						{{method_field("PATCH")}}
						<input type="text" name="name" id="name" value="{{$collectionToEdit->name}}" class="form-control my-3">
						<input type="text" name="description" id="description" value="{{$collectionToEdit->description}}" class="form-control my-3">
						<input type="file" name="image" id="image" class="form-control my-3">
						<select name="category_id" id="category_id" class="form-control my-3">
							@foreach(\App\Category::all() as $indiv_category)
							<option value="{{$indiv_category->id}}"
								{{$indiv_category->id == $collectionToEdit->category_id ? "selected" : ""}}>
								{{$indiv_category->name}}
							</option>
							@endforeach
						</select>
						<button class="btn btn-insp btn-block" type="submit">Save to Collection</button>
					</form>
				</div>
				<div class="col-6 p-3 home-collection">
					<div class="card overflow-auto border-0">
						<div class="card card-container my-4 border-0">
							<img src="{{env('AWS_URL')}}{{asset($collectionToEdit->img_path)}}" class="card-img-top" alt="...">
							<p class="text-center">Name: {{$collectionToEdit->name}}</p>
							<p class="text-center">Description: {{$collectionToEdit->description}}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endsection