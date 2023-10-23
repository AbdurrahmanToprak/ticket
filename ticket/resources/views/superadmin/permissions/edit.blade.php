@extends('superadmin.layout.app')
@section('content')
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:p-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="p-6 bg-white border-b border-gray-200">
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
                    <div class="flex justify-content-end">
                        <a class="btn btn-primary" href="{{route('superadmin.permissions.index')}}">İzinleri Göster</a><br>
                    </div>
                    <div class="max-w-xl mt-3 p-2 bg-gray-100">
                        <form action="{{route('superadmin.permissions.update',$permission)}}" method="post">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{$permission->id}}">
                            <div class="mb-3">
                                <label class="form-label">İzin Adı</label>
                                <div class="mt-1">
                                    <input type="text" class="form-control" id="name" name="name" value="{{$permission->name}}">
                                </div>
                                @error('name') <span class="text-red-500 text-sm">{{$message}}</span> @enderror
                            </div>

                            <div class="sm:col-span-6 pt-3">
                                <button type="submit" class="btn btn-primary">Güncelle</button>
                            </div>

                        </form>
                    </div>
                    <div class="flex flex-col ">
                        <div class="max-w-xl mt-6 p-2 bg-gray-100">
                            <h2 class="text-2xl font-semibold">Roller</h2>
                            <div class="flex space-x-8 mt-4 ">
                                @if($permission->roles)
                                    @foreach($permission->roles as $permission_role)
                                        <form action="{{route('superadmin.permissions.roles.remove',[$permission->id,$permission_role->id])}}" method="post" onsubmit="return confirm('Emin misiniz?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger px-3 py-1">{{$permission_role->name}}</button>
                                        </form>
                                    @endforeach
                                @endif
                            </div>
                            <form action="{{route('superadmin.permissions.roles',$permission->id)}}" method="post">
                                @csrf
                                <div class="my-3">
                                    <label for="role" class="form-label">Roller</label>
                                    <select name="role" class="form-control" id="role">
                                        @foreach($roles as $role)
                                            <option value="{{$role->name}}">{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="sm:col-span-6 pt-3">
                                    <button type="submit" class="btn btn-primary">Rolü Ata</button>
                                </div>

                            </form>
                        </div>


                    </div>
                </div>

            </div>
        </div>

@endsection
