@extends('templates.template')

@section("title", "Home")

@section('content')

<div class="row container">
	<div class="col-4 offset-1">
		<form action="/admin/add_collection" method="post" enctype="multipart/form-data" class="form-control">
			@csrf
			<input type="text" name="name" id="name" placeholder="name" class="form-control">
			<input type="text" name="description" id="description" placeholder="description" class="form-control">
			<input type="file" name="image" id="image" class="form-control">
			<select name="category_id" id="category_id" class="form-control">
				@foreach(\App\Category::all() as $indiv_category)
				<option value="{{$indiv_category->id}}">
					{{$indiv_category->name}}
				</option>
				@endforeach
			</select>
			<button class="btn btn-primary" type="submit">Add to Collection</button>
		</form>
	</div>
</div>
@endsection