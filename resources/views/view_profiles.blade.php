@extends('templates.template')

@section("title", "Home")

@section('content')

<div class="login-bg">
  <div class="login-content">
    <div class="collection-container">
      <div class="my-5 mx-4">

        <table class="table table-hover">
          <thead class="thead">
            <tr>
              <th scope="col">Profile Id</th>
              <th scope="col">Profile Name</th>
              <th scope="col">Role</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $user)
            <tr>
              <th scope="row">{{$user->id}}</th>
              <td>{{$user->name}}</td>
              <td>{{$user->role->name}}</td>
              <form action="/admin/delete_user/{{$user->id}}" method="post" class="form-control">
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



@endsection