@extends('superadmin.layout.app')
@section('content')
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:p-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-content-end">
                        <a class="btn btn-primary" href="{{route('role_index')}}">Rolleri Göster</a><br>
                    </div>
                    <form action="{{route('role_update')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$role->id}}">
                        <div class="mb-3">
                            <label class="form-label">Rol Adı</label>
                            <div class="mt-1">
                                <input type="text" class="form-control" id="name" name="name" value="{{$role->name}}">
                            </div>
                            @error('name') <span class="text-red-500 text-sm">{{$message}}</span> @enderror
                        </div>

                        <div class="sm:col-span-6 pt5">
                            <button type="submit" class="btn btn-primary">Güncelle</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>


@endsection
