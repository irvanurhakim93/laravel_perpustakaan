<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Dokumen Buku</title>
</head>
<body>
{{-- <img src="{{$data->gambar()}}" alt="" style="width: 150px; height:150px"> --}}


<br>
<br>   
<h2>{{$data->nama}}</h2>
<br>
<h3>Tahun Terbit : {{$data->tahun_terbit}}</h3>
<br>
<h3>Penulis : @foreach ($data->penulis()->get() as $penulis)
 {{$penulis->nama}}   
@endforeach
</h3>
<br>
<h3>Kategori : @foreach ($data->kategori()->get() as $kategori)
   {{$kategori->nama}} 
   @endforeach 
</h3>
<br>
<h3>Penerbit : @foreach ($data->penerbit()->get() as $penerbit)
{{$penerbit->nama}}    
@endforeach
</h3>

<h3>Sinopsis : {{$data->sinopsis}}</h3>
</body>
</html>