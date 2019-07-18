@extends('templates.template')

@section("title", "Home")

@section('content')

<div class="collection-container">
	<div class="row">
		<div class="col-6 px-5">
			<div class="container-fluid">
				<h3>Your next <span>inspiration</span> is on us!</h3>
				<br>
				<p>Insp. is dedicated to help individuals find their next goal. We have curated a collection of activities, and books to cheer you up. You can also take an assessment to check if you really need a professional help. Have access to our list of trusted professionals.</p>
				{{-- <h3>We are all lost at some point once!</h3> --}}
				@guest
				<a class="btn btn-insp btn-sm" href="{{ route('login') }}">{{ __('Login') }}</a>
				@if (Route::has('register'))
				<a class="btn btn-insp btn-sm" href="{{ route('register') }}">{{ __('Register') }}</a>
				@endif
				@endguest
			</div>
		</div>
		<div class="col-6 home-collection">
			<div class="card-columns overflow-auto p-3">
				@foreach($collections as $indiv_collection)
				<div class="card card-container my-2 border-0">
					<img src="{{$indiv_collection->img_path}}" class="card-img-top card-img image" alt="...">
					<p class="text-center">{{$indiv_collection->description}}</p>
				</div>
				@endforeach
			</div>
		</div>   
	</div>
</div>


@endsection