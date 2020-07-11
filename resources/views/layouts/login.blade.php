<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Hackathon - @yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

  <link href="{{ asset('loginAsset/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('loginAsset/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('loginAsset/vendor/animate/animate.css') }}" rel="stylesheet">
  <link href="{{ asset('loginAsset/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet">
  <link href="{{ asset('loginAsset/vendor/select2/select2.min.css') }}" rel="stylesheet">
  <link href="{{ asset('loginAsset/css/util.css') }}" rel="stylesheet">
  <link href="{{ asset('loginAsset/css/main.css') }}" rel="stylesheet">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
<link href="https://fonts.googleapis.com/css?family=Ruda&display=swap" rel="stylesheet">

<!--====

===========================================================================================-->
<script>

/**

 * Array con las imagenes y enlaces que se iran mostrando en la web

 */

var imagenes=new Array(

    ['{{ asset('img/sunlogos.png') }}']

);

var contador=0;



/**

 * Funcion para cambiar la imagen y link

 */

function rotarImagenes()

{

    // cambiamos la imagen y la url

    contador++

    document.getElementById("imagen").src=imagenes[contador%imagenes.length][0];

    document.getElementById("link").href=imagenes[contador%imagenes.length][1];

}



/**

 * Función que se ejecuta una vez cargada la página

 */

onload=function()

{

    // Cargamos una imagen aleatoria

    rotarImagenes();



    // Indicamos que cada 5 segundos cambie la imagen

    setInterval(rotarImagenes,3000);

}

</script>
<style>
     @font-face {
font-family: "Northern";
src: url("../fonts/NorthernTerritories.ttf") format("truetype");
}
  .titleceneae{
              font-family:Northern;
              font-size: 30px;
              color:#ffffff;
              text-align: center;
            }
.font-login{
color: #ffffff;
font-size: 62px;
font-family: 'Ruda';
}
body{
  background-image: url('../img/ntcd_blur.jpg'); background-repeat: no-repeat; background-size: cover; 
  background-attachment: fixed;
}
</style>
</head>
<body>


 @yield('content')



  <!-- Scripts -->
  <script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}" defer></script>
  <script src="{{ asset('loginAsset/vendor/bootstrap/js/popper.js') }}" defer></script>
  <script src="{{ asset('loginAsset/vendor/bootstrap/js/bootstrap.min.js') }}" defer></script>
  <script src="{{ asset('loginAsset/vendor/select2/select2.min.js') }}" defer></script>
  <script src="{{ asset('loginAsset/vendor/tilt/tilt.jquery.min.js') }}" defer></script>
  <script src="{{ asset('loginAsset/js/main.js') }}" defer></script>
  <script src="{{ asset('jquery.js') }}" defer></script>
  <script src="{{ asset('jquery.smoothState.js') }}" defer></script>
  <script src="{{ asset('functions.js') }}" defer></script>



</body>
</html>
