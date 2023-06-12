@extends('layouts.app')

@section('content')
@foreach ($data as $article)
<div class="container-sm">
    <div class="row">
        <div class="col"></div>
<div class="col-sm-10 mt-4">
    <div class="card">
        <img src="https://picsum.photos/500/80" class="card-img-top" alt="gambar" >
        <div>
            <div class="text-center">
            <h5 class="card-header">{{ $article->judul }}</h5>
            </div>
            
            <div class="text-center">
                <p>{{\Illuminate\Support\Str::limit($article->konten, 120, '....')}}</p>
            </div>

            <div class="text-center mt-2">
                <a href="/detail/{{ $article->id }}" class="btn btn-primary">Baca Artikel</a>
            </div>
            <br>
        </div>
    </div>
</div>
<div class="col"></div>
</div>
</div>
@endforeach
@endsection