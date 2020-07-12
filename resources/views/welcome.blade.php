<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Centro Educativo Natanael</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.css" rel="stylesheet">
  <!-- Scroll -->
  <script src="js/smooth-scroll.min.js"></script>
  <script>
    smoothScroll.init({
    selector: '[data-scroll]', // Selector for links (must be a class, ID, data attribute, or element tag)
    selectorHeader: null, // Selector for fixed headers (must be a valid CSS selector) [optional]
    speed: 1000, // Integer. How fast to complete the scroll in milliseconds
    easing: 'easeInOutCubic', // Easing pattern to use
    offset: 95, // Integer. How far to offset the scrolling anchor location in pixels
    callback: function ( anchor, toggle ) {} // Function to run after scrolling
    });
  </script>
  <style type="text/css">
    @media (min-width: 800px) and (max-width: 850px) {
      .navbar:not(.top-nav-collapse) {
        background: #1C2331 !important;
      }
      .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         
    }
    @font-face {
font-family: "Northern";
src: url("../fonts/NorthernTerritories.ttf") format("truetype");
}


.titlemontessori{
  font-family: 'Anton', sans-serif;
  color: #ffffff;
}
.titleceneae{
              font-family:Northern;
              font-size: 30px;

            }
   .font-natacad{
    font-family:Northern;

    }
    .horario{
      color: #ff0000;

      font-size: 20px;
      padding: 1em;
  
    }
 
    }

  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
    <div class="container">

      <!-- Brand -->
      <a class="navbar-brand" href="#inicio" target="_blank">
        <strong class="font-natacad">CENEAE</strong>
      </a>

      <!-- Collapse -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Links -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <!-- Left -->
        <ul class="navbar-nav mr-auto">
          <li class="nav-item" class="">
          <a class="nav-link titlemontessori" data-scroll href="{{route('montessori.index')}}" class="btn btn-danger" role="button" aria-pressed="true">MONTESSORI</a>
          </li>
          <!--<li class="nav-item active">
            <a class="nav-link " data-scroll href="#inicio" class="btn btn-danger" role="button" aria-pressed="true">Home
              <span class="sr-only">(current)</span>
            </a>
          </li> -->
          
          <li class="nav-item">
            <a class="nav-link" data-scroll href="#Acerca" class="btn btn-danger" role="button" aria-pressed="true">Acerca de CEN</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-scroll href="#eventosYMas" class="btn btn-danger" role="button" aria-pressed="true">Eventos y mas</a>
          </li>
         
        
        </ul>

        
        </ul>
        <ul class="navbar-nav nav-flex-icons">
          
          
          <li class="nav-item">
              <img class="sunlogo" src="{!! asset('img/seegeey.png') !!}" height="45px" width="120px"> 
          </li>

          <li style="margin-top:0.5em;" class="nav-item">
           <strong class="horario">
           <script src="{{asset('js/horario.js')}}"></script>

           </strong>

          
        </li>
        </ul>
      </div>

    </div>
  </nav>
  <!-- Navbar -->

  <!-- Full Page Intro -->
  <div id="inicio" class="view " style="background-image: url('../img/ntcd_blur.jpg'); background-repeat: no-repeat; background-size: cover; ">

    <div style="margin-top:5em;" class="container-fluid">


   <div style="height:30%; padding:1em;" class="container-fluid flex-center">
    <img  id="animated-img1 sun" class="animated bounce sun infinite" src="{!! asset('img/sunlogo.png') !!}" height="200px" width="300px"> 
   </div>
   <div class=" justify-content-center align-items-center">

    <!-- Content -->
    <div class="text-center white-text mx-5 wow fadeIn ">
      <h1 class="mb-4 titleceneae wow fadeInUp">
        Centro Educativo Natanael
      </h1>

      <p class="mb-4 d-none d-md-block wow fadeInUp">
        <strong >Somos una institución que empodera a sus estudiantes
        para que persistan en su pasión por el arendizaje, 
        <br>procurando que lleven una vida basada en la integridad personal y un estilo de vida saludable</strong>
      </p>
      @if (Route::has('login'))
      <div style="margin-top:1em;" class="links">
        <a class="btn btn-outline-white btn-lg font-natacad" href="{{ route('galeria') }}">Galeria</a>

          @auth
              <a class="btn btn-outline-white btn-lg font-natacad" href="{{ route('home') }}">Home</a>

          @else
          <a class="btn btn-outline-white btn-lg" href="{{ route('login') }}">Iniciar sesion</a>

              <!--@if (Route::has('register'))
                  <a class="btn btn-outline-white btn-lg" href="{{ route('register') }}">Registrar</a>
              @endif --->
          @endauth
      </div>
  @endif

    
    </div>
    <!-- Content -->

   
   
  </div>

  </div>
