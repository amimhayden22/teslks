@extends('master')

@section('jumbotron')
Login
@endsection

@section('konten')
@guest    
<form action="{{url('login')}}" method="POST">
    @csrf
    <div class="form-group">
        <label>Username</label>
        <input type="text" name="username" class="form-control" placeholder="Username">
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-sm btn-success">Login</button>
    <br>
    Belum mempunyai akun ? <a href="{{url('registrasi')}}">Daftar</a>
</form>    
@endguest
@endsection

@section('alert')
@if (session('error') == "Gagal")
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>Login gagal !</strong> username / password salah.
    </div>
@endif