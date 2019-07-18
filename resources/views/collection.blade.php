@extends('templates.template')

@section("title", "Collection")

@section('content')

<div class="collection-container">
    <div class="row">
        <div class="col-12">
            <div class="card-columns">
                @foreach($collections as $indiv_collection)
                <div class="card card-container border-0">
                    <img src="{{$indiv_collection->img_path}}" class="card-img-top card-img image" alt="...">
                    <p class="text-center">{{$indiv_collection->description}}</p>
                    @auth
                    @if(Auth::user()->role_id===3)
                    <div class="btn-container">
                        <a href="/admin/collection_edit/{{$indiv_collection->id}}" class="btn btn-insp edit">Update</a>
                        <form action="/admin/collection_delete/{{$indiv_collection->id}}" method="post" class="">
                            @csrf
                            {{method_field("DELETE")}}
                            <button class="btn btn-danger delete" type="submit">Remove</button>
                        </form>
                    </div>
                    @elseif(Auth::user()->role_id!==3)
                    <div class="btn-container">
                        <form action="/addToBoard/{{$indiv_collection->id}}" method="post" class="">
                            @csrf
                            <button class="btn btn-success" type="submit">Save</button>
                        </form>
                    </div>
                    @endif
                    @endauth
                </div>
                @endforeach
            </div>
        </div>
    </div>   
</div>
@endsection