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
<div class="col-md-8 col-sm-12 bg-white p-4">
    <h3 class="card-header">New Post</h3>
    <br>
    <form method="POST" action="{{url('post')}}">
    @csrf
        <div class="form-group">
            <label>Judul Post</label>
            <input type="text" class="form-control" name="judul" placeholder="Title">
        </div>
        <div class="form-group">
            <label>Isi Post</label>
            <textarea class="form-control" name="konten" rows="15" placeholder="Description"></textarea>
        </div>
        <div class="form-group col-4">
            <label>Tanggal Post</label>
            <input type="date" class="form-control" name="tgl_post" placeholder="Date">
        </div>
        <div class="form-group">
            <label>Upload</label>
            <input type="submit" class="form-control btn btn-primary" value="Upload">
        </div>
</div>
@endsection