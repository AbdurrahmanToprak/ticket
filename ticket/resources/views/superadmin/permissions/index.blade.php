@extends('superadmin.layout.app')
@section('content')
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:p-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-content-end">
                        <a class="btn btn-primary" href="{{route('permission_create')}}">İzin Oluştur</a><br>
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
                    <h1>İzinler</h1><br>
                    <div class="col-12">
                        <table id="tickettable" class="table table-hover">

                            <thead>
                            <tr>

                                <td><strong>#</strong></td>
                                <td ><strong>ad</strong></td>


                            </tr>
                            </thead>
                            <tbody>
                            @foreach($permissions as $permission)
                                <tr>
                                    <td>{{$permission->id}}</td>
                                    <td>{{$permission->name}}</td>
                                    <td>
                                        <div class="flex justify-content-end">
                                            <a class="btn btn-info mx-1" href="{{route('permission_edit',$permission->id)}}">Güncelle</a>
                                            <a class="btn btn-danger mx-1" onclick="return confirm('Emin misiniz?')"
                                               href="#">Sil</a>
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
