<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
 


  <title>Centro Educativo Natanael</title>
  <!-- Font Awesome -->
  <!--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">-->
  <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/app.css" rel="stylesheet">
  <link href="scss/style.scss" rel="stylesheet/scss">
  <link href="{{ asset('css/paper-dashboard.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">  <!-- Scroll -->
<script src="{{ asset('js/smooth-scroll.min.js')}}"></script>

  <script>
    smoothScroll.init({
    selector: '[data-scroll]', // Selector for links (must be a class, ID, data attribute, or element tag)
    selectorHeader: null, // Selector for fixed headers (must be a valid CSS selector) [optional]
    speed: 1000, // Integer. How fast to complete the scroll in milliseconds
    easing: 'easeInOutCubic', // Easing pattern to use
    offset: 80, // Integer. How far to offset the scrolling anchor location in pixels
    callback: function ( anchor, toggle ) {} // Function to run after scrolling
    });
  </script>
  <style lang='scss'>
    $base: 0.6rem;

.container {
 display: flex;
 justify-content: center;
 align-items: center;
 width: 100%;
 height: 100vh;
}

.chevron {
  position: absolute;
  width: $base * 3.5;
  height: $base * 0.8;
  opacity: 0;
  transform: scale(0.3);
  animation: move-chevron 3s ease-out infinite;
}

.chevron:first-child {
  animation: move-chevron 3s ease-out 1s infinite;
}

.chevron:nth-child(2) {
  animation: move-chevron 3s ease-out 2s infinite;
}

.chevron:before,
.chevron:after {
 content: '';
 position: absolute;
 top: 0;
 height: 100%;
 width: 50%;
 background: #2c3e50;
}

.chevron:before {
 left: 0;
 transform: skewY(30deg);
}

.chevron:after {
 right: 0;
 width: 50%;
 transform: skewY(-30deg);
}

@keyframes move-chevron {
 25% {
  opacity: 1;
	}
 33.3% {
  opacity: 1;
  transform: translateY($base * 3.8);
 }
 66.6% {
  opacity: 1;
  transform: translateY($base * 5.2);
 }
 100% {
  opacity: 0;
  transform: translateY($base * 8) scale(0.5);
 }
}
  </style>

  <style type="text/css">
  $base: 0.6rem;

.container {
 display: flex;
 justify-content: center;
 align-items: center;
 width: 100%;
 height: 100vh;
}

.chevron {
  position: absolute;
  width: $base * 3.5;
  height: $base * 0.8;
  opacity: 0;
  transform: scale(0.3);
  animation: move-chevron 3s ease-out infinite;
}

.chevron:first-child {
  animation: move-chevron 3s ease-out 1s infinite;
}

.chevron:nth-child(2) {
  animation: move-chevron 3s ease-out 2s infinite;
}

.chevron:before,
.chevron:after {
 content: '';
 position: absolute;
 top: 0;
 height: 100%;
 width: 50%;
 background: #2c3e50;
}

.chevron:before {
 left: 0;
 transform: skewY(30deg);
}

.chevron:after {
 right: 0;
 width: 50%;
 transform: skewY(-30deg);
}

@keyframes move-chevron {
 25% {
  opacity: 1;
	}
 33.3% {
  opacity: 1;
  transform: translateY($base * 3.8);
 }
 66.6% {
  opacity: 1;
  transform: translateY($base * 5.2);
 }
 100% {
  opacity: 0;
  transform: translateY($base * 8) scale(0.5);
 }
}
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

    @media (max-width: 800px) and (max-width: 850px) {
      .navbar:not(.top-nav-collapse) {
        background: #1C2331 !important;
      }
      .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }                        
            .conoce-grupo{
              display: none;
            }   
            .conoce-grupo-buttons{
              display: block !important;

            }                                                                                                                                                                                                                                                                                                                                                                                                                                                                              
    }
    @font-face {
font-family: "Northern";
src: url("../fonts/NorthernTerritories.ttf") format("truetype");
}
.mapa{
  width: 100%;
  height: 300px;
}

