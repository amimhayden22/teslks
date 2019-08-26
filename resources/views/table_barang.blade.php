@extends('master')

@section('jumbotron')
    Tabel Barang
@endsection

@section('konten')
<button type="button" class="btn btn-success" id="tambahBarang">Tambah Barang</button>
<!--a href="{{url('')}}"><button type="button" class="btn btn-primary">Transaksi Barang</button></a--><br>
<br>
<table class="table table-hover">
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
                <button class="btn btn-sm btn-warning editBarang" data-id="{{$b->id}}" data-nama="{{$b->nm_brg}}" data-jumlah="{{$b->jml_in}}" data-satuan="{{$b->satuan}}" data-harga="{{$b->harga_brg}}" data-ket="{{$b->ket}}">Edit</button>
                <button class="btn btn-sm btn-danger hapusBarang" title="Hapus {{$b->nm_brg}} " data-id="{{$b->id}}" data-nama="{{$b->nm_brg}}">Hapus</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

@section('modal')
<!--modal tambah barang-->
<div class="modal fade" id="modal-tambah-barang" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form action="{{url('/createbarang')}}" method="post">
                    @csrf
                    <div class="form-group">
                      <label>Nama Barang</label>
                      <input type="text" class="form-control" name="nm_brg" placeholder="Nama Barang" required>
                    </div>
                    <div class="form-group">
                      <label>Jumlah Barang</label>
                      <input type="text" class="form-control" name="jml_in" placeholder="Jumlah Barang" required>
                    </div>
                    <div class="form-group">
                      <label>Satuan</label>
                      <input type="text" class="form-control" name="satuan" placeholder="Satuan" required>
                    </div>
                    <div class="form-group">
                      <label>Harga Satuan</label>
                      <input type="text" class="form-control" name="harga_brg" placeholder="Harga Satuan" required>
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


<!--modal edit barang-->
<div class="modal fade" id="modal-edit-barang" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                    <form action="{{url('updatebarang')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" id="id-brg">
                        <div class="form-group">
                          <label>Nama Barang</label>
                          <input type="text" class="form-control" name="nm_brg" id="nm_brg" placeholder="Nama Barang" required>
                        </div>
                        <div class="form-group">
                          <label>Jumlah Barang</label>
                          <input type="text" class="form-control" name="jml_in" id="jml_in" placeholder="Jumlah Barang" required>
                        </div>
                        <div class="form-group">
                          <label>Satuan</label>
                          <input type="text" class="form-control" name="satuan" id="satuan" placeholder="Satuan" required>
                        </div>
                        <div class="form-group">
                          <label>Harga Satuan</label>
                          <input type="text" class="form-control" name="harga_brg" id="harga_brg" placeholder="Harga Satuan" required>
                        </div>
                        <div class="form-group">
                          <label>Keterangan</label>
                          <input type="text" class="form-control" name="ket" id="ket" placeholder="Keterangan" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning">Edit</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!--modal hapus barang-->
<div class="modal fade" id="modal-hapus-barang" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <h3 id="hapusIsi"></h3>
            </div>
            <div class="modal-footer">
                <form action="{{url('deletebarang')}}" method="post">
                    <input type="hidden" name="id" id="idhapus">
                        <button type="button" class="btn btn-danger">Hapus</button>
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
        <strong>Success!</strong> Jumlah barang berhasil ditambahkan.
    </div>
@endif
@if (session('alert') == "update")
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>Success!</strong> Barang berhasil diedit.
    </div>
@endif
@if (session('alert') == "hapus")
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>Success!</strong> Barang berhasil dihapus.
    </div>
@endif
@endsection

@prepend('script')
    //untuk menampilkan modal tambah barang ketika tombol tambah barang di clik
    $('#tambahBarang').click(function(){
        $('#modal-tambah-barang').modal('show');
    });

    //untuk menampilkan modal edit barang ketika tombol edit barang di clik
    $('.editBarang').click(function(){
        $('#id-brg').val($(this).data('id'));
        $('#nm_brg').val($(this).data('nama'));
        $('#jml_in').val($(this).data('jumlah'));
        $('#satuan').val($(this).data('satuan'));
        $('#harga_brg').val($(this).data('harga'));
        $('#ket').val($(this).data('ket'));
        $('#modal-edit-barang').modal('show');
    });

    //untuk hapus barang ketika tombol hapus di click 
    $('.hapusBarang').click(function(){
        $('#idhapus').val($(this).data('id'));
        var nama = ($(this).data('nama'));
        $('#hapusIsi').html('Apakah anda ingin menghapus <strong class="text-danger">'+ nama +'</strong> ?');
        $('#modal-hapus-barang').modal('show');
    });
@endprepend