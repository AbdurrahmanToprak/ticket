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

                <td>#</td>
                <td>kullanıcı id</td>
                <td>ad</td>
                <td>konu</td>
                <td>mesaj</td>
                <td>geçen süre</td>

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
                    <a href="{{route('ticket_show',$ticket->uuid)}}" class="btn btn-success">Detay</a>
                    <a class="btn btn-info" href="{{route('ticket_edit',$ticket->uuid)}}">Güncelle</a>
                    <a class="btn btn-danger" onclick="return confirm('Emin misiniz?')"
                       href="{{route('ticket_delete',$ticket->uuid)}}">Sil</a>
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

