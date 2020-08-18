@extends('layouts.app')

@section('title', 'Docentes | CENEAE')

@section('content')
<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="registro-maestro-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
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
                  <input name="nombres"id="nombres" class="form-control" placeholder="nombres" >

                 
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
                  {!!Form::label('Fecha_de_nacimiento','Fecha de nacimiento',['class'=>'label'])!!}
                  <input type="date" name="birthday" id="birthday" value=""  id="fecha_de_nacimiento" class="form-control" placeholder="fecha de nacimiento">
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
                  <input type="text" name="age" id="age" value="" class="form-control" placeholder="Edad" autocomplete="off">
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
                  {!!Form::label('direccion','Dirección',['class'=>'label'])!!}
                  {!!Form::text('direccion',null, ['class'=>'form-control','placeholder'=>'direccion', 'autocomplete'=>'off'])!!}
                </div>
                <div class="col-sm">
                  {!!Form::label('cp',' Código postal',['class'=>'label'])!!}
                  <input name="cp" id="cp" type="number" class="form-control" placeholder="Código postal" maxlength="5">
                </div>
                <div class="col-sm">
                  {!!Form::label('municipio','Municipio',['class'=>'label'])!!}
                  <input name="municipio" id="municipio" class="form-control" placeholder="Municipio" autocomplete="off" maxlength="11"
                    required>
                </div>
                <div class="col-sm">
                  {!!Form::label('quiero_ser','De grande quiero ser...',['class'=>'label'])!!}
                  <input name="quiero_ser" id="quiero_ser" class="form-control" placeholder="De grande quiero ser" autocomplete="off">
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
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
        <button type="button" class="btn btn-success">Registrar</button>
      </div>
    </div>
  </div>
</div>

<div class="notificationsss bounce ">
  <div class="container  ">
    <div class="row">
      <div class="col-md-12">
        <div class="card bounceInleft">
          <div class="card-header">
            <h4 class="card-title">Docentes del CENEAE</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <!-------------------------------------------empieza tabla ---------------------------------->

              <table class="table ">
                <thead class=" text-primary">
                  <th>
                    Clave
                  </th>
                  <th>
                    Nombres
                  </th>
                  <th>
                    CURP
                  </th>
                  <th>
                    Dirección
                  </th>
                  <th>
                    RFC
                  </th>
                  <th>
                    Teléfono
                  </th>

                  <th>

                  </th>
                </thead>
                <tbody>
                  @foreach ($docentes as $docente)


                  <tr>
                    <td>
                      {{$docente->matricula}}
                    </td>
                    <td>
                      {{$docente->nombres}}
                    </td>
                    <td>
                      {{$docente->rfc}}
                    </td>
                    <td>
                      {{$docente->direccion}}
                    </td>
                    <td>
                      {{$docente->telefono}}
                    </td>
                    <td>
                      (999) 329-2434
                    </td>

                    <td>
                      <button class="btn btn-primary">Detalles</button>
                    </td>
                  </tr>
                  @endforeach


                </tbody>
              </table>
              <!-------------------------------------------termina tabla ---------------------------------->


            </div>
          </div>
        </div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#registro-maestro-modal">
          Registrar Maestro
        </button>
      </div>
    </div>

    @endsection