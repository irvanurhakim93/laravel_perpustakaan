<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Nama Buku : </th>
                <th>Penulis :</th>
                <th>Penerbit :</th>
                <th>Tahun Terbit :</th>
                <th>Sinopsis :</th>
            </tr>
        </thead>
        <tbody>
            <td>{{$data->nama}}</td>
            {{-- <td>@foreach ($data->penulis()->get() as $penulis)
            {{$penulis->nama}}    
            @endforeach
            </td>
            <td>@foreach ($data->penerbit()->get() as $penerbit)
            {{$penerbit->nama}}    
            @endforeach
            </td> --}}
            <td>{{$data->tahun_terbit}}</td>
            <td>{{$data->sinopsis}}</td>

        </tbody>
    </table>
</body>
</html>