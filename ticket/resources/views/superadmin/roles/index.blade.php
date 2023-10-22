@extends('superadmin.layout.app')
@section('content')
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:p-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mx-auto">
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
                    </div>
                    <div class="flex justify-content-end">
                        <a class="btn btn-primary" href="{{route('superadmin.roles.create')}}">Rol Oluştur</a><br>
                    </div>

                    <h1>Roller</h1><br>
                    <div class="col-12">
                        <table id="tickettable" class="table table-hover">
                            <thead>
                            <tr>

                                <td><strong>#</strong></td>
                                <td><strong>ad</strong></td>


                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <td>{{$role->id}}</td>
                                    <td>{{$role->name}}</td>
                                    <td>
                                        <div class="flex justify-content-end">
                                            <a class="btn btn-info mx-1" href="{{route('superadmin.roles.edit',$role->id)}}">Güncelle</a>
                                            <form action="{{route('superadmin.roles.destroy',$role->id)}}" method="post" onsubmit="return confirm('Emin misiniz?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger mx-1">Sil</button>
                                            </form>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                </div>

            </div>
        </div>
    </div>


@endsection
