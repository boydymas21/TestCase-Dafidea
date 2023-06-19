@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
<div class="card-body">
    <table id="barangtable" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Judul</th>
                <th>Konten</th>
                <th>Tanggal</th>
                <th>Opsi</th>
                </tr>
        </thead>
        <tbody>
            
            @foreach ($data as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->judul}}</td>
                <td>{{\Illuminate\Support\Str::limit($item->konten, 100, '....')}}</td>
                <td>{{$item->tgl_post}}</td>
                <td>
                    <a href="{{url('post/'.$item->judul.'/edit')}}" class="btn btn-warning btn-sm">Edit</a>
                    <form onsubmit="return confirm('Yakin menghapus data?')" class="d-inline" action="{{url('post/'.$item->judul)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                    </form>
                </td>
            </tr> 
            
            @endforeach
        </tbody>
    </table>
</div>
</div>
</div>
</div>
</div>
@endsection