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
                        <a class="btn btn-primary" href="{{route('superadmin.users.index')}}">Kullanıcıları Göster</a><br>
                    </div>
                        <div class="flex flex-col p-2 bg-gray-100">
                            <div>{{$user->name}}</div>
                            <div>{{$user->email}}</div>
                        </div>

                        <div class="flex flex-col ">

                            <div class="max-w-xl mt-6 p-2 bg-gray-100">
                                <div class="mt-6 p-2">
                                    <h2 class="text-2xl font-semibold">Roller</h2>
                                    <div class="flex space-x-8 mt-4">
                                        @if($user->roles)
                                            @foreach($user->roles as $user_role)
                                                <form action="{{route('superadmin.users.roles.remove',[$user->id,$user_role->id])}}" method="post" onsubmit="return confirm('Emin misiniz?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger px-3 py-1">{{$user_role->name}}</button>
                                                </form>
                                            @endforeach
                                        @endif
                                    </div>
                                    <form action="{{route('superadmin.users.roles',$user->id)}}" method="post">
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
                    <div class="max-w-xl mt-6 p-2 bg-gray-100">
                        <div class="mt-6 p-2">
                            <h2 class="text-2xl font-semibold">İzinler</h2>
                            <div class="flex space-x-8 mt-4">
                                @if($user->permissions)
                                    @foreach($user->permissions as $user_permission)
                                        <form action="{{route('superadmin.users.permissions.revoke',[$user->id,$user_permission->id])}}" method="post" onsubmit="return confirm('Emin misiniz?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger px-3 py-1">{{$user_permission->name}}</button>
                                        </form>
                                    @endforeach
                                @endif
                            </div>
                            <form action="{{route('superadmin.users.permissions',$user->id)}}" method="post">
                                @csrf
                                <div class="my-3">
                                    <label for="permission" class="form-label">İzinler</label>
                                    <select name="permission" class="form-control" id="permission">
                                        @foreach($permissions as $permission)
                                            <option value="{{$permission->name}}">{{$permission->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="sm:col-span-6 pt-3">
                                    <button type="submit" class="btn btn-primary">İzni Ata</button>
                                </div>

                            </form>
                        </div>


                    </div>

                </div>

            </div>
        </div>
@endsection
