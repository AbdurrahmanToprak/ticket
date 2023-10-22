@extends('superadmin.layout.app')
@section('content')
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:p-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-content-end">
                        <a class="btn btn-primary" href="{{route('permission_index')}}">Rolleri Göster</a><br>
                    </div>
                    <form action="{{route('permission_store')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">İzin Adı</label>
                            <div class="mt-1">
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            @error('name') <span class="text-red-500 text-sm">{{$message}}</span> @enderror
                        </div>

                        <div class="sm:col-span-6 pt5">
                            <button type="submit" class="btn btn-primary">Oluştur</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>


@endsection
