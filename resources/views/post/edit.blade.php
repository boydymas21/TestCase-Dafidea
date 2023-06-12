@extends('layouts.app')
@section('content')
@if ($errors->any())
    <div class="pt-3">
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $item)
                    <li>{{$item}}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
    <div class="col-md-8 bg-white">
        <div class="card-header">
           <a href="{{url('post')}}">
            <i class="nav-icon fas fa-backspace"> Kembali</i>
           </a>
        </div>
    </div>

<div class="col-md-8 col-sm-12 bg-white p-4">
    <h3 class="card-header">Edit Post</h3>
    <br>
    <form method="POST" action="{{url('post/'.$data->judul)}}">
    @csrf
    @method('PUT')
        <div class="form-group">
            <label>Judul Post</label>
            <input type="text" class="form-control" name="judul" value="{{$data->judul}}">
        </div>
        <div class="form-group">
            <label>Isi Post</label>
            <textarea class="form-control" type="text" name="konten" rows="15">{{$data->konten}}</textarea>
        </div>
        <div class="form-group col-4">
            <label>Tanggal Post</label>
            <input type="date" class="form-control" name="tgl_post" value="{{$data->tgl_post}}">
        </div>
        <div class="form-group">
            <label>Upload</label>
            <input type="submit" class="form-control btn btn-primary" value="Upload">
        </div>
</div>
@endsection