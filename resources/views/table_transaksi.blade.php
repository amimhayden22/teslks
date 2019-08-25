@extends('master')

@section('jumbotron')
Tabel Transaksi
@endsection

@section('konten')
<button type="button" class="btn btn-success" id="tambahTransaksi">Tambah Transaksi</button>
<br>
<br>
<table class="table table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Satuan</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $c = 1; ?>
        @foreach ($transaksi as $t)
        <tr>
            <td>{{ $c++ }}</td>
            <td>{{$t->nm_brg}}</td>
            <td>{{$t->jml_out}}</td>
            <td>{{$t->satuan}}</td>
            <td>{{$t->ket}}</td>
            <td>
                <button class="btn btn-sm btn-warning editTransaksi" data-id="{{$t->id}}" data-nama="{{$t->nm_brg}}" data-jumlah="{{$t->jml_out}}" data-satuan="{{$t->satuan}}" data-harga="{{$t->harga_brg}}" data-ket="{{$t->ket}}">Edit</button>
                <button class="btn btn-sm btn-danger hapusTransaksi" data-id="{{$t->id}}">Hapus</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

@section('modal')
<!--modal tambah Transaksi-->
<div class="modal fade" id="modal-tambah-transaksi" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Transaksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('createtransaksi')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <select name="nm_brg" class="form-control">
                            @foreach ($barang as $brg)
                            <option value="{{ $brg->nm_brg }}">{{ $brg->nm_brg }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jumlah Barang</label>
                        <input type="text" class="form-control" name="jml_out" placeholder="Jumlah Barang" required>
                    </div>
                    <div class="form-group">
                        <label>Satuan</label>
                        <input type="text" class="form-control" name="satuan" placeholder="Satuan" required>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" class="form-control" name="ket" placeholder="Keterangan" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('alert')
@if (session('alert') == "tambah")
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>Success!</strong> Barang berhasil ditambah.
    </div>
@endif
@if (session('alert') == "jumlah")
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>Success!</strong> Jumlah barang berhasil dikeluarkan.
    </div>
@endif
@endsection

@prepend('script')
//untuk menampilkan modal tambah transaksi ketika tombol tambah barang di clik
$('#tambahTransaksi').click(function(){
    $('#modal-tambah-transaksi').modal('show');
});

@endprepend