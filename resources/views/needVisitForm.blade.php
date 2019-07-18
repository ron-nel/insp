@extends('templates.template')

@section("title", "Home")

@section('content')
<div class="login-bg">
	<div class="login-content">
		<div class="collection-container">
			<div class="row">
				<div class="col-lg-5 col-md-8 col-sm-10">
					<div class="journal-poem">
						<h3>Know if you really need to see a physician now.</h3>
						<br>
						<p>You can tell us how you're feeling now. Let our professional help evaluate if you need to see a physician now.</p>
						<br>
						<p>“I have depression. But I prefer to say “I battle” depression instead of “I suffer” with it. Because depression hits, but I hit back. Battle on.”</p>
					</div>
				</div>
				<div class="col-sm-12 col-md-8 col-lg-7">
					<div class="journal-write">
						<form action="/sendJournal/{{Auth::user()->id}}" method="post" class="">
							@csrf
							<textarea name="message" id="message" cols="78" rows="15" class="message rounded" placeholder="How are you feeling lately? Mind sharing your thoughts?"></textarea>
							<button class="btn btn-block btn-insp" type="submit">Send</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection