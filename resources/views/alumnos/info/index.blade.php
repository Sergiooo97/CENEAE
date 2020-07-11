@extends('layouts.app')
@section('title', 'Registrar alumno | CENEAE')

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
              <h5 class="title">Sergio Eb Gallegos</h5>
            </a>
            <p class="description">
              @16070021
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
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Calificaciones</h4>
        </div>
        <div class="card-body">
          <ul class="list-unstyled team-members">
            <li>
              <div class="row">
                <div class="col-md-2 col-2">
                  <div class="avatar">
                    <img src="../assets/img/faces/ayo-ogunseinde-2.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                  </div>
                </div>
                <div class="col-md-7 col-7">
                  DJ Khaled
                  <br />
                  <span class="text-muted">
                    <small>Offline</small>
                  </span>
                </div>
                <div class="col-md-3 col-3 text-right">
                  <btn class="btn btn-sm btn-outline-success btn-round btn-icon"><i class="fa fa-envelope"></i></btn>
                </div>
              </div>
            </li>
            <li>
              <div class="row">
                <div class="col-md-2 col-2">
                  <div class="avatar">
                    <img src="../assets/img/faces/joe-gardner-2.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                  </div>
                </div>
                <div class="col-md-7 col-7">
                  Creative Tim
                  <br />
                  <span class="text-success">
                    <small>Available</small>
                  </span>
                </div>
                <div class="col-md-3 col-3 text-right">
                  <btn class="btn btn-sm btn-outline-success btn-round btn-icon"><i class="fa fa-envelope"></i></btn>
                </div>
              </div>
            </li>
            <li>
              <div class="row">
                <div class="col-md-2 col-2">
                  <div class="avatar">
                    <img src="../assets/img/faces/clem-onojeghuo-2.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                  </div>
                </div>
                <div class="col-ms-7 col-7">
                  Flume
                  <br />
                  <span class="text-danger">
                    <small>Busy</small>
                  </span>
                </div>
                <div class="col-md-3 col-3 text-right">
                  <btn class="btn btn-sm btn-outline-success btn-round btn-icon"><i class="fa fa-envelope"></i></btn>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <div class="col-md-8">
      {!! Form::open(['route' => 'inscripcion.store', 'method'=>'POST']) !!}

      <div class="card card-user">
        <div class="card-header">
          <h5 class="card-title">Editar perfil</h5>
        </div>
        <div class="card-body">
          <form>
            <div class="row">
              <div class="col-md-5 pr-1">
                <div class="form-group">
                  <label>Matricula (disabled)</label>
                  <input type="text" class="form-control" disabled="" placeholder="Company" value="16070021">
                </div>
              </div>
              <div class="col-md-3 px-1">
                <div class="form-group">
                  <label>Usuario</label>
                  <input type="text" class="form-control" placeholder="Username" value="sergiogallegoz">
                </div>
              </div>
              <div class="col-md-4 pl-1">
                <div class="form-group">
                  <label for="exampleInputEmail1">CURP</label>
                  <input type="email" class="form-control" placeholder="Curp">
                </div>
              </div>
            </div>
            
             <div class="row">
              <div class="col-md-5 pr-1">
                <div class="form-group">
                  <label>Nombres</label>
                  <input type="text" class="form-control"  placeholder="Company" value="Sergio">
                </div>
              </div>
              <div class="col-md-3 px-1">
                <div class="form-group">
                  <label>Apellido paterno</label>
                  <input type="text" class="form-control" placeholder="apellido1" value="Eb">
                </div>
              </div>
              <div class="col-md-4 pl-1">
                <div class="form-group">
                  <label for="exampleInputEmail1">Apellido paterno</label>
                  <input type="text" class="form-control" placeholder="Apellido paterno" value="Gallegos">
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
                  <input type="text" class="form-control" placeholder="Dirección" value="Calle 16x17y19">
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
</div>
</div>
@endsection