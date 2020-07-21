@extends('templates.template')

@section("title", "Add to Collection")

@section('content')
<div class="login-bg">
	<div class="login-content">
		<div class="collection-container">
			<div class="row">
				<div class="col-6 p-3">
					<h3 class="text-center">Add a new pin</h3>
					<form action="/admin/add_collection" method="post" enctype="multipart/form-data" class="form-control bg-transparent">
						@csrf
						<input type="text" name="name" id="name" placeholder="name" class="form-control my-3">
						<input type="text" name="description" id="description" placeholder="description" class="form-control my-3">
						<input type="file" name="image" id="image" class="form-control my-3">
						<select name="category_id" id="category_id" class="form-control my-3">
							@foreach(\App\Category::all() as $indiv_category)
							<option value="{{$indiv_category->id}}">
								{{$indiv_category->name}}
							</option>
							@endforeach
						</select>
						<button class="btn btn-insp btn-block my-3" type="submit">Add to Collection</button>
					</form>
				</div>
				<div class="col-6 p-3 home-collection">
					<div class="card-columns overflow-auto">
						@foreach($collections as $collection)
						<div class="card card-container my-2 border-0">
							<img src="{{env(AWS_URL)}}{{asset($collection->img_path)}}" class="card-img-top image" alt="...">
							<p class="text-center">{{$collection->description}}</p>
							<div class="cardBtn btn-container">
								<a href="/admin/collection_edit/{{$collection->id}}" class="btn btn-insp btn-sm edit">Update</a>
								<form action="/admin/collection_delete/{{$collection->id}}" method="post" class="">
									@csrf
									{{method_field("DELETE")}}
									<button class="btn btn-danger btn-sm delete" type="submit">Remove</button>
								</form>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection