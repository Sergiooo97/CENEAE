@extends('layouts.app')

@section('title', 'Docentes | CENEAE')
<style>
  .modal-dialog {
  width: 100% !important;
  height: 100%;
  margin: 0;
  padding: 0;
}

.modal-content {
  height: auto;
  min-height: 100% !important;
  border-radius: 0;
}
</style>
@section('content')
<!-- Modal -->
<div style="width: 100%" class="modal fade bd-example-modal-lg" id="registro-maestro-modal" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div style="width: 100%" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar nuevo docente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="{{ route('docentes.store') }}">
        @csrf
          <div class="form-group">
            <h3>Datos personales</h3>
            <div class="container">
              
              <div class="row">
                <div class="col-sm">
                  <label for="nombres" >Nombres</label>
                  <input name="nombres" id="nombres" class="form-control" placeholder="nombres">
                </div>
                <div class="col-sm">
                  <label for="apellido_paterno" >Apellido paterno</label>
                  <input name="apellido_paterno" id="apellido_paterno" class="form-control" placeholder="apellido paterno">
                </div>
                <div class="col-sm">
                  <label for="apellido_materno" >Apellido materno</label>
                  <input name="apellido_materno" id="apellido_materno" class="form-control" placeholder="apellido materno">
                </div>
              </div>

              <div class="row">

                <div class="col-sm">
                  <label for="Fecha_de_nacimiento">Fecha de nacimiento</label>
                  <input type="date" name="birthday" id="birthday" value="" id="fecha_de_nacimiento"
                    class="form-control" placeholder="fecha de nacimiento">
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
                  <input type="text" name="age" id="age" value="" class="form-control" placeholder="Edad"
                    autocomplete="off">
                </div>
                <div class="col-sm">
                  {!!Form::label('CURP','CURP',['class'=>'label'])!!}
                  <input name="curp" id="curp_al" class="form-control" placeholder="CURP" autocomplete="off"
                    maxlength="11" required>
                </div>
              </div>
              <div class="row">
                <div class="col-sm">
                  {!!Form::label('direccion','Dirección',['class'=>'label'])!!}
                  {!!Form::text('direccion',null, ['class'=>'form-control','placeholder'=>'direccion',
                  'autocomplete'=>'off'])!!}
                </div>
                <div class="col-sm">
                  {!!Form::label('cp',' Código postal',['class'=>'label'])!!}
                  <input name="cp" id="cp" type="number" class="form-control" placeholder="Código postal" maxlength="5">
                </div>
                <div class="col-sm">
                  {!!Form::label('municipio','Municipio',['class'=>'label'])!!}
                  <input name="municipio" id="municipio" class="form-control" placeholder="Municipio" autocomplete="off"
                    maxlength="11" required>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <label for="email" >Email</label>
                  <input name="email" id="email" class="form-control" placeholder="Email">
                </div>
                <div class="col-sm-6">
                  <label for="telefono" >Teléfono</label>
                  <input name="telefono" id="telefono" class="form-control" placeholder="telefono">
                </div>
              </div>
              <div class="row">
                <div class="col-sm">
                  <h3>Datos academicos</h3>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <label for="matricula" >Matricula</label>
                  <input name="matricula" id="id_al" class="form-control" placeholder="matricula">
                </div>
                <div class="col-sm-6">
                  <label for="rfc" >RFC</label>
                  <input name="rfc" id="rfc" class="form-control" placeholder="rfc">
                </div>
              </div>
              <div class="row">
                <div class="col-sm">
                  {!!Form::label('cedula','cedula',['class'=>'label'])!!}
                  <input name="cedula" id="cedula" class="form-control" placeholder="cedula" readonly>
                </div>
                <div class="col-sm">
                  {!!Form::label('titulo','titulo',['class'=>'label'])!!}
                  <input name="titulo" id="titulo" class="form-control" placeholder="Titulo">
                </div>
                <div class="col-sm">
                  {!!Form::label('casa_de_estudios','casa de estudios',['class'=>'label'])!!}
                  <input name="casa_de_estudios" id="casa_de_estudios" class="form-control"
                    placeholder="Casa de estudio donde egreso">

                </div>
              </div>

              <div class="row">
                <div class="col-sm">
                  {!!Form::label('Direccion','Direccion',['class'=>'label'])!!}
                  <input name="direccion_tutor" id="direccion_tutor" class="form-control"
                    placeholder="direccion del tutor">
                </div>
                <div class="col-sm">
                  {!!Form::label('Escolaridad','Escolaridad',['class'=>'label'])!!}
                  <input name="escolaridad_tutor" id="escolaridad_tutor" class="form-control"
                    placeholder="escolaridad del tutor">
                </div>
                <div class="col-sm">
                  {!!Form::label('CURP','CURP',['class'=>'label'])!!}
                  <input name="curp_tutor" id="curp_tutor" class="form-control" placeholder="curp del tutor">


                </div>
                
              </div>
            </div>
          </div>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
        <button type="submit" class="btn btn-success">Registrar</button>
      </div>
    </div>
  </form>
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
                  <th> Clave</th>
                  <th>Nombres</th>
                  <th>CURP</th>
                  <th>Dirección</th>
                  <th>RFC</th>
                  <th>Teléfono</th>
                </thead>
                <tbody>
                  @foreach ($docentes as $docente)
                <tr url="{{ route('docentes.show', ['id'=>$docente->id])}}">
                    <td>{{$docente->matricula}}</td>
                    <td>{{$docente->nombres}}</td>
                    <td>{{$docente->curp}}</td>
                    <td>{{$docente->direccion}}</td>
                    <td>{{$docente->RFC}}</td>
                    <td>{{$docente->telefono}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            {{ $docentes->appends($_GET)->links() }}

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
    <script src="{{ asset('js/tr_href.js')  }}" type="text/javascript"></script>

    @endsection