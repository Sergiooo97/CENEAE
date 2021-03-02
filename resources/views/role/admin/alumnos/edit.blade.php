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
                        <script src="{{ asset('js/generarMatricula.js') }}" type="text/javascript"> </script>
                        <form method="POST" action="{{ route('alumnos.update', $alumno->id) }}">
                            @csrf @method('PATCH')
                            <div class="form-group">
                                <h3>Datos del Alumno</h3>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            {!! Form::label('id', 'Matricula', ['class' => 'label']) !!}
                                            <input name="matricula" id="id_al" class="form-control"
                                                value="{{ $alumno->matricula }}" readonly required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            {!! Form::label('Apellido_P', 'A. Paterno', ['class' => 'label']) !!}
                                            <input name="apellido_paterno" id="apellido_paterno" class="form-control"
                                                value="{{ $alumno->apellido_paterno }}" required>
                                        </div>
                                        <div class="col-sm-3">
                                            {!! Form::label('Apellido_M', 'A. materno', ['class' => 'label']) !!}
                                            <input name="apellido_materno" id="apellido_materno" class="form-control"
                                                value="{{ $alumno->apellido_materno }}" required>
                                        </div>
                                        <div class="col-sm-6">
                                            {!! Form::label('Nombres', 'Nombre (s) del alumno', ['class' => 'label']) !!}
                                            <input name="nombres" id="nombres" class="form-control"
                                                value="{{ $alumno->nombres }}" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm">
                                            {!! Form::label('sexo', 'sexo', ['class' => 'label']) !!}
                                            <select name="sexo" class="form-control" id="grupo">
                                                <option value="H">Masculino</option>
                                                <option value="F">Femenino</option>
                                            </select>
                                        </div>
                                        <div class="col-sm">
                                            {!! Form::label('estatura', ' Estatura', ['class' => 'label']) !!}
                                            <input name="estatura" id="estatura" type="number" class="form-control"
                                                placeholder="00 Kg" value="{{ $alumno->estatura }}" maxlength="5">
                                        </div>
                                        <div class="col-sm">
                                            {!! Form::label('peso', 'Peso', ['class' => 'label']) !!}
                                            <input name="peso" id="peso" class="form-control" type="number"
                                                placeholder="Peso" autocomplete="off" value="{{ $alumno->peso }}"
                                                maxlength="11" >
                                        </div>
                                        <div class="col-sm">
                                            {!! Form::label('Edad', 'Edad', ['class' => 'label']) !!}
                                            <input type="text" name="age" id="age" class="form-control"
                                                value="{{ $alumno->edad }}" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-sm">
                                            {!! Form::label('Fecha_de_nacimiento', 'Fecha de nacimiento', ['class' => 'label']) !!}
                                            <input id="birthday" name="birthday" type="date" class="form-control"
                                                placeholder="Fecha de nacimiento"
                                                value="{{ $alumno->fecha_de_nacimiento }}">
                                            <script>
                                                $(function() {
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
                                            {!! Form::label('escuela_procedencia', 'Escuela de procedencia', ['class' => 'label']) !!}
                                            <input name="escuela_procedencia" id="escuela_procedencia" class="form-control"
                                                placeholder="Escuela de procedencia" autocomplete="off"
                                                value="{{ $alumno->escuela_procedencia }}" maxlength="11" >
                                        </div>
                                        <div class="col-sm">
                                            {!! Form::label('CURP', 'CURP', ['class' => 'label']) !!}
                                            <input name="curp" id="curp_al" class="form-control"
                                                value="{{ $alumno->curp }}" autocomplete="off" maxlength="11">
                                        </div>
                                        <div class="col-sm">
                                            <div class="row">
                                                <div class="col-sm">
                                                    {!! Form::label('Grupo', 'Grupo', ['class' => 'label']) !!}
                                                    <input name="" id="" class="form-control" autocomplete="off"
                                                        value="{{ $grupo_id->nombre }}" maxlength="11"  readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm">
                                            {!! Form::label('direccion', 'Dirección', ['class' => 'label']) !!}
                                            <input name="direccion" id="direccion" class="form-control"
                                                value="{{ $alumno->direccion }}" autocomplete="off" maxlength="11">
                                        </div>
                                        <div class="col-sm">
                                            {!! Form::label('cp', ' Código postal', ['class' => 'label']) !!}
                                            <input name="cp" id="cp" type="number" class="form-control"
                                                placeholder="Código postal" value="{{ $alumno->cp }}" maxlength="5">
                                        </div>
                                        <div class="col-sm">
                                            {!! Form::label('municipio', 'Municipio', ['class' => 'label']) !!}
                                            <input name="municipio" id="municipio" class="form-control"
                                                placeholder="Municipio" autocomplete="off"
                                                value="{{ $alumno->municipio }}" maxlength="11" >
                                        </div>
                                        <div class="col-sm"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm">
                                            {!! Form::label('fecha_ingreso', 'Fecha de ingreso', ['class' => 'label']) !!}
                                            <input name="fecha_ingreso" id="fecha_ingreso" class="form-control" 
                                                autocomplete="off" value="{{ $alumno->created_at->isoFormat('D-M-Y') }}" maxlength="11"
                                                readonly>
                                        </div>
                                        <div class="col-sm">
                                            {!! Form::label('regularidad', ' Regularidad', ['class' => 'label']) !!}
                                            <input name="regularidad" id="regularidad" type="number" class="form-control"
                                                value="Irregular" maxlength="5" readonly>
                                        </div>
                                        <div class="col-sm">
                                            {!! Form::label('status', 'Quiero ser de grande...', ['class' => 'label']) !!}
                                            <input name="quiero_ser" id="quiero_ser" class="form-control"
                                               value="{{ $alumno->quiero_ser }}" autocomplete="off">
                                        </div>
                                        <div class="col-sm"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <h3>Datos del tutor</h3>
                                <div class="container">
                                    
                                      <div class="row">
                                        <div class="col-sm-3">
                                            {!! Form::label('Apellido_P', 'A. Paterno', ['class' => 'label']) !!}
                                            <input name="apellido_paterno_tutor" id="apellido_paterno_tutor" class="form-control"
                                                value="{{ $alumno->apellido_paterno_tutor }}">
                                        </div>
                                        <div class="col-sm-3">
                                            {!! Form::label('Apellido_M', 'A. materno', ['class' => 'label']) !!}
                                            <input name="apellido_materno_tutor" id="apellido_materno_tutor" class="form-control"
                                                value="{{ $alumno->apellido_materno_tutor }}">
                                        </div>
                                        <div class="col-sm-6">
                                            {!! Form::label('Nombres', 'Nombre (s) del tutor', ['class' => 'label']) !!}
                                            <input name="nombres_tutor" id="nombres_tutor" class="form-control"
                                                value="{{ $alumno->nombres_tutor }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm">
                                            {!! Form::label('sexo', 'sexo', ['class' => 'label']) !!}
                                            <select name="sexo_tutor" class="form-control" id="grupo">
                                                <option value="H">Masculino</option>
                                                <option value="F">Femenino</option>
                                            </select>
                                        </div>
                                        
                                        <div class="col-sm">
                                            {!! Form::label('Fecha_de_nacimiento', 'Fecha de nacimiento', ['class' => 'label']) !!}
                                            <input id="birthday" name="birthday_tutor" type="date" class="form-control"
                                                placeholder="Fecha de nacimiento"
                                                value="{{ $alumno->fecha_de_nacimiento_tutor }}">
                                            <script>
                                                $(function() {
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
                                                }

                                                    $('#age').val(edad);
                                            </script>
                                        </div>
                                        <div class="col-sm">
                                            {!! Form::label('Edad', 'Edad', ['class' => 'label']) !!}
                                            <input type="text" name="age_tutor" id="age" class="form-control"
                                                value="{{ $alumno->edad_tutor }}" autocomplete="off">
                                        </div>
                                        <div class="col-sm">
                                            {!! Form::label('CURP', 'CURP', ['class' => 'label']) !!}
                                            <input name="curp_tutor" id="curp_tutor" class="form-control"
                                                value="{{ $alumno->curp_tutor }}" autocomplete="off" maxlength="11" >
                                        </div>
                                    </div>
                                    <div class="row">

                                        
                                        <div class="col-sm-3">
                                            {!! Form::label('parentezco', 'Parentezco con el alumno', ['class' => 'label']) !!}
                                            <input name="parentesco_con_alumno" id="parentesco_con_alumno" class="form-control"
                                                placeholder="Parentezco con el alumno" autocomplete="off"
                                                value="{{ $alumno->parentesco_con_alumno }}"  >
                                        </div>
                                        <div class="col-sm-3">
                                            {!! Form::label('escolaridad', 'escolaridad', ['class' => 'label']) !!}
                                            <input name="escolaridad" id="escolaridad" class="form-control"
                                                value="{{ $alumno->escolaridad_tutor }}" autocomplete="off" >
                                        </div>
                                        <div class="col-sm-6">
                                            {!! Form::label('ocupacion', 'ocupacion', ['class' => 'label']) !!}
                                            <input name="ocupacion" id="ocupacion" class="form-control"
                                                value="{{ $alumno->curp_tutor }}" autocomplete="off" >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            {!! Form::label('direccion', 'Dirección', ['class' => 'label']) !!}
                                            <input name="direccion" id="direccion" class="form-control"
                                                value="{{ $alumno->direccion_tutor }}" autocomplete="off" maxlength="11">
                                        </div>
                                        <div class="col-sm-3">
                                            {!! Form::label('cp', ' Código postal', ['class' => 'label']) !!}
                                            <input name="cp" id="cp" type="number" class="form-control"
                                                placeholder="Código postal" value="{{ $alumno->cp_tutor }}" maxlength="5">
                                        </div>
                                        <div class="col-sm-3">
                                            {!! Form::label('municipio', 'Municipio', ['class' => 'label']) !!}
                                            <input name="municipio_tutor" id="municipio" class="form-control"
                                                placeholder="Municipio" autocomplete="off"
                                                value="{{ $alumno->municipio_tutor }}" maxlength="11" >
                                        </div>
                                        <div class="col-sm"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            {!! Form::label('correo', 'correo', ['class' => 'label']) !!}
                                            <input name="correo" id="correo" class="form-control" type="email"
                                                autocomplete="off" value="{{ $alumno->correo }}" 
                                                 >
                                        </div>
                                      
                                        <div class="col-sm-6">
                                            {!! Form::label('telefono', 'Teléfono', ['class' => 'label']) !!}
                                            <input name="telefono" id="telefono" class="form-control" type="number"  maxlength="10" value="{{ $alumno->telefono }}" 
                                                autocomplete="off">
                                        </div>
                                        <div class="col-sm"></div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="form-group container">
                        <button id="Registrar" type="submit" class="btn btn-primary"
                            onclick="ConfirmDemo()">Actualizar</button>
                    </div>
                    </form>

                </div>

            </div>
        </div>

        
    </div>




@endsection
