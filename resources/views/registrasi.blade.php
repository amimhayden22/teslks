@extends('master')

@section('jumbotron')
Registrasi
@endsection

@section('konten')
<form action="{{url('daftar')}}" method="POST">
    @csrf
    <div class="form-group">
        <label>Username</label>
        <input type="text" name="username" class="form-control" placeholder="Username">
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-sm btn-success">Simpan</button>
    <br>
    Sudah mempunyai akun ? <a href="{{url('masuk')}}">Login</a>
</form>    
@endsection