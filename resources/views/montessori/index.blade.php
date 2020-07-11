<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Montessori</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
  <link
    href="https://fonts.googleapis.com/css2?family=Passion+One&family=Playfair+Display+SC&family=Taviraj:wght@100&display=swap"
    rel="stylesheet"> <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('css/mdb.min.css')}}" rel="stylesheet">
  <link href="{{asset('css/style.css')}}" rel="stylesheet">

<!-- Stylesheets -->
<link href="{{asset('riddle/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('riddle/css/font-awesome.min.css')}}" rel="stylesheet">
<link href="{{asset('riddle/css/magnific-popup.css')}}" rel="stylesheet">
<link href="{{asset('riddle/css/style.css')}}" rel="stylesheet">



  <!-- Scroll -->
  <script src="{{asset('js/smooth-scroll.min.js')}}"></script>

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

    .frase {
      font-family: 'Taviraj', serif;
    }

    .titlemontessori {
      font-family: 'Anton', sans-serif;
      color: rgb(123, 0, 255);
    }

    .titlemontessori2 {
      font-family: 'Anton', sans-serif;
      color: rgb(123, 0, 255);
      text-shadow: 2px 0 0 #fff, -2px 0 0 #fff, 0 2px 0 #fff, 0 -2px 0 #fff, 1px 1px #fff, -1px -1px 0 #fff, 1px -1px 0 #fff, -1px 1px 0 #fff;

      font-size: 50px;
    }

    .titleceneae {
      font-family: Northern;
      font-size: 30px;
    }

    .font-natacad {
      font-family: Northern;

    }

    .horario {
      color: #ff0000;

      font-size: 20px;
      padding: 1em;

    }

    }

    
body {
	background: #fefefe;
	color: white;
	-webkit-font-smoothing: antialiased;
	-moz-osx-font-smoothing: grayscale;
	text-align: center;
	font-family: 'Roboto Mono';
}

h2 {
	font-weight: 300;
	margin: 4vh 4vw;
	letter-spacing: 3px;
	color: grey;
	text-transform: uppercase;
}

.demo-btn {
	display: inline-block;
	margin: 0 2.5px 4vh 2.5px;
	text-decoration: none;
	color: grey;
	padding: 15px;
	line-height: 1;
	min-width: 140px;
	background: rgba(0,0,0, 0.07);
	border-radius: 6px;
}

.demo-btn:hover {
	background: rgba(0,0,0,0.12);
}

@media (max-width: 640px) {

	.demo-btn {
		min-width: 0;
		font-size: 14px;
	}
}
  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
    <div class="container">

      <!-- Brand -->
      <a class="navbar-brand " href="{{url('/')}}">
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
          <li class="nav-item active">
            <a class="nav-link titlemontessori" data-scroll href="#" class="btn btn-danger" role="button"
              aria-pressed="true">MONTESSORI</a>
          </li>



        </ul>


      </div>

    </div>
  </nav>
  <!-- Navbar -->

  <!-- Full Page Intro -->
  <div id="inicio" class="view "
    style="background-image: url('../img/montessori_blur.png'); background-repeat: no-repeat; background-size: cover; ">

    <div style="margin-top:5em;" class="container-fluid">


      <div style="height:30%; padding:1em;" class="container-fluid flex-center">
        <img id="animated-img1" class="animated bounce infinite" src="{!! asset('img/sunlogo.png') !!}" height="200px"
          width="300px">
      </div>
      <div class=" justify-content-center align-items-center">

        <!-- Content -->
        <div class="text-center white-text mx-5 wow fadeIn ">
          <h1 class="mb-4 titlemontessori2 wow fadeInUp">
            MONTESSORI
          </h1>

          <p style="font-size: 22px; color: #ffffff;" class="mb-4 d-none d-md-block wow fadeInUp frase ">
            <strong>“Si existe para la humanidad una esperanza de salvación y ayuda,
              ésta no podrá venir más que del Niño, porque en él se construye el Hombre.“</strong>
          </p>



        </div>
        <!-- Content -->



      </div>

    </div>
  </div>

  <!-- Full Page Intro -->


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
      <h3 class="h3 mb-3">¿Qué es Academia Natanael Montessori?</h3>
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
   

  </div>
  <!--Grid row-->

</section>
<!--Section: Main info-->
<!-- intro section end -->