.btn-maps{
  margin-top: 5px;
  background: transparent !important;
  border: 0px;
  color: #ffffff;
}
.icon-maps{
  font-size: 30px;
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

<!-- Modal -->
<div class="modal fade" id="modalReservar" tabindex="-1" role="dialog" aria-labelledby="modalReservar"
  aria-hidden="true">
  <div class="modal-dialog modal-side modal-top-right" role="document">
    <div style="border-top-right-radius: 10px;border-radius: 10px;" class="modal-content">
      <div style="background: rgb(168, 47, 6); color:#ffffff;border-top-right-radius: 10px;border-top-left-radius: 10px;" class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">¡Reserva para este o el próximo ciclo escolar!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">

          <div style="padding: 0;" class="col-md-12">
            <div style="height:100%;" class="card">

              <div   class="card-header">
                
              </div>
              <div class="card-body">

                <div class="row">
                  <div class="col-md-12">
                   <label><h5>1°: <strong class="text-success">5 disponibles  </strong></h5></label>
                    <a  style="position: absolute; left: 70% !important; margin:0;" id="pro" href="#" class="btn btn-info ">Reservar</a>
                  </div>
                  
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <label><h5>2°: <strong class="text-danger">0 disponibles   </strong></h5> </label> 
                    <a style="position: absolute; left: 70% !important; margin:0;" href="#" class="btn btn-info ">Reservar</a>
                  </div>
                </div>


                <div class="row">
                  <div class="col-md-12">
                    <label><h5>3°: <strong class="text-danger">0 disponibles  </strong></h5></label>
                    <a style="position: absolute; left: 70% !important; margin:0;"  href="#" class="btn btn-info">Reservar</a>        
                  </div>
                </div>

              </div>
              <div style="display: none"  class=" conoce-grupo-buttons pull-right">
                    <a style="margin-right: 3.8em;" class="btn btn-info pull-right">estadísticas</a>
              </div>
            </div>
          </div>
      </div>
      </div>
    </div>
  </div>
</div>
  @include('sweetalert::alert')
  <!-- Navbar -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
    <div class="container">

      <!-- Brand -->
      <a class="navbar-brand" href="#inicio" target="_blank">
        <strong class="font-natacad">CENEAE</strong>
      </a>
        
      <a class="button-link titlemontessori" data-scroll href="{{route('montessori.index')}}" class="btn btn-danger" role="button" aria-pressed="true">MONTESSORI</a>

      <a  class="button-link" href=" {{ route('galeria') }}">
        GALERIA
      </a>
      <button type="button" class="button-link" data-toggle="modal" data-target="#modalReservar" target="_blank">
        RESERVAR
      </button>
      
      <button type="button"  class=" button-link" data-toggle="modal" data-target="#basicExampleModal">
        <i class="nc-icon nc-pin-3 icon-maps"> </i>
      </button>
      <!-- Collapse -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Links -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <!-- Left -->
        <ul class="navbar-nav mr-auto">
         
          
        </ul>

        
        </ul>
        <ul class="navbar-nav nav-flex-icons">
          
          <li>
            
          </li>
          
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

  <div style="margin-top:5em;" class="container-fluid cotainer-logo-welcome">


   <div style="height:30%; padding:1em;" class="container-fluid flex-center">
    <img  id="animated-img1 sun" class="animated bounce sun infinite" src="{!! asset('img/sunlogo.png') !!}" height="200px" width="300px"> 
   </div>
   <div class=" justify-content-center align-items-center">

    <!-- Content -->
    <div class="text-center white-text mx-5 wow fadeIn ">
      <h1 class="mb-4 titleceneae wow fadeInUp">
        Centro Educativo Natanael
      </h1>

      <p style="display: block;" class="mb-4 wow fadeInUp EAE">
        <strong class="EAE" >Esperanza, Amor y Educación.</strong>
      </p>

     <!-- <p class="mb-4 d-none d-md-block wow fadeInUp descripcion-ceneae">
        <strong class="des" >Somos una institución que empodera a sus estudiantes
        para que persistan en su pasión por el arendizaje, 
        <br>procurando que lleven una vida basada en la integridad personal y un estilo de vida saludable</strong>
      </p> -->
      @if (Route::has('login'))
      <div style="margin-top:1em;" class="links">

          @auth
              <a class="btn btn-outline-white btn-lg font-natacad btn-home" href="{{ route('home') }}">Home</a>

          @else
          <a class="btn btn-outline-white btn-lg btn-login" href="{{ route('login') }}">Iniciar sesion</a>

              <!--@if (Route::has('register'))
                  <a class="btn btn-outline-white btn-lg" href="{{ route('register') }}">Registrar</a>
              @endif --->
          @endauth

      </div>
      
          @endif
        
          
    <div style="display: none; margin-top:17%;"  class="aviso-inscripcion">
      
      <p class="info-inscripcion">Inscripciones para alumnos de primaria, hasta el 28 de septiembre.</p>
      
    </div>
 
      
 

      

   
  </div>
    <!-- Content -->

    
  </div>

  </div>
  <div style="position: absolute; top:95% !important; width:100% !important; margin:0;" class="">
      <div style="width:100% !important; " class="d-flex justify-content-center align-items-end">
        <p style="color: #ffffff !important;" class="" style="">Deslizar hacia abajo para mas información</p>

      </div>
    </div>
</div>

  <!-- Full Page Intro -->

  <!--Main layout-->
  <main>
    
    <div class="container">
         <!--Section: Main info-->
         <section class="mt-5 wow fadeIn">
          <div class="container">
           
        </section>
  <section>
    <h3  class="h3 text-center ">Acerca de Centro Educativo Natanael</h3>
    <div class="row wow fadeIn">
      <div class="col-lg-6 col-md-12 px-4 EAE-acerca">
              <!--First row-->
            <div class="row EAE-acerca">
              <div style="padding: 0;"class="col-1 mr-4">
              <img src="{{asset('img/esperanzalogo_bn.png')}}" width="80px" height="40px">
              </div>
              <div class="col-10">
                <h5 class="feature-title">Esperanza</h5>
                <p class="grey-text">
                  El niño es una esperanza y una promesa para la humanidad. Si la ayuda y la salvación han de llegar sólo puede ser a través de los niños,
                  Porque los niños son los creadores de la humanidad.
                </p>
              </div>
            </div>
            <!--/First row-->

            <div style="height:30px"></div>

            <!--Second row-->
            <div  class="row EAE-acerca">
              <div style="padding: 0;" class="col-1 mr-4">
                <img src="{{asset('img/amorlogo_bn.png')}}" width="60px" height="50px">
              </div>
              <div class="col-10">
                <h5 class="feature-title">Amor</h5>
                <p class="grey-text">Amar, para Montessori es despertar el espíritu del niño y después 
                  proporcionarle los medios para desarrollar ese despertar. 
                </p>
              </div>
            </div>
            <!--/Second row-->

            <div style="height:30px"></div>

            <!--Third row-->
            <div class="row EAE-acerca">
              <div style="padding: 0;"  class="col-1 mr-4">
                <img src="{{asset('img/educacionlogo_bn.png')}}" width="70px" height="40px">
              </div>
              <div class="col-10">
                <h5 class="feature-title">Educación</h5>
                <p class="grey-text">La educación busca formar al niño de manera integral: crecimiento físico, social, emocional y cognitivo. Además de ayudar al niño a ser un aprendiz independiente.
              </div>
            </div>
            <!--/Third row-->

        </div>
          <!--/Grid column-->

          <!--Grid column-->
          <div class="col-lg-6 col-md-12">
            <hr style="display: none;" class="my-5 linea">

            <p class="h5 text-center mb-4">¡Conoce más acerca de nosotros!</p>
            <div class="embed-responsive embed-responsive-16by9">
              <iframe width="560" height="315" src="https://www.youtube.com/embed/TBC8JYwBwRk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>            </div>
          </div>
          <!--/Grid column-->
      </div>
  </section>
      <hr class="my-5">
      <!--Section: Main features & Quick Start-->
      <section id="" >
        <!--Grid row-->
        <div class="row">
          <!--Grid column-->
          <!--Grid column-->
          <div class="col-md-12 mb-4">
            <div class="row EAE-acerca">
              <div style="padding: 0;"class="col-6 mr-4">
                <h3 class="h3 mb-3">MISIÓN</h3>
                <p class="mision-vision">Somos una institución que empodera a nuestros estudiantes para que persistan en su pasión por el aprendizaje, contribuyendo en la formación de todos ellos mediante una educación cristiana de excelencia,
                  procurando que lleven una vida basada en la integridad personal y un estilo de vida saludable dispuestos a servir a Dios y a la sociedad.
               </p>
              </div>
              <div class="col-5">
                <h3 class="h3 mb-3">VISIÓN</h3>
                <p class="mision-vision">Ser una comunidad educativa, lider e innovadora que responde eficiente y eficazmente a las necesidades de nuestro entorno
                  y el mundo globalizado, lo cual garantiza que su alumnado tendrá éxito en sus proyectos de vida.
                </p>
              </div>
            </div>
          </div>
        </div>
         <div class="row">
      </section >
      <!--Section: Main features & Quick Start-->
      <hr class="my-5">

      <section>
        <h3  class="h3 text-center ">Galeria Centro Educativo Natanael</h3>

        <!--Carousel Wrapper-->
<div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
  <!--Indicators-->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-2" data-slide-to="1"></li>
    <li data-target="#carousel-example-2" data-slide-to="2"></li>
  </ol>
  <!--/.Indicators-->
  <!--Slides-->
  <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <div class="view">
      <img class="d-block w-100" src="{{ asset('img/galeria/6.jpg') }}"
          alt="First slide">
        <div class="mask rgba-black-light"></div>
      </div>
      <div class="carousel-caption">
        <h3 class="h3-responsive"></h3>
        <p>Instalaciones del centro educativos</p>
      </div>
    </div>
    <div class="carousel-item">
      <!--Mask color-->
      <div class="view">
        <img class="d-block w-100" src="{{ asset('img/galeria/1.jpg') }}"
          alt="Second slide">
        <div class="mask rgba-black-strong"></div>
      </div>
      <div class="carousel-caption">
        <h3 class="h3-responsive"></h3>
        <p>Instalaciones del centro educativos</p>

      </div>
    </div>
    <div class="carousel-item">
      <!--Mask color-->
      <div class="view">
        <img class="d-block w-100" src="{{ asset('img/galeria/3.jpg') }}"
          alt="Third slide">
        <div class="mask rgba-black-slight"></div>
      </div>
      <div class="carousel-caption">
        <h3 class="h3-responsive"></h3>
        <p>Cero aburrimiento</p>
      </div>
    </div>
    <div class="carousel-item">
      <!--Mask color-->
      <div class="view">
        <img class="d-block w-100" src="{{ asset('img/galeria/8.jpg') }}"
          alt="Third slide">
        <div class="mask rgba-black-slight"></div>
      </div>
      <div class="carousel-caption">
        <h3 class="h3-responsive"></h3>
        <p>Eventos con muchas sorpresas</p>
      </div>
    </div>
  </div>
  <!--/.Slides-->
  <!--Controls-->
  <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  <!--/.Controls-->
</div>
<!--/.Carousel Wrapper-->
      </section>
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
                  <a href="#" target="_blank">
                      <div class="mask rgba-white-slight"></div>
                  </a>
              </div>

              <!--Card content-->
              <div class="card-body">
                  <!--Title-->
                  <h4 class="card-title">Cursos Matemáticas</h4>
                  <!--Text-->
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sem libero, malesuada ut sem a, vehicula sodales lorem. Sed vel magna varius, venenatis ante eget, sagittis turpis. </p>
                  <a href="#" target="_blank" class="btn btn-primary btn-md">Mas información.
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
                <a href="#" target="_blank">
                      <div class="mask rgba-white-slight"></div>
                  </a>
              </div>

              <!--Card content-->
              <div class="card-body">
                  <!--Title-->
                  <h4 class="card-title">IGNITE</h4>
                  <!--Text-->
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sem libero, malesuada ut sem a, vehicula sodales lorem. Sed vel magna varius, venenatis ante eget, sagittis turpis. </p>
                  <a href="#" target="_blank" class="btn btn-primary btn-md">Mas información.
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
                  <a href="#" target="_blank">
                      <div class="mask rgba-white-slight"></div>
                  </a>
              </div>

              <!--Card content-->
              <div class="card-body">
                  <!--Title-->
                  <h4 class="card-title  ">Montessori</h4>
                  <!--Text-->
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sem libero, malesuada ut sem a, vehicula sodales lorem. Sed vel magna varius, venenatis ante eget, sagittis turpis. </p>
                  <a href="#" target="_blank" class="btn btn-primary btn-md">Mas información.
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
<div id ="map"> </div> 
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBLpNqK3zpnhjRHThUwv7y5e5cdD1VNEB4" async defer></script>
<script>
  
    var map;
   function initMap() {
      map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: 43.5293, lng: -5.6773},
        zoom: 13,
      });
      var marker = new google.maps.Marker({
        position: {lat: 43.542194, lng: -5.676875},
        map: map,
  title: 'Acuario de Gijón'
      });
    }

    
