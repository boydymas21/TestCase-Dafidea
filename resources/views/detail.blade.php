
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$data->judul ?? 'err'}} - {{ config('app.name', 'PortalArtikel') }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
    <div class="text-center mt-5"> 
        <a href="{{url('/')}}"><h1>Portal Artikel</h1></a>
    </div>
    <div class="container mt-4">
        <div class="row">
    <div class="col-md-7 col-sm-12 mb-2 bg-white p-0">
        <div class="mb-2 mt-2">
            <center><h2>{{$data->judul ?? 'err'}}</h2></center>
        </div>
        <center><p>{{$data->tgl_post ?? 'err'}}</p></center>
        <img src="https://picsum.photos/250/80" class="card-img-top" alt="gambar" >
        <div class="p-4">
            <p>{{$data->konten ?? 'err'}}</p>
        </div>
    </div>
        <div class=" bg-white col-lg-4 col-md-5 col-sm-4 offset-md-1 offset-sm-1 col-12 mt-4">
            <form action="" method="POST" id="algin-form">
                @csrf
                <div class="form-group">
                    <h4>Leave a comment</h4>
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control">
                </div>
                <div class="form-group">
                    <label>Komentar</label>
                    <input type="text" name="komentar" class="form-control">
                </div>
                <br>
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary">Post Comment</button>
                </div>
            </form>
            <br>
            <div class="card bg-white col-12 pb-4">
                <h1>Comments</h1>
            @foreach ($komen as $kom)
                @if ($kom->id_article==$id)
                    <div class=" card mt-4 text-justify float-left">
                        <h5 class="mt-0 bold">{{$kom->name}}</h4>
                        <p>{{$kom->comment}}</p>
                    </div> 
                @endif
            @endforeach
        </div>
        </div>
           
    </div>
    </div>
</body>
</html>