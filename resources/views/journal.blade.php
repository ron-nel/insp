@extends('templates.template')

@section("title", "Home")

@section('content')

<div class="login-bg">
    <div class="login-content">
        <div class="collection-container">
            <div class="row">
                <div class="col-12">
                    {{-- <div class="row"> --}}
                    <div class="card-columns">
                        @foreach($journal as $journals)
                        {{-- <div class="col-sm-4"> --}}	
                            <div class="card">
                                <div class="card-body">
                        {{-- @if($journal!=[]) --}}
                                    <div class="row pb-3">
                                        <div class="col-1 offset-7">
                                            <a href="/editJournalForm/{{$journals->id}}" class="btn btn-insp btn-sm edit">Edit</a>
                                        </div>
                                        <div class="col-1 offset-1">
                                            <form action="/deleteJournal/{{$journals->id}}" method="post" class="">
                                                @csrf
                                                {{method_field("DELETE")}}
                                                <button class="btn btn-danger btn-sm " type="submit">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="journal-container">
                                        <p class="card-title">{{$journals->updated_at}}</p>
                                        <p class="card-text">Message: {{$journals->message}}</p>
                                        <p class="card-text">Status: {{$journals->status->name}}</p>
                                        <p class="card-text">Recommendation: {{$journals->recommendation}}</p>
                                    </div>
                                    
                       {{--      @else
                            <h1>this is testing</h1>
                            @endif --}}
                                </div>
                            </div>
                    {{-- </div> --}}
                            @endforeach
                        </div>
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
