<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
    name='viewport' />

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title')</title>

  <!--Styler  -->
  
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  
  <link href="{{ asset('css/paper-dashboard.css') }}" rel="stylesheet">
  <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
  <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
  <!--Scripts  -->
  <script src="{{ asset('js/app.js') }}" defer></script>
  <script src="{{ asset('js/jquery-3.4.1.slim.min.js') }}" ></script>
  <script src="{{ asset('js/popper.min.js') }}" ></script> 
  <script src="{{ asset('js/popper.min.js.map') }}" ></script> 
  <script src="{{ asset('js/bootstrap.min.js') }}" ></script> 

    <!--Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

      <!-- web -->
      <!--<link rel="dns-prefetch" href="//fonts.gstatic.com">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet"> -->

 
</head>

<body>
  <div id="app">
    <div class="wrapper ">
     
      <!----navbar--->
      <!-- Navbar -->

        <!-- Navbar -->
     
        <!-- End Navbar -->

        <main class="py-4">
          @yield('content')
        </main>

        <div>

          @yield('content_login')


        </div>
        <footer class="footer footer-black  footer-white ">
          <div class="container-fluid">
            <div class="row">

              <div class="credits ml-auto">
                <span class="copyright">
                  ©CENEAE
                  <script>
                    document.write(new Date().getFullYear())
                  </script><i class="fa fa-heart heart"></i> by SERGIO EB
                </span>
              </div>
            </div>
          </div>
        </footer>
   
    </div>
  </div>
  @include('sweetalert::alert')
  <script src="{{asset('js/jquery-3.1.0.min.js')}}"></script>
  @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

  <!--   Core JS Files   -->
  <script src="{{ asset('js/plugins/perfect-scrollbar.jquery.min.js')  }}"></script>
  <script src="{{ asset('js/core/popper.min.js')  }}"></script>
  <script src="{{ asset('js/plugins/bootstrap-notify.js')  }}"></script>
  <script src="{{ asset('js/paper-dashboard.min.js')  }}" type="text/javascript"></script>


  <!--  Google Maps Plugin    -->
  <!--<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>-->

  <!--<script>
    $(document).ready(function() {
    // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
    demo.initChartsPages();
  });
  </script> -->


</body>

</html>