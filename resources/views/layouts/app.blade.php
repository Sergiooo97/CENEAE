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
  <link rel="icon" type="image/ico" href="{{ asset('amorLogo.ico') }}">
  <!--Styler  -->

  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

  <link href="{{ asset('css/paper-dashboard.css') }}" rel="stylesheet">
  <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
  <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
  <!--Scripts  -->
  <script src="{{ asset('js/app.js') }}" defer></script>
  <script src="{{ asset('js/jquery-3.4.1.slim.min.js') }}"></script>
  <script src="{{ asset('js/popper.min.js') }}"></script>
  <script src="{{ asset('js/popper.min.js.map') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>

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

  <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
  <style>
    .curso-asignar a {
      font-size: 30px;
      color: #ffffff;
    }


    tr:hover td {
      background: rgba(199, 212, 221, 0.6) !important;
      cursor: pointer !important;

    }

    .tbl {
      overflow: hidden;
    }

    .table-responsive:hover {
      overflow: scroll !important;
    }

    li {
      list-style: none;
    }

    .alumno-label-block {
      display: block !important;
    }

    .alumno-label-none {
      display: none !important;
    }

    .btn-volver-container a {
      font-size: 14px;
      text-decoration: none;
      margin: 0px;
    }

    .periodo-cont>a {
      color: #0b0b0b;
    }

    /* Fixed sidenav, full height */
    .sidenav {
      height: 100%;
      width: 200px;
      position: fixed;
      z-index: 1;
      top: 0;
      left: 0;
      background-color: #111;
      overflow-x: hidden;
      padding-top: 20px;
    }

    /* Style the sidenav links and the dropdown button */
    .sidenav a,
    .dropdown-btn {
      padding: 6px 8px 6px 16px;
      text-decoration: none;
      font-size: 20px;
      color: #818181;
      display: block;
      border: none;
      background: none;
      width: 100%;
      text-align: left;
      cursor: pointer;
      outline: none;
    }

    /* On mouse-over */
    .sidenav a:hover,
    .dropdown-btn:hover {
      color: #f1f1f1;
    }

    /* Main content */
    .main {
      margin-left: 200px;
      /* Same as the width of the sidenav */
      font-size: 20px;
      /* Increased text to enable scrolling */
      padding: 0px 10px;
    }

    /* Add an active class to the active dropdown button */
    .active .dropdown-btn {
      background-color: rgb(168, 47, 6);
      color: white;
    }

    .active-sub {


      color: #ffffff !important;
    }

    /* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
    .dropdown-container {
      display: none;
      background-color: #e9e9e9;

      margin: 1em !important;
      border-radius: 10px;
    }

    /* Optional: Style the caret down icon */
    .fa-caret-down {
      float: right;
      padding-right: 8px;
    }

    .slider-label {
      font-family: 'Open Sans', sans-serif;
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
        <div class="logo logos">
          <a href="{{url('/')}}" class="simple-text logo-mini">
            <div class="logo-image-small">
              <img width="95px" height="25px" src="{!!asset('img/sunlogos.png')!!}">
            </div>
          </a>
          <a style="color:#ffffff; font-size:15px; text-align:center; line-height:1em;"
            href="http://www.creative-tim.com" class="simple-text logo-normal font-natacad">
            CENTRO EDUCATIVO <br>NATANAEL
          </a>

        </div>

        <div class="sidebar-wrapper">
          <ul class="nav">
            @if(Auth::user()->hasRole('admin'))
            <li class="{{request()->is('home') ? 'active' : '' }}">
              <a href="{{ route('home') }}">
                <p class="slider-label"><i class="nc-icon nc-bank"></i>Inicio</p>
              </a>
            </li>
            <li class="{{request()->is('admin/finanzas') ? 'active' : '' }}">
            <a href="{{ route('finanzas.index')}}">
              <p class="slider-label"><i class="nc-icon nc-bank"></i>Finanzas</p>
            </a>
            </li>
            <li class="{{request()->is('periodo') ? 'active' : '' }}">
              <a class="dropdown-btn">
                <p class="slider-label "><i class="nc-icon nc-icon nc-calendar-60"></i>Periodos
                  {{request()->is('admin/alumno/*/info') ? '>info' : ''}}
                </p>
              </a>
              <div class="dropdown-container">
                <ul style="padding-left: 20px !important;">
                  <li><a href="{{ route('app.period.page') }}">
                      <p class="slider-label"><i class="nc-icon nc-calendar-60"></i>Configurar
                        {{request()->is('admin/grupos/*/*/edit') ? '>orden' : ''}}
                      </p>
                    </a></li>
                  <li><a href="{{ route('rangos.index') }}">
                      <p class="slider-label"><i class="nc-icon nc-calendar-60"></i>Rangos
                        {{request()->is('admin/grupos/*/*/edit') ? '>orden' : ''}}
                      </p>
                    </a></li>
                </ul>
              </div>
            </li>
            <li class="{{request()->is('admin/alumno/lista') ? 'active' : '' }}
                             {{request()->is('admin/alumno/*/info') ? 'active act' : '' }}">
              <a class="dropdown-btn">
                <p class="slider-label "><i class="nc-icon nc-icon nc-satisfied"></i>Alumnos
                  {{request()->is('admin/alumno/*/info') ? '>info' : ''}}
                </p>
              </a>
              <div class="dropdown-container">
                <ul style="padding-left: 20px !important;">
                  <li>
                    <a href="{{ route('alumnos.index') }}">
                      <p class="slider-label "><i class="nc-icon nc-bullet-list-67"></i>Listas
                        {{request()->is('admin/alumno/*/info') ? '>info' : ''}}
                      </p>
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('alumnos.create') }}">
                      <p class="slider-label"><i class="nc-icon nc-ruler-pencil"></i>Registro</p>
                    </a>
                  </li>

                </ul>
              </div>
            </li>
            <li class="{{request()->is('alumnos') ? 'active' : '' }}">
              <a class="dropdown-btn">
                <p class="slider-label"><i class="nc-icon nc-book-bookmark"></i>Grupos
                  {{request()->is('admin/grupos/*/*/edit') ? '>orden' : ''}}
                </p>
              </a>
              <div class="dropdown-container">
                <ul style="padding-left: 20px !important;">
                  <li class="{{request()->is('admin/docente/lista') ? 'active' : '' }}">
                    <a href="{{ route('grupos.index') }}">
                      <p class="slider-label"><i class="nc-icon nc-book-bookmark"></i>Grupos
                        {{request()->is('admin/grupos/*/*/edit') ? '>orden' : ''}}
                      </p>
                    </a>
                  </li>
                  <li class="{{request()->is('curso') ? 'active' : ''}}">
                    <a href="{{ route('curso.index') }}">
                      <p class="slider-label"><i class="nc-icon nc-ruler-pencil"></i>Asignaturas
                        {{request()->is('admin/grupos/*/*/edit') ? '>orden' : ''}}
                      </p>
                    </a>
                  </li>



                </ul>
              </div>
            </li>

            
            <li class="{{request()->is('admin/docente/lista') ? 'active' : '' }}">
              <a href="{{ route('docentes.index') }}">
                <p class="slider-label"><i class="nc-icon nc-single-02"></i>Docentes</p>
              </a>
            </li>
            <li
              class="{{request()->is('admin/alumno/ndolares') ? 'active' : '' }}{{request()->is('admin/alumno/ndolares/*') ? 'active' : '' }}{{request()->is('admin/alumno/*/*/ndolares') ? 'active' : '' }}">
              <a href="{{route('ndolares.index')}}">
                <p class="slider-label"><i class="nc-icon nc-money-coins"></i>Dolares
                  {{request()->is('admin/alumno/*/*/ndolares') ? '>historial' : ''}}
                  {{request()->is('admin/alumno/ndolares/deposito') ? '>Deposito' : ''}}
                  {{request()->is('admin/alumno/ndolares/retiro') ? '>retiro' : ''}}

                </p>
              </a>
            </li>

            <li class="{{request()->is('admin/download/archivos') ? 'active' : '' }}">
              <a href="{{ route('archivosD.index') }}">
                <p class="slider-label"><i class="nc-icon nc-cloud-download-93"></i>Archivos</p>
              </a>
            </li>
            @endif

            @if(Auth::user()->hasRole('user'))
            <li class="{{request()->is('alumno/home') ? 'active' : '' }}">

              <a href="{{ route('alumno.home.index') }}">
                <p class="slider-label"><i class="nc-icon nc-bank"></i>Inicio</p>
              </a>
            </li>
            <li class="{{request()->is('alumno/rendimiento') ? 'active' : '' }}">
              <a href="{{ route('alumno.rendimiento.user')}}">
                <p class="slider-label"><i class="nc-icon nc-chart-bar-32"></i>Rendimiento</p>
              </a>
            </li>
            <li class="{{request()->is('alumno/calificaciones') ? 'active' : '' }}">
              <a href="{{ route('alumno.rendimiento.user') }}">
                <p class="slider-label"><i class="nc-icon nc-trophy"></i>Calificaciones</p>
              </a>
            </li>
            <li class="{{request()->is('alumno/ndolar') ? 'active' : '' }}">
              <a href="{{ route('ndolar.detalle.user') }}">
                <p class="slider-label"><i class="nc-icon nc-money-coins"></i>ndolar detalles</p>
              </a>
            </li>
            @endif
            @if(Auth::user()->hasRole('maestro'))
            <li class="{{request()->is('m/calificacion/*') ? 'active' : '' }}{{request()->is('m/calificacion') ? 'active' : '' }}">
              <a class="dropdown-btn">
                <p class="slider-label"><i class="nc-icon nc-book-bookmark"></i>Calificacion
                  {{request()->is('admin/grupos/*/*/edit') ? '>orden' : ''}}
                </p>
              </a>
              <div class="dropdown-container">
                <ul style="padding-left: 20px !important;">
                  <li class="{{request()->is('m/calificaciones/') ? 'active' : '' }}">
                    <a href="{{route('calificaciones.index')}}">
                      <p class="slider-label"><i class="nc-icon nc-hat-3"></i>Calificación</p>
                    </a>
                  </li>
                  <li class="{{request()->is('m/calificacion/asignar') ? 'active' : ''}}">
                    <a href="{{route('asignar.calificaciones.index')}}">
                      <p class="slider-label"><i class="nc-icon nc-hat-3"></i>Asignar Calificación</p>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            @endif
          </ul>
          <script>
            var dropdown = document.getElementsByClassName("dropdown-btn");
                    var i;

                    for (i = 0; i < dropdown.length; i++) {
                        dropdown[i].addEventListener("click", function() {
                            this.classList.toggle("active");
                            var dropdownContent = this.nextElementSibling;
                            if (dropdownContent.style.display === "block") {
                                dropdownContent.style.display = "none";
                            } else {
                                dropdownContent.style.display = "block";
                            }
                        });
                    }
          </script>
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
                      @if(Auth::user()->hasRole('admin'))
                      <div class=" nav-item btn-rotate dropdown">
                        <a title="Seleccione un periodo" class="nav-link dropdown-toggle btn-periodo" type="button"
                          id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <span class="periodo-cont" id="NombrePeriodo" style="font-weight: bold;">
                            @if(\Session::has('periodo'))
                            {{ \Session::get('periodo') }}
                            @else
                            <?php
                                        $defecto = App\periodo::select('nombre')->where('id',
                                            \Session::get('idPeriodo'))->first();
                                        ?>
                            @if(is_null($defecto))
                            Registre periódos
                            @else
                            {{ $defecto->nombre }}
                            @endif
                            @endif
                          </span>
                        </a>
                        <div style="width: min-content" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          @foreach(App\periodo::orderBy('año_inicio','DESC')->get() as $periodo)
                          <a href="{{ route('app.set.periodo',$periodo->id) }}">
                            {{ $periodo->nombre }}
                          </a> </br>
                          @endforeach
                        </div>
                      </div>
                      @endif


                      <li class="nav-item">

                        <a title="Ir a información de usuario" class="nav-link btn-periodo pull-left" href="#"><i
                            class="fas fa-grin-tongue"></i>{{ Auth::user()->name }} <span class="caret"></span></a>
                      </li>

                      <li id="btn-per" class="nav-item">

                        <a title="Cerrar sesión" class="nav-link " href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" alt="Cerrar sesión"><i
                            class="nc-icon nc-button-power">
                          </i> {{ __('') }}</a>
                      </li>
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
                  <script  type="application/javascript">
                    document.write(new Date().getFullYear())
                  </script><i class="fa fa-heart heart"></i> by SERGIO EB
                </span>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
  </div>
  @include('sweetalert::alert')

  <script src="{{asset('js/jquery-3.1.0.min.js')}}"></script>
  <script src="{{ asset('js/plugins/perfect-scrollbar.jquery.min.js')  }}"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
    integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
  </script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
    integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous">
  </script>
  <script src="{{ asset('js/core/popper.min.js')  }}"></script>
  <script src="{{ asset('js/plugins/bootstrap-notify.js')  }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
  <!--   Core JS Files   -->
  <script src="{{ asset('js/paper-dashboard.min.js')  }}" type="text/javascript"></script>
  @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])



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