</div>

  <!-- Full Page Intro -->

  <!--Main layout-->
  <main>
    <div class="container">

      <!--Section: Main info-->
      <section class="mt-5 wow fadeIn">

        <!--Grid row-->
        <div class="row">

          <!--Grid column-->
          <div class="col-md-6 mb-4">

            <img src="{{ asset('img/natt.jpg') }}" class="img-fluid z-depth-1-half"
              alt="">

          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-md-6 mb-4">

            <!-- Main heading -->
            <h3 class="h3 mb-3">VISIÓN</h3>
            <p>

            </p>
            <p>Ser una comunidad educativa, lider e innovadora que responde eficiente y eficazmente a las necesidades de nuestro entorno
              y el mundo globalizado, lo cual garantiza que su alumnado tendrá éxito en sus proyectos de vida.
            </p>
            <!-- Main heading -->

            <hr>

           

            <!-- CTA -->
            
            <a target="_blank" href="https://www.facebook.com/centroeducativonatanael/" class="btn btn-grey btn-md">
              ceneae
              <i class="fab fa-facebook-f ml-1"></i>
            </a>

          </div>
          <!--Grid column-->
          

        </div>
        <!--Grid row-->
         <!--Grid row-->
         <div class="row">

        

          <!--Grid column-->
          <div class="col-md-6 mb-4">

            <!-- Main heading -->
            <h3 class="h3 mb-3">MISIÓN</h3>
            <p>

            </p>
            <p>Somos una institución que empodera a nuestros estudiantes para que persistan en su pasión por el aprendizaje, contribuyendo en la formación de todos ellos mediante una educación cristiana de excelencia,
               procurando que lleven una vida basada en la integridad personal y un estilo de vida saludable dispuestos a servir a Dios y a la sociedad.
            </p>
            <!-- Main heading -->

            <hr>

           

            <!-- CTA -->
            
            <a target="_blank" href="https://www.facebook.com/centroeducativonatanael/" class="btn btn-grey btn-md">
              ceneae
              <i class="fab fa-facebook-f ml-1"></i>
            </a>

          </div>
          <!--Grid column-->
            <!--Grid column-->
            <div class="col-md-6 mb-4">

              <img src="{{ asset('img/ceneae_2.jpg') }}" class="img-fluid z-depth-1-half"
                alt="">
  
            </div>
            <!--Grid column-->

        </div>
        <!--Grid row-->

      </section>
      <!--Section: Main info-->

      <hr class="my-5">

      <!--Section: Main features & Quick Start-->
      <section id="Acerca" >
        <h3  class="h3 text-center ">Acerca de Centro Educativo Natanael</h3>

        <!--Grid row-->
        <div class="row wow fadeIn">

          <!--Grid column-->
          <div class="col-lg-6 col-md-12 px-4">

            <!--First row-->
            <div class="row">
              <div class="col-1 mr-4">
              <img src="{{asset('img/esperanzalogo_bn.png')}}" width="60px" height="40px">
              </div>
              <div class="col-10">
                <h5 class="feature-title">Esperanza</h5>
                <p class="grey-text">Thanks to MDB you can take advantage of all feature of newest Bootstrap 4.</p>
              </div>
            </div>
            <!--/First row-->

            <div style="height:30px"></div>

            <!--Second row-->
            <div class="row">
              <div class="col-1 mr-4">
                <img src="{{asset('img/amorlogo_bn.png')}}" width="50px" height="50px">
              </div>
              <div class="col-10">
                <h5 class="feature-title">Amor</h5>
                <p class="grey-text">We give you detailed user-friendly documentation at your disposal. It will help
                  you to implement your ideas
                  easily.
                </p>
              </div>
            </div>
            <!--/Second row-->

            <div style="height:30px"></div>

            <!--Third row-->
            <div class="row">
              <div class="col-1 mr-4">
                <img src="{{asset('img/educacionlogo_bn.png')}}" width="60px" height="40px">
              </div>
              <div class="col-10">
                <h5 class="feature-title">Educación</h5>
                <p class="grey-text">We care about the development of our users. We have prepared numerous tutorials,
                  which allow you to learn
                  how to use MDB as well as other technologies.</p>
              </div>
            </div>
            <!--/Third row-->

          </div>
          <!--/Grid column-->

          <!--Grid column-->
          <div class="col-lg-6 col-md-12">

            <p class="h5 text-center mb-4">¡Conoce mas acerca de nosotros!</p>
            <div class="embed-responsive embed-responsive-16by9">
              <iframe width="560" height="315" src="https://www.youtube.com/embed/TBC8JYwBwRk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>            </div>
          </div>
          <!--/Grid column-->

        </div>
        <!--/Grid row-->
      </div>

      </section >
      <!--Section: Main features & Quick Start-->

      <hr class="my-5">


      <!--Section: More-->
     
