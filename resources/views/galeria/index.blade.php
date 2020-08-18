<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/png" href="{{asset('img/sunlogos.png')}}" />
	<title>Galeria | CENEAE </title>
	<meta charset="UTF-8">
	<meta name="description" content="Riddle - Portfolio Template">
	<meta name="keywords" content="portfolio, riddle, onepage, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->   
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,400i,600,600i,700" rel="stylesheet">

	<!-- Stylesheets -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/mdb.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
  
  <!-- Stylesheets -->
  <link href="{{asset('riddle/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('riddle/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{asset('riddle/css/magnific-popup.css')}}" rel="stylesheet">
  <link href="{{asset('riddle/css/style.css')}}" rel="stylesheet">
  


	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
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
.title-galeria{
    font-family: 'Anton', sans-serif;
      color: rgb(255, 255, 255);
}
body{
  background-image: url('../img/ntcd_blur.jpg'); background-repeat: no-repeat; background-size: cover; 
  background-attachment: fixed;
}
 </style>
</head>
<body>
	 
	<!-- intro section start -->
	<section  style="padding-bottom: 5em; padding-top:1em;"  class="intro-section">
	<!-- Content -->
    <div style="padding: 0;" class="text-center white-text mx-5 wow fadeIn ">
		<h2 class="section-title mb-5">Nothing is imposible!</h2>
  
     
        <div style="margin-top:1em;" class="links">
     
        <a class="btn btn-outline-white btn-lg font-natacad" href="{{ url('/') }}">volver al inicio</a>

        </div>

  
      
      </div>
	</section>
	<!-- intro section end -->


	
		</div>                       
		<div class="container-fluid p-md-0 ">
			<div class="row portfolios-area">
				<div class="mix col-lg-6 col-md-6 web">
					<a href="{{asset('img/galeria/1.jpg')}}" class="portfolio-item set-bg" data-setbg="{{asset('img/galeria/1.jpg')}}">
						<div class="pi-inner">
							<h2>ver imagen</h2>
						</div>						
					</a>
				</div>
				<div class="mix col-lg-6 col-md-6 digital">
					<a href="{{asset('img/galeria/2.jpg')}}" class="portfolio-item set-bg " data-setbg="{{asset('img/galeria/2.jpg')}}">
						<div class="pi-inner">
							<h2>ver imagen</h2>
						</div>						
					</a>
				</div>
				<div class="mix col-lg-4 col-md-6 web">
					<a href="{{asset('img/galeria/3.jpg')}}" class="portfolio-item set-bg" data-setbg="{{asset('img/galeria/3.jpg')}}">
						<div class="pi-inner">
							<h2>ver imagen</h2>
						</div>						
					</a>
				</div>
				<div class="mix col-lg-4 col-md-6 digital">
					<a href="{{asset('img/galeria/4.jpg')}}" class="portfolio-item set-bg" data-setbg="{{asset('img/galeria/4.jpg')}}">
						<div class="pi-inner">
							<h2>ver imagen</h2>
						</div>						
					</a>
				</div>
				<div class="mix col-lg-4 col-md-6 rened">
					<a href="{{asset('img/galeria/5.jpg')}}" class="portfolio-item set-bg" data-setbg="{{asset('img/galeria/5.jpg')}}">
						<div class="pi-inner">
							<h2>ver imagen</h2>
						</div>						
					</a>
				</div>
				<div class="mix col-lg-12 col-md-6 brand">
					<a href="{{asset('img/galeria/6.jpg')}}" class="portfolio-item set-bg" data-setbg="{{asset('img/galeria/6.jpg')}}">
						<div class="pi-inner">
							<h2>+ See Project</h2>
						</div>						
					</a>
				</div>
				<div class="mix col-lg-6 col-md-6 rened">
					<a href="{{asset('img/galeria/7.jpg')}}" class="portfolio-item set-bg" data-setbg="{{asset('img/galeria/7.jpg')}}">
						<div class="pi-inner">
							<h2>+ See Project</h2>
						</div>						
					</a>
				</div>
				<div class="mix col-lg-6 col-md-6 brand">
					<a href="{{asset('img/galeria/8.jpg')}}" class="portfolio-item set-bg" data-setbg="{{asset('img/galeria/8.jpg')}}">
						<div class="pi-inner">
							<h2>+ See Project</h2>
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
			<h2 class="section-title mb-5">Nothing is imposible!</h2>
			<a href="" class="site-btn">Iniciar session</a>
			<div class="social-links">
				<a href=""><span class="fa fa-pinterest"></span></a>
				<a href=""><span class="fa fa-linkedin"></span></a>
				<a href=""><span class="fa fa-instagram"></span></a>
				<a href=""><span class="fa fa-facebook"></span></a>
				<a href=""><span class="fa fa-twitter"></span></a>
			</div>
			<div class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
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