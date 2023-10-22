@extends('superadmin.layout.app')
@section('content')
    <div class="py-6">
        <div class="mx-auto sm:p-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="p-6 bg-white border-b border-gray-200">
    <div class="flex justify-content-end">
        <a class="btn btn-primary" href="{{route('ticket_create')}}">Kullanıcı Oluştur</a><br>
    </div>
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

                <td><strong>#</strong></td>
                <td><strong>ad</strong></td>
                <td><strong>email</strong></td>
                <td><strong>şifre</strong></td>
                <td><strong>geçen süre</strong></td>

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
                        <div class="flex justify-content-end">
                            <a class="btn btn-info mx-1" href="#">Güncelle</a>
                            <a class="btn btn-danger mx-1" onclick="return confirm('Emin misiniz?')"
                               href="#">Sil</a>
                        </div>
                    </td>

                </tr>
            @endforeach
            </thead>
        </table>
    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

