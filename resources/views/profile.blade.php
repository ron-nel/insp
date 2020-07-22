@extends('templates.template')

@section("title", "Home")

@section('content')

<div class="collection-container">
    <div class="row">
        <div class="col-lg-8 col-md-10 col-sm-12 offset-md-1 offset-lg-2">
            <div class="container-fluid my-2 bg-light rounded">
                <div class="row">
                    <div class="col-4">
                        <div class="img-container">
                            <img src="{{env('AWS_URL')}}{{$profiles->img_path}}" alt="" class="img-fluid img-profile">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="profile-details">
                            <h1 class="profile-name profile">{{$profiles->name}}</h1>
                            <p>{{$profiles->description}}</p>
                            @auth
                            @if(Auth::user()->role_id===2)
                            <p>{{$profiles->professional_id}}</p>
                            <p>{{$profiles->professional_title}}</p>
                            <p>{{$profiles->tel_number}}</p>
                            <p>{{$profiles->location}}</p>
                            @endif
                            @endauth
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="actions">
                            <div class="row ">
                                <div class="col-12 my-2 d-flex justify-content-center">
                                    <a href="/needVisit" class="btn btn-insp">Need Visit?</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 my-2 d-flex justify-content-center">
                                    <a href="/viewJournal" class="btn btn-insp">My Journals</a> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 my-2 d-flex justify-content-center">
                                    <a href="/create_profile" class="btn btn-insp">Edit Profile</a> 
                                </div>
                            </div>
                            @auth
                            @if($profiles->request===null)
                            <div class="row">
                                <div class="col-12 my-2 d-flex justify-content-center">
                                    <a href="/applyProfessionalForm" class="btn btn-insp">Change Role as Professional</a>
                                </div>
                            </div>
                            @endif
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-10 col-md-10 col-sm-12 offset-lg-1 offset-md-1 my-2">
            <div class="card-columns">
                @foreach($collections as $collection)
                <div class="card m-2 card-container border-0">
                    <img src="{{env('AWS_URL')}}{{$collection->img_path}}" class="card-img-top image" alt="...">
                    <p  class="text-center">{{$collection->description}}</p>
                    <div class="btn-container">
                        <form action="/deleteFromBoard/{{$collection->id}}" method="post" class="">
                            @csrf
                            {{method_field("DELETE")}}
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection