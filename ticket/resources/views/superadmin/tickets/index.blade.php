@extends('superadmin.layout.app')
@section('content')
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:p-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="p-6 bg-white border-b border-gray-200">
    <div class="flex justify-content-end">
        <a class="btn btn-primary" href="{{route('superadmin.tickets.create')}}">Ticket Oluştur</a><br>
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
    <h1>Talepler</h1><br>
    <div class="col-12">
        <table id="blogstable" class="table table-hover">
            <thead>
            <tr>

                <td>#</td>
                <td>Ad</td>
                <td>Departman</td>
                <td>seviye</td>
                <td>Konu</td>
                <td>Mesaj</td>
                <td>Geçen Süre</td>

            </tr>


            @if($tickets->count() > 0)
                @foreach($tickets as $ticket)

                    <tr>
                        <td>--</td>
                        @foreach($users as $user)
                            @if($user->id == $ticket->user_id)
                                <td>{{$user->name}}</td>
                            @endif
                        @endforeach


                        @foreach($departments as $department)
                            @if($department->id == $ticket->department_id)
                                <td>{{$department->name}}</td>
                            @endif
                        @endforeach
                        <td>
                            <form action="{{route('superadmin.tickets.update',$ticket)}}" method="post" onsubmit="return confirm('Emin misiniz?')">
                                @csrf
                                @method('PUT')
                                <select class="form-select" name="level_id" aria-label="Default select example">
                                    @foreach($levels as $level)
                                        @if($level->id == $ticket->level_id)
                                            <option selected>{{$level->name}}</option>
                                        @endif
                                    @endforeach

                                    @foreach($levels as $level)
                                        <option value="{{$level->id}}">{{$level->name}}</option>
                                    @endforeach
                                </select>
                                <button class="btn btn-info mx-1">Güncelle</button>
                            </form>

                        </td>
                        <td>{{Str::limit($ticket->subject,10)}}</td>
                        <td>{{Str::limit($ticket->message,7)}}</td>
                        <td>
                            {{$ticket->updated_at->diffForHumans()}}
                        </td>
                        <td>
                            <div class="flex justify-content-end">
                                <a class="btn btn-success mx-1" href="{{route('superadmin.tickets.show',$ticket->id)}}">Detay</a>
                                <form action="{{route('superadmin.tickets.destroy',$ticket)}}" method="post" onsubmit="return confirm('Emin misiniz?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger mx-1">Sil</button>
                                </form>
                            </div>

                        </td>

                    </tr>
                @endforeach
            </thead>
        </table>
    </div>
    @else
        <div class="alert alert-danger">
            Henüz Kaydetmediniz.
        </div>
    @endif
                    </div>
            </div>
            </div>
        </div>
@endsection