</script>

    </div>
    
    <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubicación de ceneae Cacalchén </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="mapa" class="mapa"></div>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAhJeS1yPRBy7L69aacRlO-lCNXdoKC6OE"></script>
        <script>
          google.maps.event.addDomListener(window, "load", function(){
            var mapElement = document.getElementById('mapa');
            var map = new google.maps.Map(mapElement, {
              center:{
                lat:20.982143,
                lng:-89.233332
              },
              zoom:17
            })
            var marker = new google.maps.Marker({
        position: {lat: 20.982143, lng: -89.233332},
        map: map,
  title: 'Centro Educativo Natanael'
      });
          })
        </script>
      </div>
      
    </div>
  </div>
</div>
<div id ="map"> </div> 
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAhJeS1yPRBy7L69aacRlO-lCNXdoKC6OE&callback=initMap" async defer></script>
<script>
  
    var map;
   function initMap() {
      map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: 43.5293, lng: -5.6773},
        zoom: 13,
      });
      var marker = new google.maps.Marker({
        position: {lat: 43.542194, lng: -5.676875},
        map: map,
  title: 'Acuario de Gijón'
      });
    }

    
</script>

  </main>
  <!--Main layout-->

  <!--Footer-->
  <footer class="page-footer text-center font-small mt-4 wow fadeIn">

    <!--Call to action-->
    <div class="pt-4">
      
      <a class="btn btn-outline-white" href="#" target="_blank" role="button">Mas información
        <i class="fas fa-graduation-cap ml-2"></i>
      </a>
    </div>
    <!--/.Call to action-->

    <hr class="my-4">

    <!-- Social icons -->
    <div class="pb-4">
      <a href="https://www.facebook.com/centroeducativonatanael" target="_blank">
        <i class="fa fa-facebook mr-3"></i>
      </a>

      <a href="#" target="_blank">
        <i class="fa fa-twitter mr-3"></i>
      </a>

      <a href="https://www.youtube.com/watch?v=7MUISDJ5ZZ4" target="_blank">
        <i class="fa fa-youtube mr-3"></i>
      </a>
      
      <a href="https://github.com/mdbootstrap/bootstrap-material-design" target="_blank">
        <i class="fa fa-github mr-3"></i>
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
  @include('sweetalert::alert')  <!--/.Footer-->
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
