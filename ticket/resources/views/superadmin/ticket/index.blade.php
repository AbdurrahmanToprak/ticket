@extends('superadmin.layout.app')
@section('content')
    <div class="py-6">
        <div class="mx-auto sm:p-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="p-6 bg-white border-b border-gray-200">
    <div class="flex justify-content-end">
        <a class="btn btn-primary" href="{{route('ticket_create')}}">Ticket Oluştur</a><br>
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
        <table id="tickettable" class="table table-hover">
            <thead>
            <tr>

                <td><strong>#</strong></td>
                <td><strong>kullanıcı id</strong></td>
                <td><strong>ad</strong></td>
                <td><strong>konu</strong></td>
                <td><strong>mesaj</strong></td>
                <td><strong>geçen süre</strong></td>

            </tr>


    @if($tickets->count() > 0)
        @foreach($tickets as $ticket)

            <tr>
                <td>{{$ticket->id}}</td>
                <td>{{$ticket->user_id}}</td>
                <td>{{$ticket->id}}</td>
                <td>{{$ticket->subject}}</td>
                <td>{{Str::limit($ticket->message,7)}}</td>
                <td>
                    {{$ticket->updated_at->diffForHumans()}}
                </td>
                <td>
                    <div class="flex justify-content-end">
                        <a href="{{route('ticket_show',$ticket->uuid)}}" class="btn btn-success mx-1">Detay</a>
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


    @else
        <div class="alert alert-danger">
            Henüz Kaydedilmedi.
        </div>
    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

