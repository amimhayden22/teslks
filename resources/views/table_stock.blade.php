@extends('master')

@section('jumbotron')
Tabel Stock
@endsection

@section('konten')
@auth
<button type="button" class="btn btn-success" id="tambahStock">Tambah Stock</button>
<br>
<br>
<table class="table table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $c = 1; ?>
        @foreach ($stock as $s)
        <tr>
            <td>{{ $c++ }}</td>
            <td>{{$s->nm_brg}}</td>
            <td>
                <button class="btn btn-sm btn-warning editStock" data-id="{{$s->id}}" data-nama="{{$s->nm_brg}}">Edit</button>
                <button class="btn btn-sm btn-danger hapusStock" data-id="{{$s->id}}" data-nama="{{$s->nm_brg}}">Hapus</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endauth
@endsection

@section('modal')
<!--modal tambah barang-->
<div class="modal fade" id="modal-tambah-stock" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form action="{{url('createstock')}}" method="post">
                    @csrf
                    <div class="form-group">
                      <label>Nama Barang</label>
                      <input type="text" class="form-control" name="nm_brg" placeholder="Nama Barang" required>
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
<div class="modal fade" id="modal-edit-stock" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                    <form action="{{url('updatestock')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" id="id-brg">
                        <div class="form-group">
                          <label>Nama Barang</label>
                          <input type="text" class="form-control" name="nm_brg" id="nm_brg" placeholder="Nama Barang" required>
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
<div class="modal fade" id="modal-hapus-stock" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
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
                <form action="{{url('deletestock')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" id="hapus_id">
                        <button type="submit" class="btn btn-danger">Hapus</button>
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
        <strong>Success!</strong> Stock berhasil ditambah.
    </div>
@endif
@if (session('alert') == "update")
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>Success!</strong> Stock berhasil diedit.
    </div>
@endif
@if (session('alert') == "hapus")
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>Success!</strong> Stock berhasil dihapus.
    </div>
@endif
@endsection

@prepend('script')
    //untuk menampilkan modal tambah barang ketika tombol tambah barang di clik
    $('#tambahStock').click(function(){
        $('#modal-tambah-stock').modal('show');
    });

    //untuk menampilkan modal edit barang ketika tombol edit barang di clik
    $('.editStock').click(function(){
        $('#id-brg').val($(this).data('id'));
        $('#nm_brg').val($(this).data('nama'));
        $('#modal-edit-stock').modal('show');
    });

    //untuk hapus barang ketika tombol hapus di click 
    $('.hapusStock').click(function(){
        $('#hapus_id').val($(this).data('id'));
        var nama = ($(this).data('nama'));
        $('#hapusIsi').html('Apakah anda ingin menghapus <strong class="text-danger">'+ nama +'</strong> ?');
        $('#modal-hapus-stock').modal('show');
    });
@endprepend