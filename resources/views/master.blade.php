<!doctype html>
<html lang="en">
  <head>
    <title>Inventaris Barang</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/popper.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
  </head>
  <body>
    @auth
      <!-- Navigasi start -->
      <nav class="navbar navbar-expand-lg navbar-light bg-primary">
          <a class="navbar-brand" href="{{url('home')}}">INVENTARIS</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-item nav-link active" href="{{url('readbarang')}}">Barang</a>
              <a class="nav-item nav-link active" href="{{url('readtransaksi')}}">Transaksi</a>
              <a class="nav-item nav-link active" href="{{url('readstock')}}">Stock</a>
              <a class="nav-item nav-link active" href="{{url('logout')}}">Logout</a>
            </div>
          </div>
        </nav>
      <!-- Navigasi end -->
    @endauth

      <!--Jumbotron start-->
      <div class="jumbotron text-center">
          <h1>
              @yield('jumbotron')
          </h1>
      </div>
      <!--Jumbotron end-->

      <!-- tempat alert -->
      @yield('alert')
      <!-- tempat alert -->

      <!--konten start-->
      <div class="container">
            @yield('konten')
            @yield('gagal')
      </div>
      <!--Jumbotron end-->

      <!--tempat buat masukin modal-->
      @yield('modal')
      <!--tempat buat masukin modal berakhir-->

      <!--script mulai-->
      <script>
          @stack('script')
      </script>
      <!--script selesai-->
  </body>
</html>