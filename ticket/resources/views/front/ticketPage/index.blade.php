@extends('front.layout.app')
@section('content')

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
    <h1>Taleplerim</h1><br>
    <div class="col-12">
        <table id="blogstable" class="table table-hover">
            <thead>
            <tr>

                <td>#</td>
                <td>ad</td>
                <td>konu</td>
                <td>mesaj</td>
                <td>geçen süre</td>

            </tr>


    @if($tickets->count() > 0)
        @foreach($tickets as $ticket)

            <tr>
                <td>{{$ticket->id}}</td>
                <td>{{Auth::user()->name}}</td>
                <td>{{$ticket->subject}}</td>
                <td>{{Str::limit($ticket->message,7)}}</td>
                <td>
                    {{$ticket->updated_at->diffForHumans()}}
                </td>
                <td>
                    <a href="{{route('ticket_show',$ticket->uuid)}}" class="btn btn-success">Detay</a>
                    <a class="btn btn-info" href="{{route('ticket_edit',$ticket->uuid)}}">Güncelle</a>
                    <a class="btn btn-danger" onclick="return confirm('Emin misiniz?')" href="{{route('ticket_delete',$ticket->uuid)}}">Sil</a>
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

@endsection

