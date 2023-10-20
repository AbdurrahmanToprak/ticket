@extends('superadmin.layout.app')
@section('content')

    <a class="btn btn-primary" href="{{route('user_create')}}">Kullanıcı Oluştur</a><br><br>
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('success')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if(session('delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{session('delete')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif
    <h1>Kayıtlı Kullanıcılar</h1><br>
    <div class="col-12">
        <table id="usertable" class="table table-hover">
            <thead>
            <tr>

                <td>#</td>
                <td>ad</td>
                <td>email</td>
                <td>şifre</td>
                <td>geçen süre</td>

            </tr>

            @foreach($users as $user)

                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->password}}</td>
                    <td>
                        {{$user->updated_at->diffForHumans()}}
                    </td>
                    <td>
                        <a class="btn btn-info" href="{{route('user_edit',$user->id)}}">Güncelle</a>
                        <a class="btn btn-danger" onclick="return confirm('Emin misiniz?')"
                           href="{{route('user_delete',$user->id)}}">Sil</a>
                    </td>

                </tr>
            @endforeach
            </thead>
        </table>
    </div>

@endsection

