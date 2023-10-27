@extends('front.layout.app')
@section('content')
    <div class="py-6">
        <div class="mx-auto sm:p-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="p-6 bg-white border-b border-gray-200">
    <div class="flex justify-content-end">
        <a class="btn btn-primary" href="{{route('tickets.create')}}">Ticket Oluştur</a><br>
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
                <td>Ad</td>
                <td>Departman</td>
                <td>Konu</td>
                <td>Mesaj</td>
                <td>Geçen Süre</td>

            </tr>


    @if($tickets->count() > 0)
        @foreach($tickets as $ticket)

            <tr>
                <td>--</td>
                <td>{{Auth::user()->name}}</td>
                @foreach($departments as $department)
                    @if($department->id == $ticket->department_id)
                        <td>{{$department->name}}</td>
                    @endif
                @endforeach
                <td>{{$ticket->subject}}</td>
                <td>{{Str::limit($ticket->message,7)}}</td>
                <td>
                    {{$ticket->updated_at->diffForHumans()}}
                </td>
                <td>
                    <div class="flex space-x-8">
                        <a href="{{route('tickets.show',$ticket->id)}}" class="btn btn-success">Detay</a>
                        <form action="{{route('tickets.destroy',$ticket->id)}}" method="post" onsubmit="return confirm('Emin misiniz?')">
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
                    <div class="d-flex justify-content-center">
                        {{$tickets->links()}}
                    </div>
                    </div>
            </div>
        </div>
    </div>
@endsection

