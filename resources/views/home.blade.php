@extends('layouts.app')
@section('title', 'CENEAE')

@section('content')
<div style="padding:1em;" class="content">
  <div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-warning">
                <img src="{!! asset('img/Alumnos-lista.svg') !!}">
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers">
                <p class="card-category">Alumnos</p>
                <p class="card-title">18
                  <p>
              </div>
            </div>
          </div>
        </div>
      <a href="{{route('listaAlumnos')}}">
          <div class="card-footer ">
            <hr>
            <div class="stats">

              <img src="{!! asset('img/Alumnos-lista.svg') !!}" height="30px" width="30px">
              <p style="font-size:18px; float:right;">Ver lista</p>

            </div>

          </div>
        </a>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-warning">
                <img src="{!! asset('img/Maestros.svg') !!}">
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers">
                <p class="card-category">Maestros</p>
                <p class="card-title">6
                  <p>
              </div>
            </div>
          </div>
        </div>
      <a href="{{route('docentes.index')}}">
          <div class="card-footer ">
            <hr>
            <div class="stats">

              <img src="{!! asset('img/Maestros.svg') !!}" height="30px" width="30px">
              <p style="font-size:18px; float:right;">Ver lista</p>

            </div>

          </div>
        </a>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-warning">
                <img src="{!! asset('img/Maestros.svg') !!}">
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers">
                <p class="card-category">Grupos</p>
                <p class="card-title">6
                  <p>
              </div>
            </div>
          </div>
        </div>
        <a href="#">
          <div class="card-footer ">
            <hr>
            <div class="stats">

              <img src="{!! asset('img/Maestros.svg') !!}" height="30px" width="30px">
              <p style="font-size:18px; float:right;">Ver lista</p>

            </div>

          </div>
        </a>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-warning">
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers">
                <p class="card-category">Aún nada</p>
                <p class="card-title">404
                  <p>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer ">
          <hr>
          <div class="stats">
            <i class="fa fa-refresh"></i> nada aún
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">

      <section id="6116" style="margin-top: 65px!important">
        <link
          href="https://web.archive.org/web/20190710144207cs_/https://fonts.googleapis.com/css?familyﬁ=Montserrat&amp;display=swap"
          rel="stylesheet" cph-ssorder="8">
        <style cph-ssorder="9">
          html {
            font-size: 80%;
          }

          * {
            margin: 0;
            padding: 0;
            font-family: "Montserrat", Helvetica, Arial, sans-serif;
          }

          .rojo {
            background: #9D2449;
            margin: 0;
            padding: 30px 0;
          }

          .titulo_blanco {
            color: white;
          }

          /*.calendar,section { max-width: 120rem;}*/
          .day {
            width: 1.7em;
            height: 1.7em;
          }

          .day:nth-of-type(7n+1) {
            color: å #ccc;
          }

          .receso.day:nth-of-type(7n+1) {
            color: #999;
          }

          .to.day {
            color: white;
            background: #e4d0a8;
            border-radius: 50%;
          }

          .month {
            width: calc(2em * 7);
            padding: 1em;
            cursor: pointer;
          }

          h4 {
            font-size: 1em;
            text-transform: uppercase;
            color: #A42145 !important;
          }

          /*h1#year { font-size: 2em; height: 29px; font-weight: normal; padding: 1em 1em .5em 1em; margin-bottom: .5em; border-bottom: 5px double #d9d9d9; text-align:center;}*/
          .no-flexbox .day {
            text-align: center;
            float: left;
            line-height: 1.5em;
          }

          .no-flexbox h4 {
            text-align: center;
          }

          .no-flexbox h1 {
            width: 4em;
          }

          /* FLEXBOX styles*/
          .main,
          .main * {
            display: flex;
            justify-content: center;
          }

          h4 {
            justify-content: center;
            flex: 1 0 100%;
          }

          h1 {
            justify-content: center;
            align-self: stretch;
          }

          .calendar,
          .month {
            flex-wrap: wrap;
          }

          section {
            flex-direction: column;
            align-self: center;
          }

          .month {
            align-items: flex-start;
          }

          .day {
            align-items: center;
            justify-content: center;
          }

          strong {
            font-weight: bolder;
          }

          /*for a Spanish like calendar .month .day:nth-of-type(1){order:7!important;} .month .day:nth-of-type(8){order:-1!important;} */
          script {
            display: none;
          }

          .month.cloneMonth {
            display: flex
          }

          .month.cloneMonth:after {
            content: "\02718";
            color: #f09;
            position: absolute;
            top: 1em;
            right: 1em;
          }

          .cloneCont.trans {
            transform: translateY(1000px);
            background: rgba(255, 255, 255, .9);
            opacity: 0;
            animation: trasladar .5s cubic-bezier(.86, 0, .07, 1);
          }

          strong {
            font-weight: bold;
          }

          .nomenclatura {
            margin-bottom: 10px;
          }

          .nomenclatura span {
            font-size: 75%;
          }

          .indicador {
            width: 1.7em;
            height: 1.7em;
            display: inline-block;
            margin-right: 1em;
          }

          .inicio {
            background-image: url("https://web.archive.org/web/20190710144207im_/https://www.gob.mx/cms/uploads/image/file/498702/inicio.svg");
            color: white;
            background-repeat: no-repeat;
            background-position: right;
            background-size: cover;
          }

          .fin {
            background-image: url("https://web.archive.org/web/20190710144207im_/https://www.gob.mx/cms/uploads/image/file/498701/fin.svg");
            color: white;
            background-repeat: no-repeat;
            background-position: left;
            background-size: cover;
          }

          .suspencion {
            /*background:#b89858;*/
            background: #13322b;
            color: white;
            border-radius: 50%;
          }

          .receso {
            background: #d4c19c;
            color: white;
          }

          .actualizacion {
            background: #285c4d;
            color: white;
          }

          .consejo {
            background: #9d2449;
            color: white;
          }

          .boletas-izq {
            border-left-color: black;
            border-left-style: dashed;
            border-left-width: 0.1em
          }

          .boletas-der {
            border-right-color: black;
            border-right-style: dashed;
            border-right-width: 0.1em
          }

          .boletas-sup {
            border-top-color: black;
            border-top-style: dashed;
            border-top-width: 0.1em
          }

          .boletas-inf {
            border-bottom-color: black;
            border-bottom-style: dashed;
            border-bottom-width: 0.1em
          }

          .vacaciones {
            background: #B38E58;
            color: white;
          }

          .inscripcion {
            background: #621132;
            color: white;
          }

          .preinscripcion-izq {
            background: white;
            border-left-color: #9D2443;
            border-left-style: solid;
            border-left-width: 0.1em;
          }

          .preinscripcion-der {
            background: white;
            border-right-color: #9D2443;
            border-right-style: solid;
            border-right-width: 0.1em;
          }

          .preinscripcion-sup {
            background: white;
            border-top-color: #9D2443;
            border-top-style: solid;
            border-top-width: 0.1em;
          }

          .preinscripcion-inf {
            background: white;
            border-bottom-color: #9D2443;
            border-bottom-style: solid;
            border-bottom-width: 0.1em;
          }

          .administrativa {
            background: #AAA;
            color: white;
          }

          .wbg {
            background: white;
            z-index: 1000;
          }

          .wbg h3 {
            margin-top: 0px;
          }

          .wbg .indicador {
            width: 1em;
            height: 1em;
            margin-right: .4em;
          }

          .transbg {
            background: white;
          }

          .fixed-bottom {
            bottom: 0;
            width: 100%;
            position: fixed;
          }

          .dorado-t {
            color: #d4c19c;
          }

          .boton-rojo {
            background: #d4c19c;
            color: #fff;
            margin: 64px auto 0;
            border-radius: 50px;
            padding: 16px 10px;
            font-weight: 600;
            max-width: 280px;
            text-align: center;
          }

          .boton-rojo a {
            color: white;
          }

          .dorado-b {
            background: #d4c19c;
          }
        </style>
     

        <div class="container">
          <div class="main">
            <section class="row">
              <h2 class="hidden">Calendario escolar 2019-2020</h2>
              <div class="calendar">
                <div class="month ">
                  <h4>Agosto</h4>
                  <div class="day OfWeek" style="order:0">D</div>
                  <div class="day OfWeek" style="order:1">L</div>
                  <div class="day OfWeek" style="order:2">M</div>
                  <div class="day OfWeek" style="order:3">M</div>
                  <div class="day OfWeek" style="order:4">J</div>
                  <div class="day OfWeek" style="order:5">V</div>
                  <div class="day OfWeek" style="order:6">S</div>
                  <div class="day" style="order:7">&nbsp;</div>
                  <div class="day" style="order:8">&nbsp;</div>
                  <div class="day" style="order:9">&nbsp;</div>
                  <div class="day" style="order:10">&nbsp;</div>
                  <div class="day" style="order:11">&nbsp;</div>
                  <div class="day" style="order:12">&nbsp;</div>
                  <div class="day" style="order:13">&nbsp;</div>
                  <div class="day" style="order:14">&nbsp;</div>
                  <div class="day" style="order:15">&nbsp;</div>
                  <div class="day" style="order:16">&nbsp;</div>
                  <div class="day" style="order:17">&nbsp;</div>
                  <div class="day receso" style="order:18">1</div>
                  <div class="day receso" style="order:19">2</div>
                  <div class="day receso" style="order:20">3</div>
                  <div class="day receso" style="order:21">4</div>
                  <div class="day receso" style="order:22">5</div>
                  <div class="day receso" style="order:23">6</div>
                  <div class="day receso" style="order:24">7</div>
                  <div class="day receso" style="order:25">8</div>
                  <div class="day receso" style="order:26">9</div>
                  <div class="day receso" style="order:27">10</div>
                  <div class="day receso" style="order:28">11</div>
                  <div class="day actualizacion" style="order:29">12</div>
                  <div class="day actualizacion" style="order:30">13</div>
                  <div class="day actualizacion" style="order:31">14</div>
                  <div class="day consejo" style="order:32">15</div>
                  <div class="day consejo" style="order:33">16</div>
                  <div class="day receso" style="order:34">17</div>
                  <div class="day receso" style="order:35">18</div>
                  <div class="day consejo" style="order:36">19</div>
                  <div class="day consejo" style="order:37">20</div>
                  <div class="day consejo" style="order:38">21</div>
                  <div class="day inscripcion" style="order:39">22</div>
                  <div class="day inscripcion" style="order:40">23</div>
                  <div class="day receso" style="order:41">24</div>
                  <div class="day receso" style="order:42">25</div>
                  <div class="day inicio" style="order:43">26</div>
                  <div class="day" style="order:44">27</div>
                  <div class="day" style="order:45">28</div>
                  <div class="day" style="order:46">29</div>
                  <div class="day" style="order:47">30</div>
                  <div class="day" style="order:48">31</div>
                  <div class="day" style="order:49">&nbsp;</div>
                  <div class="day" style="order:50">&nbsp;</div>
                  <div class="day" style="order:51">&nbsp;</div>
                  <div class="day" style="order:52">&nbsp;</div>
                  <div class="day" style="order:53">&nbsp;</div>
                  <div class="day" style="order:54">&nbsp;</div>
                  <div class="day" style="order:55">&nbsp;</div>
                </div>
                <div class="month">
                  <h4>Septiembre</h4>
                  <div class="day OfWeek" style="order:0">D</div>
                  <div class="day OfWeek" style="order:1">L</div>
                  <div class="day OfWeek" style="order:2">M</div>
                  <div class="day OfWeek" style="order:3">M</div>
                  <div class="day OfWeek" style="order:4">J</div>
                  <div class="day OfWeek" style="order:5">V</div>
                  <div class="day OfWeek" style="order:6">S</div>
                  <div class="day" style="order:7">&nbsp;</div>
                  <div class="day" style="order:8">&nbsp;</div>
                  <div class="day" style="order:9">&nbsp;</div>
                  <div class="day" style="order:10">&nbsp;</div>
                  <div class="day" style="order:11">&nbsp;</div>
                  <div class="day" style="order:12">&nbsp;</div>
                  <div class="day" style="order:13">&nbsp;</div>
                  <div class="day" style="order:14">1</div>
                  <div class="day" style="order:15">2</div>
                  <div class="day" style="order:16">3</div>
                  <div class="day" style="order:17">4</div>
                  <div class="day" style="order:18">5</div>
                  <div class="day" style="order:19">6</div>
                  <div class="day" style="order:20">7</div>
                  <div class="day" style="order:21">8</div>
                  <div class="day" style="order:22">9</div>
                  <div class="day" style="order:23">10</div>
                  <div class="day" style="order:24">11</div>
                  <div class="day" style="order:25">12</div>
                  <div class="day" style="order:26">13</div>
                  <div class="day" style="order:27">14</div>
                  <div class="day" style="order:28">15</div>
                  <div class="day suspencion" style="order:29">16</div>
                  <div class="day" style="order:30">17</div>
                  <div class="day" style="order:31">18</div>
                  <div class="day" style="order:32">19</div>
                  <div class="day" style="order:33">20</div>
                  <div class="day" style="order:34">21</div>
                  <div class="day" style="order:35">22</div>
                  <div class="day" style="order:36">23</div>
                  <div class="day" style="order:37">24</div>
                  <div class="day" style="order:38">25</div>
                  <div class="day" style="order:39">26</div>
                  <div class="day" style="order:40">27</div>
                  <div class="day" style="order:41">28</div>
                  <div class="day" style="order:42">29</div>
                  <div class="day" style="order:43">30</div>
                  <div class="day" style="order:44">&nbsp;</div>
                  <div class="day" style="order:45">&nbsp;</div>
                  <div class="day" style="order:46">&nbsp;</div>
                  <div class="day" style="order:47">&nbsp;</div>
                  <div class="day" style="order:48">&nbsp;</div>
                  <div class="day" style="order:49">&nbsp;</div>
                  <div class="day" style="order:50">&nbsp;</div>
                  <div class="day" style="order:51">&nbsp;</div>
                  <div class="day" style="order:52">&nbsp;</div>
                  <div class="day" style="order:53">&nbsp;</div>
                  <div class="day" style="order:54">&nbsp;</div>
                  <div class="day" style="order:55">&nbsp;</div>
                </div>
                <div class="month">
                  <h4>Octubre</h4>
                  <div class="day OfWeek" style="order:0">D</div>
                  <div class="day OfWeek" style="order:1">L</div>
                  <div class="day OfWeek" style="order:2">M</div>
                  <div class="day OfWeek" style="order:3">M</div>
                  <div class="day OfWeek" style="order:4">J</div>
                  <div class="day OfWeek" style="order:5">V</div>
                  <div class="day OfWeek" style="order:6">S</div>
                  <div class="day" style="order:7">&nbsp;</div>
                  <div class="day" style="order:8">&nbsp;</div>
                  <div class="day" style="order:9">&nbsp;</div>
                  <div class="day" style="order:10">&nbsp;</div>
                  <div class="day" style="order:11">&nbsp;</div>
                  <div class="day" style="order:12">&nbsp;</div>
                  <div class="day" style="order:13">&nbsp;</div>
                  <div class="day" style="order:14">&nbsp;</div>
                  <div class="day" style="order:15">&nbsp;</div>
                  <div class="day" style="order:16">1</div>
                  <div class="day" style="order:17">2</div>
                  <div class="day" style="order:18">3</div>
                  <div class="day consejo" style="order:19">4</div>
                  <div class="day" style="order:20">5</div>
                  <div class="day" style="order:21">6</div>
                  <div class="day" style="order:22">7</div>
                  <div class="day" style="order:23">8</div>
                  <div class="day" style="order:24">9</div>
                  <div class="day" style="order:25">10</div>
                  <div class="day" style="order:26">11</div>
                  <div class="day" style="order:27">12</div>
                  <div class="day" style="order:28">13</div>
                  <div class="day" style="order:29">14</div>
                  <div class="day" style="order:30">15</div>
                  <div class="day" style="order:31">16</div>
                  <div class="day" style="order:32">17</div>
                  <div class="day" style="order:33">18</div>
                  <div class="day" style="order:34">19</div>
                  <div class="day" style="order:35">20</div>
                  <div class="day" style="order:36">21</div>
                  <div class="day" style="order:37">22</div>
                  <div class="day" style="order:38">23</div>
                  <div class="day" style="order:39">24</div>
                  <div class="day" style="order:40">25</div>
                  <div class="day" style="order:41">26</div>
                  <div class="day" style="order:42">27</div>
                  <div class="day" style="order:43">28</div>
                  <div class="day" style="order:44">29</div>
                  <div class="day" style="order:45">30</div>
                  <div class="day" style="order:46">31</div>
                  <div class="day" style="order:47">&nbsp;</div>
                  <div class="day" style="order:48">&nbsp;</div>
                  <div class="day" style="order:49">&nbsp;</div>
                  <div class="day" style="order:50">&nbsp;</div>
                  <div class="day" style="order:51">&nbsp;</div>
                  <div class="day" style="order:52">&nbsp;</div>
                  <div class="day" style="order:53">&nbsp;</div>
                  <div class="day" style="order:54">&nbsp;</div>
                  <div class="day" style="order:55">&nbsp;</div>
                </div>
                <div class="month">
                  <h4>Noviembre</h4>
                  <div class="day OfWeek" style="order:0">D</div>
                  <div class="day OfWeek" style="order:1">L</div>
                  <div class="day OfWeek" style="order:2">M</div>
                  <div class="day OfWeek" style="order:3">M</div>
                  <div class="day OfWeek" style="order:4">J</div>
                  <div class="day OfWeek" style="order:5">V</div>
                  <div class="day OfWeek" style="order:6">S</div>
                  <div class="day" style="order:7">&nbsp;</div>
                  <div class="day" style="order:8">&nbsp;</div>
                  <div class="day" style="order:9">&nbsp;</div>
                  <div class="day" style="order:10">&nbsp;</div>
                  <div class="day" style="order:11">&nbsp;</div>
                  <div class="day" style="order:12">&nbsp;</div>
                  <div class="day" style="order:13">&nbsp;</div>
                  <div class="day" style="order:14">&nbsp;</div>
                  <div class="day" style="order:15">&nbsp;</div>
                  <div class="day" style="order:16">&nbsp;</div>
                  <div class="day" style="order:17">&nbsp;</div>
                  <div class="day" style="order:18">&nbsp;</div>
                  <div class="day" style="order:19">1</div>
                  <div class="day" style="order:20">2</div>
                  <div class="day" style="order:21">3</div>
                  <div class="day" style="order:22">4</div>
                  <div class="day" style="order:23">5</div>
                  <div class="day" style="order:24">6</div>
                  <div class="day" style="order:25">7</div>
                  <div class="day" style="order:26">8</div>
                  <div class="day" style="order:27">9</div>
                  <div class="day" style="order:28">10</div>
                  <div class="day" style="order:29">11</div>
                  <div class="day" style="order:30">12</div>
                  <div class="day" style="order:31">13</div>
                  <div class="day" style="order:32">14</div>
                  <div class="day consejo" style="order:33">15</div>
                  <div class="day" style="order:34">16</div>
                  <div class="day" style="order:35">17</div>
                  <div class="day suspencion" style="order:36">18</div>
                  <div class="day" style="order:37">19</div>
                  <div class="day" style="order:38"><strong>20</strong></div>
                  <div class="day" style="order:39">21</div>
                  <div class="day" style="order:40">22</div>
                  <div class="day" style="order:41">23</div>
                  <div class="day" style="order:42">24</div>
                  <div class="day" style="order:43">25</div>
                  <div class="day boletas-izq boletas-inf boletas-sup" style="order:44">26</div>
                  <div class="day boletas-inf boletas-sup" style="order:45">27</div>
                  <div class="day boletas-inf boletas-sup" style="order:46">28</div>
                  <div class="day boletas-inf boletas-sup boletas-der" style="order:47">29</div>
                  <div class="day" style="order:48">30</div>
                  <div class="day" style="order:49">&nbsp;</div>
                  <div class="day" style="order:50">&nbsp;</div>
                  <div class="day" style="order:51">&nbsp;</div>
                  <div class="day" style="order:52">&nbsp;</div>
                  <div class="day" style="order:53">&nbsp;</div>
                  <div class="day" style="order:54">&nbsp;</div>
                  <div class="day" style="order:55">&nbsp;</div>
                </div>
                <div class="month">
                  <h4>Diciembre</h4>
                  <div class="day OfWeek" style="order:0">D</div>
                  <div class="day OfWeek" style="order:1">L</div>
                  <div class="day OfWeek" style="order:2">M</div>
                  <div class="day OfWeek" style="order:3">M</div>
                  <div class="day OfWeek" style="order:4">J</div>
                  <div class="day OfWeek" style="order:5">V</div>
                  <div class="day OfWeek" style="order:6">S</div>
                  <div class="day" style="order:7">&nbsp;</div>
                  <div class="day" style="order:8">&nbsp;</div>
                  <div class="day" style="order:9">&nbsp;</div>
                  <div class="day" style="order:10">&nbsp;</div>
                  <div class="day" style="order:11">&nbsp;</div>
                  <div class="day" style="order:12">&nbsp;</div>
                  <div class="day" style="order:13">&nbsp;</div>
                  <div class="day" style="order:14">1</div>
                  <div class="day" style="order:15">2</div>
                  <div class="day" style="order:16">3</div>
                  <div class="day" style="order:17">4</div>
                  <div class="day" style="order:18">5</div>
                  <div class="day" style="order:19">6</div>
                  <div class="day" style="order:20">7</div>
                  <div class="day" style="order:21">8</div>
                  <div class="day" style="order:22">9</div>
                  <div class="day" style="order:23">10</div>
                  <div class="day" style="order:24">11</div>
                  <div class="day" style="order:25">12</div>
                  <div class="day" style="order:26">13</div>
                  <div class="day" style="order:27">14</div>
                  <div class="day" style="order:28">15</div>
                  <div class="day" style="order:29">16</div>
                  <div class="day" style="order:30">17</div>
                  <div class="day" style="order:31">18</div>
                  <div class="day" style="order:32">19</div>
                  <div class="day consejo" style="order:33">20</div>
                  <div class="day" style="order:34">21</div>
                  <div class="day" style="order:35">22</div>
                  <div class="day vacaciones" style="order:36">23</div>
                  <div class="day vacaciones" style="order:37">24</div>
                  <div class="day suspencion" style="order:38">25</div>
                  <div class="day vacaciones" style="order:39">26</div>
                  <div class="day vacaciones" style="order:40">27</div>
                  <div class="day" style="order:41">28</div>
                  <div class="day" style="order:42">29</div>
                  <div class="day vacaciones" style="order:43">30</div>
                  <div class="day vacaciones" style="order:44">31</div>
                  <div class="day" style="order:45">&nbsp;</div>
                  <div class="day" style="order:46">&nbsp;</div>
                  <div class="day" style="order:47">&nbsp;</div>
                  <div class="day" style="order:48">&nbsp;</div>
                  <div class="day" style="order:49">&nbsp;</div>
                  <div class="day" style="order:50">&nbsp;</div>
                  <div class="day" style="order:51">&nbsp;</div>
                  <div class="day" style="order:52">&nbsp;</div>
                  <div class="day" style="order:53">&nbsp;</div>
                  <div class="day" style="order:54">&nbsp;</div>
                  <div class="day" style="order:55">&nbsp;</div>
                </div>
                <div class="month">
                  <h4>Enero</h4>
                  <div class="day OfWeek" style="order:0">D</div>
                  <div class="day OfWeek" style="order:1">L</div>
                  <div class="day OfWeek" style="order:2">M</div>
                  <div class="day OfWeek" style="order:3">M</div>
                  <div class="day OfWeek" style="order:4">J</div>
                  <div class="day OfWeek" style="order:5">V</div>
                  <div class="day OfWeek" style="order:6">S</div>
                  <div class="day" style="order:7">&nbsp;</div>
                  <div class="day" style="order:8">&nbsp;</div>
                  <div class="day" style="order:9">&nbsp;</div>
                  <div class="day" style="order:10">&nbsp;</div>
                  <div class="day" style="order:11">&nbsp;</div>
                  <div class="day" style="order:12">&nbsp;</div>
                  <div class="day" style="order:13">&nbsp;</div>
                  <div class="day" style="order:14">&nbsp;</div>
                  <div class="day" style="order:15">&nbsp;</div>
                  <div class="day" style="order:15">&nbsp;</div>
                  <div class="day suspencion" style="order:16">1</div>
                  <div class="day vacaciones" style="order:17">2</div>
                  <div class="day vacaciones" style="order:18">3</div>
                  <div class="day" style="order:19">4</div>
                  <div class="day" style="order:20">5</div>
                  <div class="day vacaciones" style="order:21">6</div>
                  <div class="day vacaciones" style="order:22">7</div>
                  <div class="day" style="order:23">8</div>
                  <div class="day" style="order:24">9</div>
                  <div class="day" style="order:25">10</div>
                  <div class="day" style="order:26">11</div>
                  <div class="day" style="order:27">12</div>
                  <div class="day" style="order:28">13</div>
                  <div class="day" style="order:29">14</div>
                  <div class="day" style="order:30">15</div>
                  <div class="day" style="order:31">16</div>
                  <div class="day" style="order:32">17</div>
                  <div class="day" style="order:33">18</div>
                  <div class="day" style="order:34">19</div>
                  <div class="day" style="order:35">20</div>
                  <div class="day" style="order:36">21</div>
                  <div class="day" style="order:37">22</div>
                  <div class="day" style="order:38">23</div>
                  <div class="day" style="order:39">24</div>
                  <div class="day" style="order:40">25</div>
                  <div class="day" style="order:41">26</div>
                  <div class="day" style="order:42">27</div>
                  <div class="day" style="order:43">28</div>
                  <div class="day" style="order:44">29</div>
                  <div class="day" style="order:45">30</div>
                  <div class="day consejo" style="order:46">31</div>
                  <div class="day" style="order:47">&nbsp;</div>
                  <div class="day" style="order:48">&nbsp;</div>
                  <div class="day" style="order:49">&nbsp;</div>
                  <div class="day" style="order:50">&nbsp;</div>
                  <div class="day" style="order:51">&nbsp;</div>
                  <div class="day" style="order:52">&nbsp;</div>
                  <div class="day" style="order:53">&nbsp;</div>
                  <div class="day" style="order:54">&nbsp;</div>
                </div>
                <div class="month">
                  <h4>Febrero</h4>
                  <div class="day OfWeek" style="order:0">D</div>
                  <div class="day OfWeek" style="order:1">L</div>
                  <div class="day OfWeek" style="order:2">M</div>
                  <div class="day OfWeek" style="order:3">M</div>
                  <div class="day OfWeek" style="order:4">J</div>
                  <div class="day OfWeek" style="order:5">V</div>
                  <div class="day OfWeek" style="order:6">S</div>
                  <div class="day" style="order:7">&nbsp;</div>
                  <div class="day" style="order:8">&nbsp;</div>
                  <div class="day" style="order:9">&nbsp;</div>
                  <div class="day " style="order:10">&nbsp;</div>
                  <div class="day" style="order:11">&nbsp;</div>
                  <div class="day" style="order:12">&nbsp;</div>
                  <div class="day" style="order:13">&nbsp;</div>
                  <div class="day" style="order:14">&nbsp;</div>
                  <div class="day" style="order:15">&nbsp;</div>
                  <div class="day" style="order:16">&nbsp;</div>
                  <div class="day" style="order:17">&nbsp;</div>
                  <div class="day" style="order:18">&nbsp;</div>
                  <div class="day" style="order:18">&nbsp;</div>
                  <div class="day" style="order:19">1</div>
                  <div class="day" style="order:20">2</div>
                  <div class="day suspencion" style="order:21">3</div>
                  <div class="day preinscripcion-sup preinscripcion-izq" style="order:22">4</div>
                  <div class="day preinscripcion-sup" style="order:23"><strong>5</strong></div>
                  <div class="day preinscripcion-sup" style="order:24">6</div>
                  <div class="day preinscripcion-sup preinscripcion-der" style="order:25">7</div>
                  <div class="day" style="order:26">8</div>
                  <div class="day" style="order:27">9</div>
                  <div class="day preinscripcion-izq preinscripcion-sup" style="order:28">10</div>
                  <div class="day preinscripcion-inf" style="order:29">11</div>
                  <div class="day preinscripcion-inf" style="order:30">12</div>
                  <div class="day preinscripcion-inf" style="order:31">13</div>
                  <div class="day preinscripcion-inf preinscripcion-der" style="order:32">14</div>
                  <div class="day" style="order:33">15</div>
                  <div class="day " style="order:34">16</div>
                  <div class="day preinscripcion-izq preinscripcion-inf preinscripcion-der" style="order:35">17</div>
                  <div class="day" style="order:36">18</div>
                  <div class="day" style="order:37">19</div>
                  <div class="day" style="order:38">20</div>
                  <div class="day" style="order:39">21</div>
                  <div class="day" style="order:40">22</div>
                  <div class="day" style="order:41">23</div>
                  <div class="day" style="order:42">24</div>
                  <div class="day" style="order:43">25</div>
                  <div class="day" style="order:44">26</div>
                  <div class="day" style="order:45">27</div>
                  <div class="day" style="order:46">28</div>
                  <div class="day" style="order:47">29</div>
                  <div class="day" style="order:48">&nbsp;</div>
                  <div class="day" style="order:49">&nbsp;</div>
                  <div class="day" style="order:50">&nbsp;</div>
                  <div class="day" style="order:51">&nbsp;</div>
                  <div class="day" style="order:52">&nbsp;</div>
                  <div class="day" style="order:53">&nbsp;</div>
                  <div class="day" style="order:54">&nbsp;</div>
                </div>
                <div class="month">
                  <h4>Marzo</h4>
                  <div class="day OfWeek" style="order:0">D</div>
                  <div class="day OfWeek" style="order:1">L</div>
                  <div class="day OfWeek" style="order:2">M</div>
                  <div class="day OfWeek" style="order:3">M</div>
                  <div class="day OfWeek" style="order:4">J</div>
                  <div class="day OfWeek" style="order:5">V</div>
                  <div class="day OfWeek" style="order:6">S</div>
                  <div class="day" style="order:12">&nbsp;</div>
                  <div class="day" style="order:13">&nbsp;</div>
                  <div class="day" style="order:14">&nbsp;</div>
                  <div class="day" style="order:15">&nbsp;</div>
                  <div class="day" style="order:16">&nbsp;</div>
                  <div class="day" style="order:17">&nbsp;</div>
                  <div class="day" style="order:18">&nbsp;</div>
                  <div class="day" style="order:19">1</div>
                  <div class="day" style="order:20">2</div>
                  <div class="day" style="order:21">3</div>
                  <div class="day" style="order:22">4</div>
                  <div class="day" style="order:23">5</div>
                  <div class="day" style="order:24">6</div>
                  <div class="day" style="order:25">7</div>
                  <div class="day" style="order:26">8</div>
                  <div class="day" style="order:27">9</div>
                  <div class="day" style="order:28">10</div>
                  <div class="day" style="order:29">11</div>
                  <div class="day" style="order:30">12</div>
                  <div class="day consejo" style="order:31">13</div>
                  <div class="day" style="order:32">14</div>
                  <div class="day" style="order:33">15</div>
                  <div class="day suspencion" style="order:34">16</div>
                  <div class="day" style="order:35">17</div>
                  <div class="day" style="order:36">18</div>
                  <div class="day" style="order:37">19</div>
                  <div class="day" style="order:38">20</div>
                  <div class="day" style="order:39"><strong>21</strong></div>
                  <div class="day" style="order:40">22</div>
                  <div class="day" style="order:41">23</div>
                  <div class="day" style="order:42">24</div>
                  <div class="day" style="order:43">25</div>
                  <div class="day boletas-izq boletas-inf boletas-sup" style="order:44">26</div>
                  <div class="day boletas-der boletas-inf boletas-sup" style="order:45">27</div>
                  <div class="day" style="order:46">28</div>
                  <div class="day" style="order:47">29</div>
                  <div class="day boletas-izq boletas-inf boletas-sup" style="order:48">30</div>
                  <div class="day boletas-der boletas-inf boletas-sup" style="order:49">31</div>
                  <div class="day" style="order:50">&nbsp;</div>
                  <div class="day" style="order:51">&nbsp;</div>
                  <div class="day" style="order:52">&nbsp;</div>
                  <div class="day" style="order:53">&nbsp;</div>
                  <div class="day" style="order:54">&nbsp;</div>
                  <div class="day" style="order:55">&nbsp;</div>
                  <div class="day" style="order:56">&nbsp;</div>
                  <div class="day" style="order:57">&nbsp;</div>
                  <div class="day" style="order:58">&nbsp;</div>
                  <div class="day" style="order:59">&nbsp;</div>
                  <div class="day" style="order:60">&nbsp;</div>
                </div>
                <div class="month">
                  <h4>Abril</h4>
                  <div class="day OfWeek" style="order:0">D</div>
                  <div class="day OfWeek" style="order:1">L</div>
                  <div class="day OfWeek" style="order:2">M</div>
                  <div class="day OfWeek" style="order:3">M</div>
                  <div class="day OfWeek" style="order:4">J</div>
                  <div class="day OfWeek" style="order:5">V</div>
                  <div class="day OfWeek" style="order:6">S</div>
                  <div class="day" style="order:7">&nbsp;</div>
                  <div class="day" style="order:8">&nbsp;</div>
                  <div class="day" style="order:9">&nbsp;</div>
                  <div class="day" style="order:10">&nbsp;</div>
                  <div class="day" style="order:11">&nbsp;</div>
                  <div class="day" style="order:12">&nbsp;</div>
                  <div class="day" style="order:13">&nbsp;</div>
                  <div class="day" style="order:14">&nbsp;</div>
                  <div class="day" style="order:14">&nbsp;</div>
                  <div class="day" style="order:14">&nbsp;</div>
                  <div class="day" style="order:15">1</div>
                  <div class="day" style="order:16">2</div>
                  <div class="day" style="order:17">3</div>
                  <div class="day" style="order:18">4</div>
                  <div class="day" style="order:19">5</div>
                  <div class="day vacaciones" style="order:20">6</div>
                  <div class="day vacaciones" style="order:21">7</div>
                  <div class="day vacaciones" style="order:22">8</div>
                  <div class="day vacaciones" style="order:23">9</div>
                  <div class="day vacaciones" style="order:24">10</div>
                  <div class="day" style="order:25">11</div>
                  <div class="day" style="order:26">12</div>
                  <div class="day vacaciones" style="order:27">13</div>
                  <div class="day vacaciones" style="order:28">14</div>
                  <div class="day vacaciones" style="order:29">15</div>
                  <div class="day vacaciones" style="order:30">16</div>
                  <div class="day vacaciones" style="order:31">17</div>
                  <div class="day" style="order:32">18</div>
                  <div class="day" style="order:33">19</div>
                  <div class="day" style="order:34">20</div>
                  <div class="day" style="order:35">21</div>
                  <div class="day" style="order:36">22</div>
                  <div class="day" style="order:37">23</div>
                  <div class="day" style="order:38">24</div>
                  <div class="day" style="order:39">25</div>
                  <div class="day" style="order:40">26</div>
                  <div class="day" style="order:41">27</div>
                  <div class="day" style="order:42">28</div>
                  <div class="day" style="order:43">29</div>
                  <div class="day" style="order:44">30</div>
                  <div class="day" style="order:45">&nbsp;</div>
                  <div class="day" style="order:46">&nbsp;</div>
                  <div class="day" style="order:47">&nbsp;</div>
                  <div class="day" style="order:48">&nbsp;</div>
                  <div class="day" style="order:49">&nbsp;</div>
                  <div class="day" style="order:50">&nbsp;</div>
                  <div class="day" style="order:51">&nbsp;</div>
                  <div class="day" style="order:52">&nbsp;</div>
                  <div class="day" style="order:53">&nbsp;</div>
                  <div class="day" style="order:54">&nbsp;</div>
                  <div class="day" style="order:55">&nbsp;</div>
                </div>
                <div class="month">
                  <h4>Mayo</h4>
                  <div class="day OfWeek" style="order:0">D</div>
                  <div class="day OfWeek" style="order:1">L</div>
                  <div class="day OfWeek" style="order:2">M</div>
                  <div class="day OfWeek" style="order:3">M</div>
                  <div class="day OfWeek" style="order:4">J</div>
                  <div class="day OfWeek" style="order:5">V</div>
                  <div class="day OfWeek" style="order:6">S</div>
                  <div class="day" style="order:7">&nbsp;</div>
                  <div class="day" style="order:8">&nbsp;</div>
                  <div class="day" style="order:9">&nbsp;</div>
                  <div class="day" style="order:10">&nbsp;</div>
                  <div class="day" style="order:11">&nbsp;</div>
                  <div class="day" style="order:12">&nbsp;</div>
                  <div class="day" style="order:13">&nbsp;</div>
                  <div class="day" style="order:14">&nbsp;</div>
                  <div class="day" style="order:15">&nbsp;</div>
                  <div class="day" style="order:16">&nbsp;</div>
                  <div class="day" style="order:16">&nbsp;</div>
                  <div class="day" style="order:16">&nbsp;</div>
                  <div class="day suspencion" style="order:17">1</div>
                  <div class="day" style="order:18">2</div>
                  <div class="day" style="order:19">3</div>
                  <div class="day consejo" style="order:20">4</div>
                  <div class="day suspencion" style="order:21">5</div>
                  <div class="day" style="order:22">6</div>
                  <div class="day" style="order:23">7</div>
                  <div class="day" style="order:24">8</div>
                  <div class="day" style="order:25">9</div>
                  <div class="day" style="order:26">10</div>
                  <div class="day" style="order:27">11</div>
                  <div class="day" style="order:28">12</div>
                  <div class="day" style="order:29">13</div>
                  <div class="day" style="order:30">14</div>
                  <div class="day suspencion" style="order:31">15</div>
                  <div class="day" style="order:32">16</div>
                  <div class="day" style="order:33">17</div>
                  <div class="day" style="order:34">18</div>
                  <div class="day" style="order:35">19</div>
                  <div class="day" style="order:36">20</div>
                  <div class="day" style="order:37">21</div>
                  <div class="day" style="order:38">22</div>
                  <div class="day" style="order:39">23</div>
                  <div class="day" style="order:40">24</div>
                  <div class="day" style="order:41">25</div>
                  <div class="day" style="order:42">26</div>
                  <div class="day" style="order:43">27</div>
                  <div class="day" style="order:44">28</div>
                  <div class="day" style="order:45">29</div>
                  <div class="day" style="order:46">30</div>
                  <div class="day" style="order:47">31</div>
                  <div class="day" style="order:48">&nbsp;</div>
                  <div class="day" style="order:49">&nbsp;</div>
                  <div class="day" style="order:50">&nbsp;</div>
                  <div class="day" style="order:51">&nbsp;</div>
                  <div class="day" style="order:52">&nbsp;</div>
                  <div class="day" style="order:53">&nbsp;</div>
                  <div class="day" style="order:54">&nbsp;</div>
                  <div class="day" style="order:55">&nbsp;</div>
                </div>
                <div class="month">
                  <h4>Junio</h4>
                  <div class="day OfWeek" style="order:0">D</div>
                  <div class="day OfWeek" style="order:1">L</div>
                  <div class="day OfWeek" style="order:2">M</div>
                  <div class="day OfWeek" style="order:3">M</div>
                  <div class="day OfWeek" style="order:4">J</div>
                  <div class="day OfWeek" style="order:5">V</div>
                  <div class="day OfWeek" style="order:6">S</div>
                  <div class="day" style="order:7">&nbsp;</div>
                  <div class="day" style="order:8">&nbsp;</div>
                  <div class="day" style="order:9">&nbsp;</div>
                  <div class="day" style="order:10">&nbsp;</div>
                  <div class="day" style="order:11">&nbsp;</div>
                  <div class="day" style="order:12">&nbsp;</div>
                  <div class="day" style="order:13">&nbsp;</div>
                  <div class="day" style="order:14">&nbsp;</div>
                  <div class="day" style="order:20">1</div>
                  <div class="day" style="order:21">2</div>
                  <div class="day" style="order:22">3</div>
                  <div class="day" style="order:23">4</div>
                  <div class="day consejo" style="order:24">5</div>
                  <div class="day" style="order:25">6</div>
                  <div class="day" style="order:26">7</div>
                  <div class="day" style="order:27">8</div>
                  <div class="day" style="order:28">9</div>
                  <div class="day" style="order:29">10</div>
                  <div class="day" style="order:30">11</div>
                  <div class="day" style="order:31">12</div>
                  <div class="day" style="order:32">13</div>
                  <div class="day" style="order:33">14</div>
                  <div class="day" style="order:34">15</div>
                  <div class="day" style="order:35">16</div>
                  <div class="day" style="order:36">17</div>
                  <div class="day" style="order:37">18</div>
                  <div class="day" style="order:38">19</div>
                  <div class="day" style="order:39">20</div>
                  <div class="day" style="order:40">21</div>
                  <div class="day" style="order:41">22</div>
                  <div class="day" style="order:42">23</div>
                  <div class="day" style="order:43">24</div>
                  <div class="day" style="order:44">25</div>
                  <div class="day" style="order:45">26</div>
                  <div class="day" style="order:46">27</div>
                  <div class="day" style="order:47">28</div>
                  <div class="day" style="order:48">29</div>
                  <div class="day" style="order:49">30</div>
                  <div class="day" style="order:50">&nbsp;</div>
                  <div class="day" style="order:51">&nbsp;</div>
                  <div class="day" style="order:52">&nbsp;</div>
                  <div class="day" style="order:53">&nbsp;</div>
                  <div class="day" style="order:54">&nbsp;</div>
                  <div class="day" style="order:55">&nbsp;</div>
                </div>
                <div class="month">
                  <h4>Julio</h4>
                  <div class="day OfWeek" style="order:0">D</div>
                  <div class="day OfWeek" style="order:1">L</div>
                  <div class="day OfWeek" style="order:2">M</div>
                  <div class="day OfWeek" style="order:3">M</div>
                  <div class="day OfWeek" style="order:4">J</div>
                  <div class="day OfWeek" style="order:5">V</div>
                  <div class="day OfWeek" style="order:6">S</div>
                  <div class="day" style="order:7">&nbsp;</div>
                  <div class="day" style="order:8">&nbsp;</div>
                  <div class="day" style="order:9">&nbsp;</div>
                  <div class="day" style="order:10">&nbsp;</div>
                  <div class="day" style="order:11">&nbsp;</div>
                  <div class="day" style="order:12">&nbsp;</div>
                  <div class="day" style="order:13">&nbsp;</div>
                  <div class="day" style="order:14">&nbsp;</div>
                  <div class="day" style="order:14">&nbsp;</div>
                  <div class="day" style="order:14">&nbsp;</div>
                  <div class="day boletas-izq boletas-inf boletas-sup" style="order:15">1</div>
                  <div class="day boletas-inf boletas-sup" style="order:16">2</div>
                  <div class="day boletas-der boletas-inf boletas-sup" style="order:17">3</div>
                  <div class="day" style="order:18">4</div>
                  <div class="day" style="order:19">5</div>
                  <div class="day fin boletas-izq boletas-inf boletas-sup" style="order:20">6</div>
                  <div class="day consejo" style="order:21">7</div>
                  <div class="day administrativa" style="order:22">8</div>
                  <div class="day administrativa" style="order:23">9</div>
                  <div class="day administrativa" style="order:24">10</div>
                  <div class="day receso" style="order:25">11</div>
                  <div class="day receso" style="order:26">12</div>
                  <div class="day receso" style="order:27">13</div>
                  <div class="day receso" style="order:28">14</div>
                  <div class="day receso" style="order:29">15</div>
                  <div class="day receso" style="order:30">16</div>
                  <div class="day receso" style="order:31">17</div>
                  <div class="day receso" style="order:32">18</div>
                  <div class="day receso" style="order:33">19</div>
                  <div class="day receso" style="order:34">20</div>
                  <div class="day receso" style="order:35">21</div>
                  <div class="day receso" style="order:36">22</div>
                  <div class="day receso" style="order:37">23</div>
                  <div class="day receso" style="order:38">24</div>
                  <div class="day receso" style="order:39">25</div>
                  <div class="day receso" style="order:40">26</div>
                  <div class="day receso" style="order:41">27</div>
                  <div class="day receso" style="order:42">28</div>
                  <div class="day receso" style="order:43">29</div>
                  <div class="day receso" style="order:44">30</div>
                  <div class="day receso" style="order:45">31</div>
                  <div class="day" style="order:46">&nbsp;</div>
                  <div class="day" style="order:47">&nbsp;</div>
                  <div class="day" style="order:48">&nbsp;</div>
                  <div class="day" style="order:49">&nbsp;</div>
                  <div class="day" style="order:50">&nbsp;</div>
                  <div class="day" style="order:51">&nbsp;</div>
                  <div class="day" style="order:52">&nbsp;</div>
                  <div class="day" style="order:53">&nbsp;</div>
                  <div class="day" style="order:54">&nbsp;</div>
                  <div class="day" style="order:55">&nbsp;</div>
                </div>
              </div>
            </section>
          </div>
          <div class="clearfix"></div>
          <div class="container hidden-xs">
            <h3>Acotaciones</h3>
            <hr>
            <div class="row">
              <div class="col-sm-4">
                <div class="nomenclatura">
                  <div class="indicador inicio"></div><span>Inicio de cursos</span>
                </div>
                <div class="nomenclatura">
                  <div class="indicador fin"></div><span>Fin de cursos</span>
                </div>
                <div class="nomenclatura">
                  <div class="indicador suspencion"></div><span>Suspensión de labores</span>
                </div>
                <div class="nomenclatura">
                  <div class="indicador receso"></div><span>Receso de clases</span>
                </div>
                <div class="nomenclatura">
                  <div class="indicador actualizacion"></div><span>Capacitación sobre la Nueva Escuela Mexicana</span>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="nomenclatura">
                  <div class="indicador consejo"></div><span>Consejo técnico escolar</span>
                </div>
                <div class="nomenclatura">
                  <div class="indicador boletas-inf boletas-sup boletas-der boletas-izq"></div><span>Periodo para la
                    entrega de boletas de evaluación a las madres y padres de familia y tutores</span>
                </div>
                <div class="nomenclatura">
                  <div class="indicador vacaciones"></div><span>Vacaciones</span>
                </div>
                <div class="nomenclatura">
                  <div class="indicador inscripcion"></div><span>Administración de inscripciones</span>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="nomenclatura">
                  <div class="indicador preinscripcion-der preinscripcion-izq preinscripcion-sup preinscripcion-inf">
                  </div><span>Periodo de preinscripción a preescolar, primer grado de primaria y primer grado de
                    secundaria para el ciclo escolar 2020-2021</span>
                </div>
                <div class="nomenclatura">
                  <div class="indicador administrativa"></div><span>Descarga administrativa fin de ciclo</span>
                </div>
              </div>
            </div>
          </div>
          <div class="container wbg fixed-bottom hidden-lg hidden-md hidden-sm">
            <h3 class="text-center navbar-inverse"><a data-toggle="collapse" href="#acotaciones" aria-expanded="false"
                aria-controls="acotaciones" class="btn btn-secondary">Acotaciones</a></h3>
            <div class="row collapse transbg" id="acotaciones">
              <div class="col-xs-6">
                <div class="nomenclatura">
                  <div class="indicador inicio"></div><span>Inicio de cursos</span>
                </div>
                <div class="nomenclatura">
                  <div class="indicador fin"></div><span>Fin de cursos</span>
                </div>
                <div class="nomenclatura">
                  <div class="indicador suspencion"></div><span>Suspensión de labores</span>
                </div>
                <div class="nomenclatura">
                  <div class="indicador receso"></div><span>Receso de clases</span>
                </div>
                <div class="nomenclatura">
                  <div class="indicador actualizacion"></div><span>Capacitación sobre la Nueva Escuela Mexicana</span>
                </div>
                <div class="nomenclatura">
                  <div class="indicador consejo"></div><span>Consejo técnico escolar</span>
                </div>
                <div class="nomenclatura">
                  <div class="indicador boletas-inf boletas-sup boletas-der boletas-izq"></div><span>Periodo para la
                    entrega de boletas de evaluación a las madres y padres de familia y tutores</span>
                </div>
              </div>
              <div class="col-xs-6">
                <div class="nomenclatura">
                  <div class="indicador vacaciones"></div><span>Vacaciones</span>
                </div>
                <div class="nomenclatura">
                  <div class="indicador inscripcion"></div><span>Administración de inscripciones</span>
                </div>
                <div class="nomenclatura">
                  <div class="indicador preinscripcion-der preinscripcion-izq preinscripcion-sup preinscripcion-inf">
                  </div><span>Periodo de preinscripción a preescolar, primer grado de primaria y primer grado de
                    secundaria para el ciclo escolar 2020-2021</span>
                </div>
                <div class="nomenclatura">
                  <div class="indicador administrativa"></div><span>Descarga administrativa fin de ciclo</span>
                </div>
              </div>
            </div>
          </div>
        </div>











      </section>

    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <div class="card ">
        <div class="card-header ">
          <h5 class="card-title">Email Statistics</h5>
          <p class="card-category">Last Campaign Performance</p>
        </div>
        <div class="card-body ">
          <canvas id="chartEmail"></canvas>
        </div>
        <div class="card-footer ">
          <div class="legend">
            <i class="fa fa-circle text-primary"></i> Opened
            <i class="fa fa-circle text-warning"></i> Read
            <i class="fa fa-circle text-danger"></i> Deleted
            <i class="fa fa-circle text-gray"></i> Unopened
          </div>
          <hr>
          <div class="stats">
            <i class="fa fa-calendar"></i> Number of emails sent
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-8">
      <div class="card card-chart">
        <div class="card-header">
          <h5 class="card-title">NASDAQ: AAPL</h5>
          <p class="card-category">Line Chart with Points</p>
        </div>
        <div class="card-body">
          <canvas id="speedChart" width="400" height="100"></canvas>
        </div>
        <div class="card-footer">
          <div class="chart-legend">
            <i class="fa fa-circle text-info"></i> Tesla Model S
            <i class="fa fa-circle text-warning"></i> BMW 5 Series
          </div>
          <hr />
          <div class="card-stats">
            <i class="fa fa-check"></i> Data information certified
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection