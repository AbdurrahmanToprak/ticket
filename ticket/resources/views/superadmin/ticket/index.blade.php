@extends('superadmin.layout.app')
@section('content')

    <a class="btn btn-primary" href="{{route('ticket_create')}}">Ticket Oluştur</a><br><br>
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
                <td>ad</td>
                <td>konu</td>
                <td>mesaj</td>
                <td>geçen süre</td>

            </tr>

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
                        <a class="btn btn-danger" onclick="return confirm('Emin misiniz?')"
                           href="{{route('ticket_delete',$ticket->uuid)}}">Sil</a>
                    </td>

                </tr>
            @endforeach
            </thead>
        </table>
    </div>

    @if($tickets->count() > 0)
        @foreach($tickets as $ticket)
            <div class="bg-white border-bottom shadow-sm ~bg-body rounded-3 mb-3 p-3">

                <h2 class="font-bold text-2xl" style="color:#1f2937">{{$ticket->department}}</h2>
                <p class="mt-3">{{Str::limit($ticket->level,100)}}</p>
                <span class="block fs-6 text-muted mt-3 mb-3 opacity-75">{{$ticket->updated_at->diffForHumans()}}</span>
                <div class="d-flex justify-content-end">
                    <a class="btn btn-success" href="{{route('ticket_show',$ticket->uuid)}}">Detayları Görüntüle</a>
                </div>


            </div>
        @endforeach
        <!--   <div class="d-flex justify-content-center">
            $tickets->links()}}
        </div>
-->
    @else
        <div class="alert alert-danger">
            Henüz Kaydedilmedi.
        </div>
    @endif

@endsection

