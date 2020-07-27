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
                <div class="col-sm">

                  {!!Form::label('id','id',['class'=>'label'])!!}
                <input name="matricula"id="id_al" class="form-control" value="{{$alumno->matricula}}"  >

                </div>
                <div class="col-sm">
                  {!!Form::label('Nombres','Nombres',['class'=>'label'])!!}
                  <input name="nombres"id="nombres" class="form-control" value="{{$alumno->nombres}}" >


                </div>
                <div class="col-sm">
                  {!!Form::label('Apellido_P','apellido Paterno',['class'=>'label'])!!}
                  <input name="apellido_paterno" id="apellido_paterno" class="form-control" value="{{$alumno->apellido_paterno}}" >

                </div>
                <div class="col-sm">
                  {!!Form::label('Apellido_M','apellido Materno',['class'=>'label'])!!}
                  <input name="apellido_materno" id="apellido_materno" class="form-control" value="{{$alumno->apellido_materno}}" >

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
                  {!!Form::label('Edad','Edad',['class'=>'label'])!!}
                  <input type="text" name="age" id="age"  class="form-control" value="{{$alumno->edad}}" autocomplete="off">
                </div>
                <div class="col-sm">
                  {!!Form::label('CURP','CURP',['class'=>'label'])!!}
                  <input name="curp" id="curp_al" class="form-control" value="{{$alumno->curp}}" autocomplete="off" maxlength="11"
                    required>
                </div>
                <div class="col-sm">
                  <div class="row">
                    <div class="col-sm">
                      {!!Form::label('Grado','Grado',['class'=>'label'])!!}
                      <select  name="grado" class="form-control" id="grado">
                        <option value="{{$alumno->grado}}">{{$alumno->grado}}</option>
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
                      <select  name="grupo" class="form-control" id="grupo">
                        <option value="{{$alumno->grupo}}">{{$alumno->grupo}}</option>
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
                  {!!Form::label('quiero_ser','De grande quiero ser...',['class'=>'label'])!!}
                  <input name="quiero_ser" id="quiero_ser" class="form-control" placeholder="De grande quiero ser" value="{{$alumno->quiero_ser}}" autocomplete="off">
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
