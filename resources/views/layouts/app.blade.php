<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
     <!--     Fonts and icons     -->
     <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
      <!-- CSS Files -->
      <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
      <link href="{{ asset('css/paper-dashboard.css?v=2.0.0') }}" rel="stylesheet">

      <link href="{{ asset('css/demo/demo.css') }}" rel="stylesheet">
      <link href="{{ asset('css/animate.css') }}" rel="stylesheet">

     
      <!-- CSS Just for demo purpose, don't include it in your project -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <style>
       

        }
        </style>
</head>
<body>
    <div id="app">
      <div class="wrapper ">
        <div class="sidebar" data-color="white" data-active-color="danger">
          <!--
            Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
        -->
          <div  class="logo logos" >
          <a href="{{url('/')}}" class="simple-text logo-mini">
              <div class="logo-image-small">
                <img width="95px" height="25px" src="{!!asset('img/sunlogos.png')!!}" >
              </div>
            </a>
            <a style="color:#ffffff; font-size:15px; text-align:center; line-height:1em;" href="http://www.creative-tim.com" class="simple-text logo-normal font-natacad">
              CENTRO EDUCATIVO <br>NATANAEL
            </a>
            
          </div>
          <div class="sidebar-wrapper">
            <ul class="nav">
            <li class="{{request()->is('home') ? 'active' : '' }}">
                <a  href="{{ route('home') }}">
                  <p  class="slider-label">Inicio</p>
                </a>
              </li>
              <li class="{{request()->is('admin/listaAlumnos') ? 'active' : '' }}">
                <a href="{{ route('listaAlumnos') }}">
                  <p class="slider-label">Alumnos</p>
                </a>
              </li>
              <li class="{{request()->is('admin/docentes') ? 'active' : '' }}">
                <a href="{{ route('docentes.index') }}">
                  <p class="slider-label">Docentes</p>
                </a>
              </li>
              
             
              <li class="{{request()->is('admin/ndolares') ? 'active' : '' }}">
              <a href="{{route('ndolares.index')}}">
                  <p class="slider-label">Nata-Dolares</p>
                </a>
              </li>
              <li class="{{request()->is('admin/inscripcion') ? 'active' : '' }}" >
                <a href="{{ route('inscripcion.index') }}">
                  <p class="slider-label">Registro</p>
                </a>
              </li>
              
            </ul>
          
          </div>
        </div>

          <!----navbar--->
        <!-- Navbar -->
        <div class="main-panel">
          <!-- Navbar -->
           <!----navbar--->
           <nav style="height:9.4%;" class="navbar navbar-expand-md navbar-light  logos">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                </a>
               

                <div class="collapse navbar-collapse show" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        <div class="container-fluid">
                          <div class="navbar-wrapper">
                            <div class="navbar-toggle">
                              <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                              </button>
                            </div>
                          </div>
                         
                          <div class="collapse navbar-collapse justify-content-end show" id="navigation">
                            <form>
                              <div class="input-group no-border">
                               
                              </div>
                            </form>
                            <ul class="navbar-nav">
                            
                              <li class="nav-item btn-rotate dropdown">
                                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i class="nc-icon nc-bell-55"></i>
                                  <p>
                                    <span class="d-lg-none d-md-block">Some Actions</span>
                                  </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                  <a class="dropdown-item" href="#">Action</a>
                                  <a class="dropdown-item" href="#">Another action</a>
                                  <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                              </li>
                              <li class="nav-item">
                                
                                <a class="nav-link" href="#"><i class="fas fa-grin-tongue"></i>{{ Auth::user()->name }} <span class="caret"></span></a>
                              </li>
                              <li class="nav-item">
                                
                                    <span class="d-lg-none d-md-block">Account</span>

                                  </p>
                                </a>
                              </li>
                              <li class="nav-item">
                    
                                <a  class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt">
                        </i>{{ __('Cerrar sesión') }}</a>
                        </li></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                            </ul>
                            @endguest
                
                          </div>
                        </div>
                        
                </div>
            </div>
        </nav>
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
    
  <!--   Core JS Files   -->

  <script src="{{ asset('js/core/jquery.min.js')  }}"></script>
  <script src="{{ asset('js/core/popper.min.js')  }}"></script>
  <script src="{{ asset('js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/plugins/perfect-scrollbar.jquery.min.js')  }}"></script>
  <script src="{{ asset('js/plugins/chartjs.min.js')  }}"></script>
  <script src="{{ asset('js/plugins/bootstrap-notify.js')  }}"></script>
  <script src="{{ asset('js/paper-dashboard.min.js?v=2.0.0')  }}" type="text/javascript"></script>
  <script src="{{ asset('demo/demo.js')  }}"></script>


  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  
  <script>
  $(document).ready(function() {
    // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
    demo.initChartsPages();
  });
  </script>
  
  
</body>
</html>