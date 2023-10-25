@extends('superadmin.layout.app')
@section('content')
    <div class="bg-white p-3 rounded-3 ">
        <h2 class="pt-3 " style="word-break: break-all">{{$ticket->subject}}</h2>
        <hr>
        <h4>
            @foreach($users as $user)
                @if($user->id == $ticket->user_id)
                    <td><span style="color: #0f6674"> Kullanıcı Adı: </span>{{$user->name}}</td>
                @endif
            @endforeach
        </h4>
        <h4>
            @foreach($departments as $department)
                @if($department->id == $ticket->department_id)
                    <td><span style="color: #0f6674"> Departman Adı: </span>{{$department->name}}</td>
                @endif
            @endforeach
        </h4>

        <h4>
            @foreach($levels as $level)
                @if($level->id == $ticket->level_id)
                    <td><span style="color: #0f6674"> Öncelik Seviyesi: </span>{{$level->name}}</td>
                @endif
            @endforeach
        </h4>
        <p class="pt-3 " style="word-break: break-all"><span style="color: #0f6674"> Kullanıcı Mesajı: {{$ticket->message}}</p>
        <span class="block fs-6 text-muted mt-3 opacity-75 ">{{$ticket->updated_at->diffForHumans()}}</span>
        <div class="d-flex justify-content-end">
            <a class="btn btn-info mb-3 " href="{{route('superadmin.tickets.index')}}">Talepler</a>
            &ensp;
        </div>
    </div>
@endsection
