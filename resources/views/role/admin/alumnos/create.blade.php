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

          @if (count($errors)>0)
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
                
                <div class="col-sm-3">
                  {!!Form::label('Apellido_P','A.Paterno',['class'=>'label'])!!}
                  {!!Form::text('apellido_paterno',null, ['class'=>'form-control','placeholder'=>'apellido Paterno',
                  'autocomplete'=>'off'])!!}
                </div>
                <div class="col-sm-3">
                  {!!Form::label('Apellido_M','A.materno',['class'=>'label'])!!}
                  {!!Form::text('apellido_materno',null, ['class'=>'form-control','placeholder'=>'apellido Materno',
                  'autocomplete'=>'off'])!!}
                </div>
                <div class="col-sm-6">
                  {!!Form::label('Nombres','Nombre (s) del alumno',['class'=>'label'])!!}
                  <input name="nombres"id="nombres" class="form-control" placeholder="nombres" value="{{ old('nombres')}}" >
                </div>

              </div>

              <div class="row">

                <div class="col-sm">
                  {!!Form::label('Fecha_de_nacimiento','Fecha de nacimiento',['class'=>'label'])!!}
                  <input type="date" name="birthday" id="birthday" value=""  id="fecha_de_nacimiento" class="form-control" placeholder="fecha de nacimiento" required>
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
                  <input type="number" name="age" id="age" value="" class="form-control" placeholder="Edad"  maxlength="2" value="{{ old('age') }}">
                </div>
                <div class="col-sm">
                  {!!Form::label('CURP','CURP',['class'=>'label'])!!}
                  <input name="curp" id="curp_al" class="form-control" placeholder="CURP" autocomplete="off" maxlength="18"
                    required value="{{ old('curp') }}">
                </div>
                <div class="col-sm">
                  <div class="row">
                   
                    <div class="col-sm">
                      {!!Form::label('Grupo','Grupo',['class'=>'label'])!!}
                      <select name="grupo" class="form-control" id="grupo" value="{{ old('grupo') }}">
                        @if (request('grupo') == "")
                        <option value="">Seleccione</option>
                        @else
                        <option value="{{ $grupo_id->id }}">{{ $grupo_id->nombre }}</option>
                        @endif
                        @foreach ($grupos as $grupo)
                          <option value="{{ $grupo->id }}">{{ $grupo->nombre }}</option>
                        @endforeach
      
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm">
                  <div class="row">
                    <div class="col">
                      {!!Form::label('calle-num','calle',['class'=>'label'])!!}
                      <input name="calle-num" id="calle" type="number" class="form-control" placeholder="#" maxlength="3" required value="{{ old('calle-num') }}">
                    </div>
                    <div class="col">
                      {!!Form::label('calle-entre','entre',['class'=>'label'])!!}
                      <input name="calle-entre" id="calle-entre" type="number" class="form-control" placeholder="#" maxlength="3" required value="{{ old('calle-entre') }}">
                    </div>
                    <div class="col-sm">
                      {!!Form::label('calle-y','Y',['class'=>'label'])!!}
                      <input name="calle-y" id="calle-y" type="number" class="form-control" placeholder="#" maxlength="3" value="{{ old('calle-y') }}">
                    </div>
                  </div>
                </div>
                <div class="col-sm">
                  {!!Form::label('num','Número',['class'=>'label'])!!}
                  <input name="num" id="num"  class="form-control" placeholder="#" required value="{{ old('num') }}">


                </div>
                <div class="col-sm">
                  {!!Form::label('cp',' Código postal',['class'=>'label'])!!}
                  <input name="cp" id="cp" type="number" class="form-control" placeholder="Código postal" maxlength="5" value="{{ old('cp') }}">
                </div>
                <div class="col-sm">
                 
                </div>
              </div>
              </div>
            </div>
            <div class="form-group">
              <h3>Datos del tutor</h3>
              <div class="container">
  
  
                <div class="row">
                  
                  <div class="col-sm-3">
                    {!!Form::label('Apellido_P','A. Paterno',['class'=>'label'])!!}
                    {!!Form::text('apellido_paterno_tutor',null, ['class'=>'form-control','placeholder'=>'apellido Paterno',
                    'autocomplete'=>'off'])!!}
                  </div>
                  <div class="col-sm-3">
                    {!!Form::label('Apellido_M','A. Materno',['class'=>'label'])!!}
                    {!!Form::text('apellido_materno_tutor',null, ['class'=>'form-control','placeholder'=>'apellido Materno',
                    'autocomplete'=>'off'])!!}
                  </div>
                  <div class="col-sm-6">
                    {!!Form::label('Nombres','Nombre (s) del tutor ',['class'=>'label'])!!}
                    <input name="nombres_tutor"id="nombres_tutor" class="form-control" placeholder="nombres" value="{{ old('nombres_tutor') }}" >
                  </div>

                </div>
 
                <div class="row">

                  <div class="col-sm">
                    {!!Form::label('Fecha_de_nacimiento','Fecha de nacimiento',['class'=>'label'])!!}
                    <input type="date" name="birthday_tutor" id="birthday_tutor" value=""  id="fecha_de_nacimiento" class="form-control" placeholder="fecha de nacimiento" value="{{ old('birthday_tutor') }}">
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
                    <input type="number" name="age_tutor" id="age_tutor" value="" class="form-control" placeholder="Edad"  value="{{ old('age_tutor') }}">
                  </div>
                  <div class="col-sm">
                    {!!Form::label('CURP','CURP',['class'=>'label'])!!}
                    <input name="curp_tutor" id="curp_tutor" class="form-control" placeholder="CURP" autocomplete="off" maxlength="18"
                      required value="{{ old('curp_tutor') }}">
                  </div>
                  <div class="col-sm">
                    
                  </div>
                </div> 

                <div class="row">
                  <div class="col-sm">
                  <div class="row">
                    <div class="col">
                      {!!Form::label('calle-num','calle',['class'=>'label'])!!}
                      <input name="calle-num_tutor" id="calle" type="number" class="form-control" placeholder="#" maxlength="3" value="{{ old('calle-num_tutor') }}">
                    </div>
                    <div class="col">
                      {!!Form::label('calle-entre','entre',['class'=>'label'])!!}
                      <input name="calle-entre_tutor" id="calle-entre" type="number" class="form-control" placeholder="#" maxlength="3" value="{{ old('calle-entre_tutor') }}">
                    </div>
                    <div class="col-sm">
                      {!!Form::label('calle-y','Y',['class'=>'label'])!!}
                      <input name="calle-y_tutor" id="calle-y" type="number" class="form-control" placeholder="#" maxlength="3" value="{{ old('calle-y_tutor') }}">
                    </div>
                  </div>
 
                 </div>
                  <div class="col-sm">
                    {!!Form::label('cp',' Código postal',['class'=>'label'])!!}
                    <input name="cp_tutor" id="cp_tutor" type="number" class="form-control" placeholder="Código postal" maxlength="5" value="{{ old('cp_tutor') }}">
                  </div>
                  <div class="col-sm">
                    {!!Form::label('municipio','Municipio',['class'=>'label'])!!}
                    <input name="municipio_tutor" id="municipio_tutor" class="form-control" placeholder="Municipio" autocomplete="off" maxlength="11"
                      required value="{{ old('mucicipio_tutor') }}">
                  </div>
                  <div class="col-sm">
                    {!!Form::label('ocupacion','ocupación',['class'=>'label'])!!}
                    <input name="ocupacion" id="ocupacion" class="form-control" placeholder="ocupación" autocomplete="off" value="{{ old('ocupacion_tutor') }}">
                  </div>
                </div>

            <div class="row">
                  <div class="col-sm-6">
                    {!!Form::label('Correo','Correo',['class'=>'label'])!!}
                    <input name="correo_tutor" id="correo_tutor" type="email" class="form-control" placeholder="Correo" value="{{ old('correo_tutor') }}">
                  </div>
                  <div class="col-sm-6">
                    {!!Form::label('telefono','Teléfono',['class'=>'label'])!!}
                    <input name="telefono" id="telefono" type="number" class="form-control" placeholder="Teléfono" maxlength="5" value="{{ old('telefono') }}">
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
              title: '¡Está seguro de realizar el registro?',
              text: "Estás a tiempo de cancelar!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si, registrar!'
            }).then((result) => {
              if (result.value) {
                document.getElementById("form").submit();
                if(form.submit()){
                  Swal.fire(
                  'Registro con éxito!',
                  'Ahora te mandaré a la lista :).',
                  'success'
                )
                }

              }
            })
   }
</script>

@endsection
