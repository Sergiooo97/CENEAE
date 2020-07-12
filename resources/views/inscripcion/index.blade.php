@extends('layouts.app')
@section('title', 'Registrar alumno | CENEAE')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card bounceInleft">
        <div class="card-header">
          <h4 class="card-title">Registrar nuevo alumno</h4>
        </div>
        <div class="card-body">
          <script src="{{asset('js/generarMatricula.js')}}" type="text/javascript"> </script>
          {!! Form::open(['route' => 'inscripcion.store', 'method'=>'POST']) !!}
          <div class="form-group">
            <h3>Datos del Alumno</h3>
            <div class="container">

              <div class="row">
                <div class="col-sm">
                  {!!Form::label('periodo','periodo',['class'=>'label'])!!}
                  <input id="periodo" class="form-control" placeholder="ejemplo: 1920">
                </div>
                <div class="col-sm">
                  {!!Form::label('lista','#lista',['class'=>'label'])!!}
                  <input id="nLista" class="form-control" placeholder="ejemplo: 01">
                </div>
                <div class="col-sm">
                </div>
                <div class="col-sm">
                </div>
              </div>
              <div class="row">
                <div class="col-sm">

                  {!!Form::label('id','id',['class'=>'label'])!!}
                  <input name="matricula"id="id_al" class="form-control" placeholder="matricula" readonly>

                </div>
                <div class="col-sm">
                  {!!Form::label('Nombres','Nombres',['class'=>'label'])!!}
                  {!!Form::text('nombres',NULL, ['class'=>'form-control','placeholder'=>'Nombres',
                  'autocomplete'=>'off'])!!}
                </div>
                <div class="col-sm">
                  {!!Form::label('Apellido_P','apellido Paterno',['class'=>'label'])!!}
                  {!!Form::text('apellido_paterno',null, ['class'=>'form-control','placeholder'=>'apellido Paterno',
                  'autocomplete'=>'off'])!!}
                </div>
                <div class="col-sm">
                  {!!Form::label('Apellido_M','apellido Materno',['class'=>'label'])!!}
                  {!!Form::text('apellido_materno',null, ['class'=>'form-control','placeholder'=>'apellido Materno',
                  'autocomplete'=>'off'])!!}
                </div>
              </div>

              <div class="row">
                <div class="col-sm">
                  {!!Form::label('Edad','Edad',['class'=>'label'])!!}
                  {!!Form::text('edad',null, ['class'=>'form-control','placeholder'=>'Edad', 'autocomplete'=>'off'])!!}
                </div>
                <div class="col-sm">
                  {!!Form::label('Fecha_de_nacimiento','Fecha de nacimiento',['class'=>'label'])!!}
                  <input name="fecha_de_nacimiento" id="fecha_de_nacimiento" class="form-control" placeholder="fecha de nacimiento">
                </div>
                <div class="col-sm">
                  {!!Form::label('CURP','CURP',['class'=>'label'])!!}
                  <input name="curp" id="curp_al" class="form-control" placeholder="CURP" autocomplete="off" maxlength="11"
                    required>
                </div>
                <div class="col-sm">
                  <div class="row">
                    <div class="col-sm">
                      {!!Form::label('Grado','Grado',['class'=>'label'])!!}
                      <select name="grado" class="form-control" id="grado">
                        <option value="">Seleccionar</option>
                        <option value="1">1°</option>
                        <option value="2">2°</option>
                        <option value="3">3°</option>
                        <option value="4">4°</option>
                        <option value="5">5°</option>
                        <option value="6">6°</option>
                      </select>

                    </div>
                    <div class="col-sm">
                      {!!Form::label('Grupo','Grupo',['class'=>'label'])!!}
                      <select name="grupo" class="form-control" id="grupo">
                        <option value="">Seleccionar</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm">
                  <h3>Datos del tutor</h3>
                </div>
              </div>
              <div class="row">

                <div class="col-sm">
                  {!!Form::label('id','id',['class'=>'label'])!!}
                  <input name="id_tutor"id="id_tu" class="form-control" placeholder="id tutor" readonly>
                </div>
                <div class="col-sm">
                  {!!Form::label('Nombres','Nombres',['class'=>'label'])!!}
                  <input name="nombres_tutor"id="nombres_tutor" class="form-control" placeholder="nombres" >
                </div>
                <div class="col-sm">
                  {!!Form::label('apellido_paterno_tutor','apellido Paterno',['class'=>'label'])!!}
                  <input name="apellido_paterno_tutor"id="apellido_paterno_tutor" class="form-control" placeholder="apellido paterno_tutor" > 
                 
                </div>
                <div class="col-sm">
                  {!!Form::label('Apellido_M','apellido Materno',['class'=>'label'])!!}
                  <input name="apellido_materno_tutor"id="apellido_materno_tutor" class="form-control" placeholder="apellido paterno_tutor" > 

                </div>
              </div>

              <div class="row">
                <div class="col-sm">
                  {!!Form::label('Direccion','Direccion',['class'=>'label'])!!}
                  <input name="direccion_tutor" id="direccion_tutor" class="form-control" placeholder="direccion del tutor" > 
                </div>
                <div class="col-sm">
                  {!!Form::label('Escolaridad','Escolaridad',['class'=>'label'])!!}
                  <input name="escolaridad_tutor" id="escolaridad_tutor" class="form-control" placeholder="escolaridad del tutor" > 
                </div>
                <div class="col-sm">
                  {!!Form::label('CURP','CURP',['class'=>'label'])!!}
                  <input name="curp_tutor" id="curp_tutor" class="form-control" placeholder="curp del tutor" > 

                  
                </div>
                <div class="col-sm">
                  {!!Form::label('telefono','telefono',['class'=>'label'])!!}
                  <input name="telefono_tutor" id="telefono_tutor" class="form-control" placeholder="telefono del tutor" > 

                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="form-group container">
          {!!Form::submit('Registrar',['class'=>'btn btn-primary', 'onclick' => 'ConfirmDemo()'])!!}
        </div>
      </div>

    </div>
  </div>
</div>
</div>
</div>


{!! Form::close() !!}




@endsection