@extends('templates.template')

@section("title", "View Journals")

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
								<th scope="col">Message</th>
								<th scope="col">Status</th>
								<th scope="col">Recommendation</th>
								<th scope="col">Last Updated</th>
								<th scope="col" colspan="2">Actions</th>
								
							</tr>
						</thead>
						<tbody class="">
							@foreach($journals as $journal)
							<tr>
								<th scope="row">{{$journal->id}}</th>
								<td class="word-break">{{$journal->message}}</td>
								<form action="/admin/edit_journal/{{$journal->id}}" method="post">
									<td>
										<select name="status" id="status" class="form-control">
											@foreach(\App\Status::all() as $status)
											<option value="{{$status->id}}"{{$status->id == $journal->status_id ? "selected" : ""}}>
												{{$status->name}}
											</option>
											@endforeach
										</select>
									</td>
									<td>
										@csrf
										{{method_field("PATCH")}}
										<textarea name="recommendation" id="recommendation" cols="20" rows="2" class="recommendation">{{$journal->recommendation}}</textarea>
									</td>
									<td>{{Carbon\Carbon::parse($journal->updated_at)->diffForHumans()}}</td>
									<td>
										<button class="btn btn-block btn-insp btn-sm" type="submit">Send</button>
									</td>
								</form>
								<form action="/admin/delete_journal/{{$journal->id}}" method="post" class="form-control">
									@csrf
									{{method_field("DELETE")}}
									<td><button type="submit" class="btn btn-sm btn-danger">delete</button></td>
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