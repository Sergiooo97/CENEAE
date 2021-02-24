@extends('layouts.app')
@section('title', 'Registrar alumno | CENEAE')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card bounceInleft">
        <div class="card-header">
          <h4 class="card-title">actualizar datos del alumno</h4>
        </div>
        <div class="card-body">
          <script src="{{asset('js/generarMatricula.js')}}" type="text/javascript"> </script>
        <form method="POST" action="{{route('alumnos.update', $alumno->id)}}">
          @csrf @method('PATCH')
          <div class="form-group">
            <h3>Datos del Alumno</h3>
            <div class="container">
              <div class="row">
                <div class="col-sm-3">

                  {!!Form::label('id','id',['class'=>'label'])!!}
                <input name="matricula"id="id_al" class="form-control" value="{{$alumno->matricula}}"  readonly>

                </div>
               
              </div>
              <div class="row">
               
                <div class="col-sm-3">
                  {!!Form::label('Apellido_P','A. Paterno',['class'=>'label'])!!}
                  <input name="apellido_paterno" id="apellido_paterno" class="form-control" value="{{$alumno->apellido_paterno}}" >

                </div>
                <div class="col-sm-3">
                  {!!Form::label('Apellido_M','A. materno',['class'=>'label'])!!}
                  <input name="apellido_materno" id="apellido_materno" class="form-control" value="{{$alumno->apellido_materno}}" >

                </div>
                <div class="col-sm-6">
                  {!!Form::label('Nombres','Nombre (s) del alumno',['class'=>'label'])!!}
                  <input name="nombres"id="nombres" class="form-control" value="{{$alumno->nombres}}" >
                </div>

              </div>
              <div class="row">
                <div class="col-sm">
                  {!!Form::label('sexo','sexo',['class'=>'label'])!!}
                  <select name="sexo" class="form-control" id="grupo">
                    <option value="H">Masculino</option>
                    <option value="F">Femenino</option>
                  </select>
                </div>
                <div class="col-sm">
                  {!!Form::label('estatura',' Estatura',['class'=>'label'])!!}
                  <input name="estatura" id="estatura" type="number" class="form-control" placeholder="00 Kg" value="{{$alumno->estatura}}" maxlength="5">
                </div>
                <div class="col-sm">
                  {!!Form::label('peso','Peso',['class'=>'label'])!!}
                  <input name="peso" id="peso" class="form-control" type="number" placeholder="Peso" autocomplete="off" value="{{$alumno->peso}}" maxlength="11"
                    required>
                </div>
                <div class="col-sm">
                  {!!Form::label('Edad','Edad',['class'=>'label'])!!}
                  <input type="text" name="age" id="age"  class="form-control" value="{{$alumno->edad}}" autocomplete="off">
                </div>
              </div>
              <div class="row">

                <div class="col-sm">
                  {!!Form::label('Fecha_de_nacimiento','Fecha de nacimiento',['class'=>'label'])!!}
                  <input id="birthday" name="fecha_de_nacimiento" type="date" class="form-control" placeholder="Fecha de nacimiento" value="{{$alumno->fecha_de_nacimiento}}">
                <script>
                  $(function(){
            $('#birthday').on('change', calcularEdad);
        });

        function calcularEdad() {

            fecha = $(this).val();
            var hoy = new Date();
            var cumpleanos = new Date(fecha);
            var edad = hoy.getFullYear() - cumpleanos.getFullYear();
            var m = hoy.getMonth() - cumpleanos.getMonth();

            if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
                edad--;
            }
            $('#age').val(edad);
        }
                </script>
                </div>
                <div class="col-sm">
                  {!!Form::label('escuela_procedencia','Escuela de procedencia',['class'=>'label'])!!}
                  <input name="escuela_procedencia" id="escuela_procedencia" class="form-control" placeholder="Escuela de procedencia" autocomplete="off" value="{{$alumno->escuela_procedencia}}" maxlength="11"
                    required>
                </div>
                <div class="col-sm">
                  {!!Form::label('CURP','CURP',['class'=>'label'])!!}
                  <input name="curp" id="curp_al" class="form-control" value="{{$alumno->curp}}" autocomplete="off" maxlength="11"
                    required>
                </div>
                <div class="col-sm">
                  <div class="row">
                    <div class="col-sm">
                      {!!Form::label('Grupo','Grupo',['class'=>'label'])!!}
                      <input name="" id="" class="form-control" autocomplete="off" value="{{ $grupo_id->nombre }}" maxlength="11"
                      required readonly>
                    
                       
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="row">
                <div class="col-sm">
                  {!!Form::label('direccion','Dirección',['class'=>'label'])!!}
                  <input name="direccion" id="direccion" class="form-control" value="{{$alumno->direccion}}" autocomplete="off" maxlength="11">

                </div>
                <div class="col-sm">
                  {!!Form::label('cp',' Código postal',['class'=>'label'])!!}
                  <input name="cp" id="cp" type="number" class="form-control" placeholder="Código postal" value="{{$alumno->cp}}" maxlength="5">
                </div>
                <div class="col-sm">
                  {!!Form::label('municipio','Municipio',['class'=>'label'])!!}
                  <input name="municipio" id="municipio" class="form-control" placeholder="Municipio" autocomplete="off" value="{{$alumno->municipio}}" maxlength="11"
                    required>
                </div>
                <div class="col-sm">
                  
                </div>
              </div>
              
              <div class="row">
                <div class="col-sm">
                  {!!Form::label('fecha_ingreso','Fecha de ingreso',['class'=>'label'])!!}
                  <input name="fecha_ingreso" id="fecha_ingreso" class="form-control" type="date" autocomplete="off" value="{{$alumno->fecha_ingreso}}" maxlength="11"
                    required readonly>
                </div>
                <div class="col-sm">
                  {!!Form::label('regularidad',' Regularidad',['class'=>'label'])!!}
                  <input name="regularidad" id="regularidad" type="number" class="form-control"  value="{{$alumno->regularidad}}" maxlength="5" readonly>
                </div>
                <div class="col-sm">
                  {!!Form::label('status','Status',['class'=>'label'])!!}
                  <input name="status_id" id="status_id" class="form-control" autocomplete="off" value="{{$alumno->status_id}}" maxlength="11"
                    required readonly>
                </div>
                <div class="col-sm">

                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="form-group container">
          <button id="Registrar" type="submit" class="btn btn-primary" onclick="ConfirmDemo()">Actualizar</button>
        </div>
      </div>

    </div>
  </div>
</div>
</div>
</div>

</form>




@endsection
