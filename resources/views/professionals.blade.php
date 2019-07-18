@extends('templates.template')

@section("title", "Home")

@section('content')

<div class="login-bg">
    <div class="login-content">
        <div class="collection-container">
    <div class="row">
        <div class="col-12">
            <div class="card-columns">
                @foreach($professionals as $professional)
                <div class="card card-container">
                    <img src="{{$professional->img_path}}" class="card-img-top card-img" alt="...">
                    <div class="details text-center ">
                        <p>{{$professional->name}}</p>
                        <p>{{$professional->professional_title}}</p>
                        <p>{{$professional->description}}</p>
                        <p>{{$professional->tel_number}}</p>
                        <p>{{$professional->location}}</p>
                    </div>
                    @auth
                    @if(Auth::user()->role_id===3)
                    <div class="btn-container">
                        <form action="/admin/delete_application/{{$professional->id}}" method="post" class="">
                            @csrf
                            {{method_field("PATCH")}}
                            <button class="btn btn-danger delete" type="submit">Delete</button>
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
</div>
</div>
</div>
@endsection