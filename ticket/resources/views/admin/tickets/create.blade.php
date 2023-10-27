@extends('admin.layout.app')
@section('content')
    <h1>Destek Talebi</h1>
    <div class="card-body bg-light border-bottom">
        <form action="{{route('admin.tickets.store')}}" method="post">
            @csrf
            <div class="form-group ">
                <label for="department">Departman</label><br>
                <select class="form-select" name="department_id" aria-label="Default select example">
                    <option selected>Departman seçiniz</option>
                    @foreach($departments as $department)
                        <option value="{{$department->id}}">{{$department->name}}</option>
                    @endforeach
                </select>
            </div>
            @role('Admin')
            <div class="form-group ">
                <label for="department">Öncelik Seviyesi</label><br>
                <select class="form-select" name="level_id" aria-label="Default select example">
                    <option selected>Departman seçiniz</option>
                    @foreach($levels as $level)
                        <option value="{{$level->id}}">{{$level->name}}</option>
                    @endforeach
                </select>
            </div>
            @endrole

            <!--
            @role('Admin')
            <div class="form-group ">
                <label for="department">Öncelik Seviyesi</label><br>
                <select class="form-select" name="level_id" aria-label="Default select example">
                    <option selected>Öncelik seviyesi seçiniz</option>

                </select>
            </div>
            @endrole
            -->

            <div class="form-group ">
                <label for="subject">Konu</label>
                <input type="text" class="form-control" id="subject" name="subject" placeholder="Konu giriniz">
            </div>
            <div class="form-group">
                <label for="message">Mesaj</label>
                <input type="text" class="form-control" id="message" name="message" placeholder="Mesaj giriniz">

            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection
