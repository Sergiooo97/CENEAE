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

          {!! Form::open(['route' => 'alumnos.store', 'method'=>'POST', 'id'=>'form']) !!}

          @if (count($errors)>0))
          <div id="ERROR_COPY" style="display: none;" class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <ul>
              <li>
                {{ $error }}
              </li>
            </ul>
            @endforeach
          </div>
      @endif
          <div class="form-group">
            <h3>Datos del Alumno</h3>
            <div class="container">


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
              </div>
            </div>
          </div>
        </div>
        <div class="form-group container">
          {!!Form::submit('Registrar',['class'=>'btn btn-primary', 'onclick' => 'confirmAlert()'])!!}
        </div>
      </div>

    </div>
  </div>
</div>
</div>
</div>


{!! Form::close() !!}


@include('sweetalert::alert')
<script src="{{asset('js/jquery-3.1.0.min.js')}}"></script>
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

<script>


  var has_errors = {{$errors->count() > 0 ? 'true' : 'false'}};

  if( has_errors ){
    Swal.fire({
        title: '<strong>Oops.. :(</br> <p style="font-size: 20px;">Corregir los siguientes errores: </p>',
        type: 'errors',
        icon: 'error',
        html:jQuery("#ERROR_COPY").html(),
        showCloseButton: true,

      })
  }


function confirmAlert() {
event.preventDefault();
 let form = event.target;
        Swal.fire({
              title: '¡Está seguro de realizar el retiro?',
              text: "Estás a tiempo de cancelar!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si, retirar!'
            }).then((result) => {
              if (result.value) {
                document.getElementById("form").submit();
                if(form.submit()){
                  Swal.fire(
                  'Retiro con éxito!',
                  'Ahora te mandaré a la lista :).',
                  'success'
                )
                }

              }
            })
   }
</script>

@endsection
