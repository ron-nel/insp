<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

	<link href="https://fonts.googleapis.com/css?family=Lalezar|Monoton|Passion+One|Squada+One&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Carter+One|Playball&display=swap" rel="stylesheet">

	<title>@yield('title')</title>

	<link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
	<div class="">
		<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
			<a class="navbar-brand px-3 text-white logo rounded" href="#">Insp.</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item active">
						<a class="nav-link" href="/home">Home<span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/collection">Collection</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/professionals">Professional Help</a>
					</li>
					@auth
					@if(Auth::user()->role_id===3)
					<li class="nav-item">
						<a class="nav-link" href="/admin/add_collection">Add Collection</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/admin/view_profiles">Users</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/admin/view_journals">Journals</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/admin/view_applications">Applications</a>
					</li>
					{{-- @else --}}

					@endif
					@endauth
				</ul>
				<ul class="navbar-nav ml-auto">
					
					@auth
					<li class="nav-item dropdown">
						<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
							@if(Auth::user()->role_id===3)
							{{Auth::user()->name}}
							@else
							{{ Auth::user()->profiles->name}}
							@endif()
							 <span class="caret"></span>
						</a>
						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
							@if(Auth::user()->role_id!==3)
							<a class="dropdown-item" href="/profile">Profile</a>
							@endif
							<a class="dropdown-item" href="{{ route('logout') }}"
							onclick="event.preventDefault();
							document.getElementById('logout-form').submit();">
							{{ __('Logout') }}
						</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
					</div>
				</li>
				@endauth
				</ul>
			</div>
		</nav>
	</div>
	@yield('content')
	<footer class="text-center bg-light footer">
		<p>Copyright 2019</p>
	</footer>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>