<!--Section: Cards-->
<section id="eventosYMas" class="text-center">
  <div id="" class="container "> 
  <h3  id="Acerca_de_ceneae" class="h3 text-center ">... y aún hay mas.</h3>

  <!--Grid row-->
  <div class="row mb-4 wow fadeIn">

      


  </div>
  <!--Grid row-->

  <!--Grid row-->
  <div class="row mb-4 wow fadeIn">

      <!--Grid column-->
      <div class="col-lg-4 col-md-12 mb-4">

          <!--Card-->
          <div class="card">

              <!--Card image-->
              <div class="view overlay">
              <img src="{{asset('img/suh_1.png')}}" class="card-img-top" alt="">
                  <a href="https://mdbootstrap.com/angular/" target="_blank">
                      <div class="mask rgba-white-slight"></div>
                  </a>
              </div>

              <!--Card content-->
              <div class="card-body">
                  <!--Title-->
                  <h4 class="card-title">Cursos Matemáticas</h4>
                  <!--Text-->
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sem libero, malesuada ut sem a, vehicula sodales lorem. Sed vel magna varius, venenatis ante eget, sagittis turpis. </p>
                  <a href="https://mdbootstrap.com/angular/" target="_blank" class="btn btn-primary btn-md">Mas información.
                      <i class="fa fa-info ml-2"></i>
                  </a>
              </div>

          </div>
          <!--/.Card-->

      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-4 col-md-6 mb-4">

          <!--Card-->
          <div class="card">

              <!--Card image-->
              <div class="view overlay">
                <img src="{{asset('img/ignite_1.png')}}" class="card-img-top" alt="">
                <a href="https://mdbootstrap.com/react/" target="_blank">
                      <div class="mask rgba-white-slight"></div>
                  </a>
              </div>

              <!--Card content-->
              <div class="card-body">
                  <!--Title-->
                  <h4 class="card-title">IGNITE</h4>
                  <!--Text-->
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sem libero, malesuada ut sem a, vehicula sodales lorem. Sed vel magna varius, venenatis ante eget, sagittis turpis. </p>
                  <a href="https://mdbootstrap.com/angular/" target="_blank" class="btn btn-primary btn-md">Mas información.
                    <i class="fa fa-info ml-2"></i>
                </a>
              </div>

          </div>
          <!--/.Card-->

      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-4 col-md-6 mb-4">

          <!--Card-->
          <div class="card">

              <!--Card image-->
              <div class="view overlay">
                  <img src="{{ asset('img/montesori_1.png') }}" class="card-img-top" alt="">
                  <a href="https://mdbootstrap.com/vue/" target="_blank">
                      <div class="mask rgba-white-slight"></div>
                  </a>
              </div>

              <!--Card content-->
              <div class="card-body">
                  <!--Title-->
                  <h4 class="card-title  ">Montessori</h4>
                  <!--Text-->
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sem libero, malesuada ut sem a, vehicula sodales lorem. Sed vel magna varius, venenatis ante eget, sagittis turpis. </p>
                  <a href="https://mdbootstrap.com/angular/" target="_blank" class="btn btn-primary btn-md">Mas información.
                    <i class="fa fa-info ml-2"></i>
                </a>
              </div>

          </div>
          <!--/.Card-->

      </div>
      <!--Grid column-->

  </div>
  <!--Grid row-->

  
</div>
</section>
<!--Section: Cards-->

    </div>
    
  </main>
  <!--Main layout-->

  <!--Footer-->
  <footer class="page-footer text-center font-small mt-4 wow fadeIn">

    <!--Call to action-->
    <div class="pt-4">
      <a class="btn btn-outline-white" href="https://mdbootstrap.com/docs/jquery/getting-started/download/" target="_blank"
        role="button">Descargar convocatorias (pdf)
        <i class="fas fa-download ml-2"></i>
      </a>
      <a class="btn btn-outline-white" href="https://mdbootstrap.com/education/bootstrap/" target="_blank" role="button">Mas información
        <i class="fas fa-graduation-cap ml-2"></i>
      </a>
    </div>
    <!--/.Call to action-->

    <hr class="my-4">

    <!-- Social icons -->
    <div class="pb-4">
      <a href="https://www.facebook.com/mdbootstrap" target="_blank">
        <i class="fab fa-facebook-f mr-3"></i>
      </a>

      <a href="https://twitter.com/MDBootstrap" target="_blank">
        <i class="fab fa-twitter mr-3"></i>
      </a>

      <a href="https://www.youtube.com/watch?v=7MUISDJ5ZZ4" target="_blank">
        <i class="fab fa-youtube mr-3"></i>
      </a>

      <a href="https://plus.google.com/u/0/b/107863090883699620484" target="_blank">
        <i class="fab fa-google-plus-g mr-3"></i>
      </a>

      <a href="https://dribbble.com/mdbootstrap" target="_blank">
        <i class="fab fa-dribbble mr-3"></i>
      </a>

      <a href="https://pinterest.com/mdbootstrap" target="_blank">
        <i class="fab fa-pinterest mr-3"></i>
      </a>

      <a href="https://github.com/mdbootstrap/bootstrap-material-design" target="_blank">
        <i class="fab fa-github mr-3"></i>
      </a>

      <a href="http://codepen.io/mdbootstrap/" target="_blank">
        <i class="fab fa-codepen mr-3"></i>
      </a>
    </div>
    <!-- Social icons -->

    <!--Copyright-->
    <div class="footer-copyright py-3">
      © 2019 Copyright:
      <a href="https://mdbootstrap.com/education/bootstrap/" target="_blank">Sergio Eb Gallegos</a>
    </div>
    <!--/.Copyright-->

  </footer>
  
  <!--/.Footer-->
  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();

  </script>
</body>

</html>