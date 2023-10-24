@extends('superadmin.layout.app')
@section('content')
    <h1>Kullanıcı Ekle</h1>
    <div class="card-body bg-light border-bottom">
        <form action="{{route('superadmin.users.update',$user)}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group ">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}">

            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="password" name="password" value="{{$user->password}}">
            </div>

            <button type="submit" class="btn btn-primary">Güncelle</button>
        </form>
    </div>

@endsection
