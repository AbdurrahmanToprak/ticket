@extends('superadmin.layout.app')
@section('content')
    <h1>Kullanıcı Ekle</h1>
    <div class="card-body bg-light border-bottom">
        <form action="{{route('superadmin.users.store')}}" method="post">
            @csrf

            <div class="form-group ">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"
                       placeholder="Enter email">

            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection
