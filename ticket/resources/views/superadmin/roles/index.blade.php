@extends('superadmin.layout.app')
@section('content')
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:p-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-content-end">
                        <a class="btn btn-primary" href="{{route('ticket_create')}}">Rol Oluştur</a><br>
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
                    <h1>Roller</h1><br>
                    <div class="col-12">
                        <table id="tickettable" class="table table-hover">
                            <thead>
                            <tr>

                                <td>#</td>
                                <td>ad</td>
                                <td>-</td>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <td>{{$role->id}}</td>
                                    <td>{{$role->name}}</td>
                                    <td>
                                        <a class="btn btn-info" href="#">Güncelle</a>
                                        <a class="btn btn-danger" onclick="return confirm('Emin misiniz?')"
                                           href="#">Sil</a>
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
