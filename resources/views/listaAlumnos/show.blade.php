@extends('layouts.app')

@section('title', "info de {$alumno->nombres}")
<style>
  table {
   width: 100%;
  border-radius: 15px;
}
th, td {
   width: 10%;
   text-align: left;
   vertical-align: top;
   border: 1px solid rgba(82, 82, 82, 0.455);
   padding: 0.3em;
}
thead{
  background: rgb(149, 149, 149);
  color: #ffffff;
}
</style>
@section('content') 
<div class="container">


<div class="content">
  <div class="row">
    <div class="col-md-4">
      <div class="card card-user">
        <div class="image">
          <img src="{{asset('img/nat.jpg')}}" width="" alt="...">
        </div>
       
        <div class="card-body">
          <div class="author">
            <a href="#">
           
                  
              
              <img class="avatar border-gray" src="{{asset('img/yo.jpg')}}" alt="...">
              <h5 class="title">{{$alumno->nombres}}</h5>
            </a>
           
            <p class="description">
              @ {{$alumno->matricula}}
            </p>
          </div>
          <p class="description text-center">
            "Nothing is impossible"
           
          </p>
        </div>
        <div class="card-footer">
          <hr>
          <div class="button-container">
            <div class="row">
              <div class="col-lg-3 col-md-6 col-6 ml-auto">
                <h5>12
                  <br>
                  <small>Files</small>
                </h5>
              </div>
             
              <div class="col-lg-6 mr-auto">
                <h5>325 $
                  <br>
                  <small>nt dolares</small>
                </h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    
    </div>

    <div class="col-md-8">
      {!! Form::open(['route' => 'inscripcion.store', 'method'=>'POST']) !!}

      <div class="card card-user">
        <div class="card-header">
          <h5 class="card-title">información de alumno</h5>
        </div>
        <div class="card-body">
          <form>
            <div class="row">
              <div class="col-md-5 pr-1">
                <div class="form-group">
                  <label>Matricula (disabled)</label>
                  <input type="text" class="form-control" disabled="" placeholder="Company" value="{{$alumno->matricula}}">
                </div>
              </div>
              <div class="col-md-3 px-1">
                <div class="form-group">
                  <label>Usuario</label>
                  <input type="text" class="form-control" placeholder="Username" value="{{$alumno->nombres}}">
                </div>
              </div>
              <div class="col-md-4 pl-1">
                <div class="form-group">
                  <label for="exampleInputEmail1">CURP</label>
                  <input type="email" class="form-control" placeholder="{{$alumno->curp}}">
                </div>
              </div>
            </div>
            
             <div class="row">
              <div class="col-md-5 pr-1">
                <div class="form-group">
                  <label>Nombres</label>
                  <input type="text" class="form-control"  placeholder="Company" value="{{$alumno->nombres}}">
                </div>
              </div>
              <div class="col-md-3 px-1">
                <div class="form-group">
                  <label>Apellido paterno</label>
                  <input type="text" class="form-control" placeholder="apellido1" value="{{$alumno->apellido_paterno}}">
                </div>
              </div>
              <div class="col-md-4 pl-1">
                <div class="form-group">
                  <label for="exampleInputEmail1">Apellido paterno</label>
                  <input type="text" class="form-control" placeholder="Apellido paterno" value="{{$alumno->apellido_materno}}">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-5 pr-1">
                <div class="form-group">
                  <div class="row">
                    <div style="padding-right:2px;" class="col-sm">
                    {!!Form::label('Dia','Dia',['class'=>'label'])!!}
                    {!! Form::select('Dia',['1' => '1','2'=>'2','3'=>'3','4'=>'4'],'1', ['class'=>'form-control ','placeholder'=>'Dia']) !!}
                  </div>     
                    <div style="padding-right:2px;" class="col-sm">
                      {!!Form::label('Mes','Mes',['class'=>'label'])!!}
                      {!! Form::select('Mes',['1' => 'enero','2'=>'febrero','3'=>'Marzo'],'A', ['class'=>'form-control','placeholder'=>'Mes']) !!}
                  </div>   
                  <div  class="col-sm">
                    {!!Form::label('Año','Año',['class'=>'label'])!!}
                    {!!Form::text('Año',null, ['class'=>'form-control','placeholder'=>'Año', 'autocomplete'=>'off'])!!} 
                </div>      
                </div>     
                </div>
              </div>
              <div class="col-md-3 px-1">
                <div class="form-group">
                  <label>Municipio</label>
                  <input type="text" class="form-control" placeholder="Municipio" value="Cacalchén, Yucatán.">
                </div>
              </div>
              <div class="col-md-4 pl-1">
                <div class="form-group">
                  <label for="exampleInputEmail1">Dirección</label>
                  <input type="text" class="form-control" placeholder="Dirección" value="{{$alumno->direccion_tutor}}">
                </div>
              </div>
            </div>




            <div class="row">
              <div class="update ml-auto mr-auto">
                <button type="submit" class="btn btn-primary btn-round">Actualizar perfil</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      {!! Form::close() !!}

    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Calificaciones</h4>
        </div>
        <div class="card-body">
          <!------------------- TABLA DE CALIFICACIONES------------------------------------->
          <div class="table-responsive">
            <table class="col-md-12" class="table-bordered">
                <thead >
                <th scope="row">UNIDADES CURRICULARES</th>
                <th>PERIODOS DE
                  EVALUACIÓN</th>
                <th>1er</th>
                <th>2°</th>
                <th>3er</th>
                <th>PROMEDIO FINAL</th>

                </thead>
              <tr>
                <th  rowspan="2">ESPAÑOL</th>
                <td>Nivel de desempeño</td>
                <td>100</td>
                <td>100</td>
                <td>100</td>
                <td>100</td>

              </tr>
              <tr>
                <td>Calificación</td>
                <td>100</td>
                <td>100</td>
                <td>100</td>
                <td>100</td>

              </tr>
              <tr>
                <th rowspan="2">Matemáticas</th>
                <td>Nivel de desempeño</td>
                <td>100</td>
                <td>100</td>
                <td>100</td>
                <td>100</td>

              </tr>
              <tr>
                <td>Calificación</td>
                <td>100</td>
                <td>100</td>
                <td>100</td>
                <td>100</td>

              </tr>

              <tr>
                <th rowspan="2">Inglés</th>
                <td>Nivel de desempeño</td>
                <td>100</td>
                <td>100</td>
                <td>100</td>
                <td>100</td>

              </tr>
              <tr>
                <td>Calificación</td>
                <td>100</td>
                <td>100</td>
                <td>100</td>
                <td>100</td>

              </tr>
              <tr>
                <th rowspan="2">Conocimiento del medio</th>
                <td>Nivel de desempeño</td>
                <td>100</td>
                <td>100</td>
                <td>100</td>
                <td>100</td>

              </tr>
              <tr>
                <td>Calificación</td>
                <td>100</td>
                <td>100</td>
                <td>100</td>
                <td>100</td>

              </tr>
              <tr>
                <th rowspan="2">PROMEDIO FINAL</th>
                <td>Nivel de desempeño</td>
                <td>100</td>
                <td>100</td>
                <td>100</td>
                <td>100</td>

              </tr>
              <tr>
                <td>Calificación</td>
                <td>100</td>
                <td>100</td>
                <td>100</td>
                <td>100</td>
              </tr>
            </table>
            <!------------------- FIN TABLA DE CALIFICACIONES------------------------------------->
            <table style="margin-top:1em !important;" class="col-md-12" class="table-bordered">

              
            
            <tr>
              <th>ARTES</th>
              <td>Nivel de desempeño</td>
              <td>100</td>
              <td>100</td>
              <td>100</td>
              <td>100</td>

            </tr>
            <tr>
              <th>EDUCACIÓN  SOCIOEMOCIONAL</th>
              <td>Nivel de desempeño</td>
              <td>100</td>
              <td>100</td>
              <td>100</td>
              <td>100</td>

            </tr>
            <tr>
              <th>EDUCACIÓN FÍSICA</th>
              <td>Nivel de desempeño</td>
              <td>100</td>
              <td>100</td>
              <td>100</td>
              <td>100</td>

            </tr>
        
            <tr>
              <th rowspan="2">PROMEDIO FINAL</th>
              <td>Nivel de desempeño</td>
              <td>100</td>
              <td>100</td>
              <td>100</td>
              <td>100</td>

            </tr>
            <tr>
              <td>Calificación</td>
              <td>100</td>
              <td>100</td>
              <td>100</td>
              <td>100</td>
            </tr>
          </table>
          <!-------____-------------------------------------------->
            <!------------------- FIN TABLA DE CALIFICACIONES------------------------------------->
            <table style="margin-top:1em !important;" class="col-md-12" class="table-bordered">

              
            
              <tr>
                <th>AUTONOMÍA CURRICULAR</th>
                <td>Nivel de desempeño</td>
                <td>100</td>
                <td>100</td>
                <td>100</td>
                <td>100</td>
          
              <tr>
                <th rowspan="2">PROMEDIO FINAL</th>
                <td>Nivel de desempeño</td>
                <td>100</td>
                <td>100</td>
                <td>100</td>
                <td>100</td>

              </tr>
              <tr>
                <td>Calificación</td>
                <td>100</td>
                <td>100</td>
                <td>100</td>
                <td>100</td>
              </tr>
            </table>
            <!-------____-------------------------------------------->

          </div>

        </div>
      </div>
    </div>

  </div>
</div>
</div>
@endsection