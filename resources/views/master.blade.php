<!doctype html>
<html lang="en">
  <head>
    <title>Data Barang</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/popper.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
  </head>
  <body>
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