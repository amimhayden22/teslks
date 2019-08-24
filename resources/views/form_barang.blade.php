<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Barang</title>
</head>
<body>
        <h1>Form Barang</h1>
        <table>
            <form action="{{url('/createbarang')}}" method="post">
                @csrf
                <tr>
                    <td>Nama Barang</td>
                    <td><input type="text" name="nm_barang"  required></td>
                </tr>
                <tr>
                    <td>Jumlah Barang</td>
                    <td><input type="text" name="jml_in"   required></td>
                </tr>
                <tr>
                    <td>Satuan</td>
                    <td><input type="text" name="satuan" required></td>
                </tr>
                <tr>
                    <td>Harga Satuan</td>
                    <td><input type="text" name="harga_brg" required></td>
                </tr>
                <tr>
                    <td>Keterangan</td>
                    <td><input type="text" name="ket" required></td>
                </tr>
                <tr>
                    <td><button type="submit">Simpan</button></td>
                </tr>
            </form>
        </table>
    </body>
    </html>