<!-- portfolio section start -->
<section class="portfolio-section">
                     
  <div class="container-fluid p-md-0 ">
    <div class="row portfolios-area">
      <div class="mix col-lg-6 col-md-6 web">
        <a href="{{asset('riddle/img/portfolio/mon_pic.jpg')}}" class="portfolio-item set-bg" data-setbg="{{asset('riddle/img/portfolio/mon_pic.jpg')}}">
          <div class="pi-inner">
            <h2>ver imagen</h2>
          </div>						
        </a>
      </div>
      <div class="mix col-lg-6 col-md-6 digital">
        <a href="{{asset('riddle/img/portfolio/natt.jpg')}}" class="portfolio-item set-bg " data-setbg="{{asset('riddle/img/portfolio/natt.jpg')}}">
          <div class="pi-inner">
            <h2>ver imagen</h2>
          </div>						
        </a>
      </div>
      <div class="mix col-lg-4 col-md-6 web">
        <a href="{{asset('riddle/img/portfolio/mon_pic2.jpg')}}" class="portfolio-item set-bg" data-setbg="{{asset('riddle/img/portfolio/mon_pic2.jpg')}}">
          <div class="pi-inner">
            <h2>ver imagen</h2>
          </div>						
        </a>
      </div>
      <div class="mix col-lg-4 col-md-6 digital">
        <a href="{{asset('riddle/img/portfolio/mon_pic3.jpg')}}" class="portfolio-item set-bg" data-setbg="{{asset('riddle/img/portfolio/mon_pic3.jpg')}}">
          <div class="pi-inner">
            <h2>ver imagen</h2>
          </div>						
        </a>
      </div>
      <div class="mix col-lg-4 col-md-6 rened">
        <a href="{{asset('riddle/img/portfolio/mon_pic4.jpg')}}" class="portfolio-item set-bg" data-setbg="{{asset('riddle/img/portfolio/mon_pic4.jpg')}}">
          <div class="pi-inner">
            <h2>ver imagen</h2>
          </div>						
        </a>
      </div>
      <div class="mix col-lg-12 col-md-6 brand">
        <a href="{{asset('riddle/img/portfolio/mon_pic5.jpg')}}" class="portfolio-item set-bg" data-setbg="{{asset('riddle/img/portfolio/mon_pic5.jpg')}}">
          <div class="pi-inner">
            <h2>ver imagen</h2>
          </div>						
        </a>
      </div>
      <div class="mix col-lg-6 col-md-6 rened">
        <a href="{{asset('riddle/img/portfolio/mon_pic6.jpg')}}" class="portfolio-item set-bg" data-setbg="{{asset('riddle/img/portfolio/mon_pic6.jpg')}}">
          <div class="pi-inner">
            <h2>ver imagen</h2>
          </div>						
        </a>
      </div>
      <div class="mix col-lg-6 col-md-6 brand">
        <a href="{{asset('riddle/img/portfolio/mon_pic7.jpg')}}" class="portfolio-item set-bg" data-setbg="{{asset('riddle/img/portfolio/mon_pic7.jpg')}}">
          <div class="pi-inner">
            <h2>ver imagen</h2>
          </div>						
        </a>
      </div>
    </div>
  </div>
</section>
<!-- portfolio section end -->


<!-- footer section start -->
<footer class="footer-section text-center">
  <div class="container">
    <h2 class="section-title mb-5">Nothing is impossible!</h2>
    <a href="" class="site-btn">Registrar</a>
    <div class="social-links">
      <a href=""><span class="fa fa-pinterest"></span></a>
      <a href=""><span class="fa fa-linkedin"></span></a>
      <a href=""><span class="fa fa-instagram"></span></a>
      <a href=""><span class="fa fa-facebook"></span></a>
      <a href=""><span class="fa fa-twitter"></span></a>
    </div>
    <div class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</div>
  </div>
</footer>
<!-- footer section end -->



<!--====== Javascripts & Jquery ======-->
<script src="{{asset('riddle/js/jquery-2.1.4.min.js')}}"></script>
<script src="{{asset('riddle/js/bootstrap.min.js')}}"></script>
<script src="{{asset('riddle/js/mixitup.min.js')}}"></script>
<script src="{{asset('riddle/js/magnific-popup.min.js')}}"></script>
<script src="{{asset('riddle/js/main.js')}}"></script>
</body>

</html>