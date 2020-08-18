@extends('layouts.app')

@section('title', "calificacion | ")
@section('content')
    <div class="notificationsss bounce ">
        <div style="width: 90%;" class="container  ">
            <div class="row">
                <div class="col-md-12">
                    <div class="card bounceInleft">
                        <div class="card-header">
                            @forelse($cursos as $curso)
                                <h4 class="card-title">Calificar {{$curso->nombre}} </h4>
                            @empty
                                <h4 class="card-title">Calificar nada </h4>

                            @endforelse
                        </div>
                        <div class="card-body">
                            <div class="">
                                <div class="row">

                                    <div class="container">
                                <form method="post" action="{{route('calificaciones.value.store')}}">
                                @csrf

                                     <div class="form-group forom-inline pull-right">
                                            <select name="periodo_id" id="PeriodosCb" class="form-control" style="font-size: 17px;">
                                                <option value="">Seleccione Periódo</option>
                                                @foreach($periodos as $periodo)
                                        <option value="{{ $periodo->id }}">
                                                        {{ $periodo->nombre }}
                                            </option>
                                                @endforeach
                                        </select>
                                    </div>
                                        <div class="form-group forom-inline pull-right">
                                            <select name="nota_id" id="PeriodosCb" class="form-control" style="font-size: 17px;">
                                                <option value="">Seleccione Actividad</option>
                                                @forelse($actividades as $actividad)
                                                    <option value="{{ $actividad->id }}">
                                                        {{$actividad->nombre}}
                                                    </option>
                                                @empty
                                                    <h5>no hay nada</h5>
                                                @endforelse
                                            </select>
                                        </div>
                                        <!-----------Tabla------------>
                                        <!-------------------------------------------empieza tabla ---------------------------------->
                                        <table id="example" class="table table-striped table-hover " style="width:100%">
                                            <thead class=" text-info">

                                            <th>
                                                Apellidos
                                            </th>
                                            <th>
                                                Nombres
                                            </th>
                                            <th>
                                                grado
                                            </th>
                                            <th>
                                                grupo
                                            </th>
                                            <th>
                                                Calificación
                                            </th>
                                            </thead>
                                            @foreach ($alumnos as $count=>$alumno)

                                                @if ($errors->has('orden.*'))
                                                    <div id="ERROR_COPY" style="display: none;" class="alert alert-danger">

                                                        {{ $errors->first('orden.*') }}
                                                    </div>
                                                @endif
                                                <input id="id[]" value="{{$alumno->id}}" name="alumno_id[]" class="form-control" hidden/>
                                                <tbody>
                                                <tr >
                                                    <td url="{{route('alumnos.show', ['id' => $alumno->id])}}">
                                                        {{ $alumno->apellido_paterno }}&nbsp;{{ $alumno->apellido_materno }}
                                                    </td>
                                                    <td url="{{route('alumnos.show', ['id' => $alumno->id])}}">
                                                            {{ $alumno->nombres }}
                                                    </td>
                                                    <td url="{{route('alumnos.show', ['id' => $alumno->id])}}">
                                                        {{ $alumno->grado }}
                                                    </td>
                                                    <td url="{{route('alumnos.show', ['id' => $alumno->id])}}">
                                                        {{ $alumno->grupo }}
                                                    </td>
                                                    <td style="width: 3em;">
                                                        <input type="number" id="calificacion_value[]"   name="calificacion_value[]" class="form-control" required maxlength="2"/>
                                                    </td>
                                                </tr>
                                                @endforeach



                                                </tbody>
                                        </table>
                                    <button type="submit">Enviar</button>
                                        <!-------------------------------------------termina tabla ---------------------------------->
                                </form >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/td_href.js')  }}" type="text/javascript"></script>

@endsection
