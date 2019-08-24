<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Barang</title>
</head>
<body>
    <h1>Table Barang</h1>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Satuan</th>
                <th>Harga</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $c = 1; ?>
            @foreach ($barang as $b)
            <tr>
                <td>{{ $c++ }}</td>
                <td>{{$b->nm_brg}}</td>
                <td>{{$b->jml_in}}</td>
                <td>{{$b->satuan}}</td>
                <td>{{$b->harga_brg}}</td>
                <td>{{$b->ket}}</td>
                <td>
                    <a href="{{url('')}}/{{$b->id}}">Edit</a>
                    <a href="{{url('')}}/{{$b->id}}">Hapus</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>