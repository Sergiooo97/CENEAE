@extends('layouts.app')

@section('title', "info | {$alumno->nombres}")

@section('content')
    <!-- Button trigger modal -->
    <!-- Button trigger modal -->
<!-- Modal -->
    <div class="modal fade" id="ModalPago"  role="dialog">
        <form  action="{{ route('pago.store') }}" method="POST">
            @csrf

          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pago de mensualidad para {{$alumno->nombres}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                        <div class="form-group">
                                    <label for="accion-para" class="col-form-label ">Pago del alumno:</label>
                                    <input name="nombre" type="text" class="form-control" id="accion-para" value="{{ $alumno->nombres }}" readonly>
                                    <input name="id_alumno" type="text" class="form-control" id="alumno_id" value="{{ $alumno->id }}" hidden>
                                    <label for="recipient-name" class="col-form-label titulo-accion">Cantidad</label>
                                    <input name="cantidad" type="text" class="form-control" id="cantidad" id="recipient-name">
                                </div>
                                <select name="concepto" class="form-control" id="concepto" value="{{ old('concepto') }}">
                                    <option value="MENSUALIDAD">Mensualidad</option>
                                </select>
                                <div class="form-group">
                                    <label for="message-text" class="col-form-label">Obervaciones:</label>
                                    <textarea name="observaciones" class="form-control" id="message-text"></textarea>
                                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary" >Pagar</button>
              </div>
            </div>
          </div>
        </form>

    </div>



    <!-- Modal -->
    <div class="modal fade" id="depositoRetiro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form" action="{{ route('ndolares.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm">

                                    {!! Form::label('accion', 'se realiza...', ['class' => 'label']) !!}
                                    <input name="accion" type="text" class="form-control accion" id="accion"
                                        id="recipient-name" readonly>

                                </div>
                                <div class="col-sm">
                                    {!! Form::label('matricula', 'matricula', ['class' => 'label']) !!}
                                    <input name="matricula" type="text" class="form-control "
                                        value="{{ $alumno->matricula }}" readonly>

                                </div>
                            </div>
                            <label for="accion-para" class="col-form-label ">Para...</label>
                            <input name="nombre" type="text" class="form-control" id="accion-para"
                                value="{{ $alumno->nombres }}&nbsp;{{ $alumno->apellido_paterno }}&nbsp;{{ $alumno->apellido_materno }}"
                                readonly>
                            <input name="antes" type="text" class="form-control" id="antes" value="{{ $alumno->ndolares }}"
                                hidden>
                            <input name="id_alumno" type="text" class="form-control" id="id_alumno"
                                value="{{ $alumno->id }}" hidden>


                            <label for="recipient-name" class="col-form-label titulo-accion">Desposito/Retiro</label>
                            <input name="cantidad" type="text" class="form-control" id="cantidad" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">comentario (opcional):</label>
                            <textarea name="comentario" class="form-control" id="message-text"></textarea>
                        </div>

                        <script type="application/javascript">
                            $('document').ready(function() {
                                $('#enviar').click(function() {
                                    var actual = $("#actual").val();
                                    var accion = $("#accion").val();
                                    if (accion == "deposito") {
                                        $("#actual").val(parseFloat($('#antes').val()) + parseFloat($(
                                            '#cantidad').val()));
                                    } else if (accion == "retiro") {
                                        $("#actual").val(parseFloat($('#antes').val()) - parseFloat($(
                                            '#cantidad').val()));

                                    }
                                });


                            });

                        </script>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button id="enviar" type="submit" class="btn btn-primary">Enviar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <script type="application/javascript">
        $('#depositoRetiro').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever')
            var nombre = $("#nombres").val();


            // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-title').text(recipient + ' para ' + nombre)
            modal.find('.titulo-accion').text('Cantidad para ' + recipient)

            modal.find('.accion').val(recipient)
        })

    </script>
    <div class="container">


        <div class="content">
            <div class="row">
                <div class="container">
                    <h6>Puedes desacargar los documentos</h6>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <a style="padding: 5px"
                        href="{{ route('exp', ['id' => $alumno->id, 'nombre' => $alumno->nombres, 'a' => '2']) }}"
                        class="btn btn-warning col-md-12">Expediente <i class="nc-icon nc-cloud-download-93"></i></a>
                </div>
                <div class="col-md-4">
                    <a style="padding: 5px"
                        href="{{ route('exportar_ndolar_info', ['id' => $alumno->id, 'nombre' => $alumno->nombres]) }}"
                        class="btn btn-warning col-md-12">ndolares <i class="nc-icon nc-cloud-download-93"></i></a>
                </div>
                <div class="col-md-4">
                    <a style="padding: 5px" href="#" class="btn btn-warning col-md-12">calificaciones <i
                            class="nc-icon nc-cloud-download-93"></i></a>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-user">
                        <div class="image">
                            <img src="{{ asset('img/ntcd.jpg') }}" width="" alt="...">
                        </div>

                        <div class="card-body">
                            <div class="author">
                                <a href="#">



                                    <img class="avatar border-gray" src="{{ asset('img/yo.jpg') }}" alt="...">
                                    <h5 class="title">
                                        {{ $alumno->nombres }}&nbsp;{{ $alumno->apellido_paterno }}&nbsp;{{ $alumno->apellido_materno }}
                                    </h5>
                                </a>

                                <p class="description slider-label">
                                    @ {{ $alumno->matricula }}
                                </p>
                            </div>
                            <p class="description text-center slider-label">
                                "{{ $alumno->grupo_nombre }}"

                            </p>
                            <p class="description text-center slider-label">
                                "De grande quiero ser {{ $alumno->quiero_ser }}"

                            </p>
                            <input id="ndolar-d" value="{{ $alumno->ndolares }}" hidden />
                            </br>

                        </div>
                        <div class="card-footer">
                            <hr>
                            <div class="button-container">
                                <div class="row">
                                    <div class="col-sm-3 mr-auto">
                                        <h5>{{ $alumno->ndolar_cantidad }} $
                                            <br>
                                            <small style="font-size: 14px;">dolares</small>
                                        </h5>
                                    </div>

                                    <div class="col-sm-9 mr-auto">
                                        <button style="font-size: 23px; padding: 10px;" type="button"
                                            class="btn btn-success" data-toggle="modal" data-target="#ModalPago"
                                            data-whatever="deposito">
                                            +$
                                        </button>
                                        <!--button id="retiro" style="font-size: 23px; padding: 10px;" type="button"
                                            class="btn btn-danger" data-toggle="modal" data-target="#depositoRetiro"
                                            data-whatever="retiro">
                                            -$
                                        </button-->
                                        <a data-role="button" id="detalles"
                                            href="{{ route('pago.show', ['id' => $alumno->id, 'nombres' => $alumno->nombres]) }}"
                                            style="font-size: 23px; padding: 10px;" class="btn btn-primary" hidden> <i
                                                style="padding: 0px;" class="nc-icon nc-alert-circle-i"></i></a>
                                        <button id="boton" class="enlace btn btn-primary" role="link"
                                            onclick="window.location='{{ route('pago.show', ['id' => $alumno->id, 'nombres' => $alumno->nombres]) }}'"
                                            style="font-size: 23px; padding: 10px;"><i style="padding: 0px;"
                                                class="nc-icon nc-alert-circle-i"></i></button>

                                        <script type="application/javascript">
                                            //if (document.getElementById('ndolarTransacciones-d').value <= 0) {
                                              //  document.getElementById('boton').disabled = true;
                                                //document.getElementById('retiro').disabled = true;

                                            //}

                                        </script>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card card-user">
                        <div class="card-header btn-volver-container">
                            <h5 class="card-title">información de alumno<a class="topic btn btn-info form-inline pull-right"
                                    href="{{ URL::previous() }}">
                                    <i class="nc-icon nc-minimal-left"></i> Volver atrás</a>
                            </h5>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-5 pr-1">
                                    <div class="form-group">
                                        <label>Matricula (disabled)</label>
                                        <input name="matricula" type="text" class="form-control" disabled=""
                                            placeholder="Company" value="{{ $alumno->matricula }}">
                                    </div>
                                </div>
                                <div class="col-md-3 px-1">
                                    <div class="form-group">
                                        <label>Usuario</label>
                                        <input disabled="" id="nombres" type="text" class="form-control"
                                            placeholder="Username" value="{{ $alumno->nombres }}">
                                    </div>
                                </div>
                                <div class="col-md-4 pl-1">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">CURP</label>
                                        <input disabled="" name="curp" type="email" class="form-control"
                                            placeholder="{{ $alumno->curp }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5 pr-1">
                                    <div class="form-group">
                                        <label>Nombres</label>
                                        <input disabled="" name="nombres" type="text" class="form-control"
                                            placeholder="Company" value="{{ $alumno->nombres }}">
                                    </div>
                                </div>
                                <div class="col-md-3 px-1">
                                    <div class="form-group">
                                        <label>Apellido paterno</label>
                                        <input disabled="" name="apellido_paterno" type="text" class="form-control"
                                            placeholder="apellido1" value="{{ $alumno->apellido_paterno }}">
                                    </div>
                                </div>
                                <div class="col-md-4 pl-1">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Apellido paterno</label>
                                        <input disabled="" name="apellido_materno" type="text" class="form-control"
                                            placeholder="Apellido paterno" value="{{ $alumno->apellido_materno }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 pr-1">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Fecha de nacimiento</label>
                                        <input disabled="" name="fecha_de_nacimiento" type="date" class="form-control"
                                            placeholder="Fecha de nacimiento" value="{{ $alumno->fecha_de_nacimiento }}">
                                    </div>
                                </div>
                                <div class="col-md-3 px-1">
                                    <div class="form-group">
                                        <label>Municipio</label>
                                        <input disabled="" name="municipio" type="text" class="form-control"
                                            placeholder="Municipio" value="{{ $alumno->municipio }}">
                                    </div>
                                </div>
                                <div class="col-md-4 pl-1">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Dirección</label>
                                        <input disabled="" name="direccion" type="text" class="form-control"
                                            placeholder="Dirección" value="{{ $alumno->direccion }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 pr-1">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nombres de tutor</label>

                                        <input disabled="" name="nombres_tutor" type="text" class="form-control"
                                            placeholder="Nombres de tutor" value="{{ $alumno->nombres_tutor }}">
                                    </div>
                                </div>
                                <div class="col-md-3 px-1">
                                    <div class="form-group">
                                        <label>Apellido paterno de tutor</label>
                                        <input disabled="" name="apellido_paterno_tutor" type="text" class="form-control"
                                            placeholder="Apellido paterno de tutor"
                                            value="{{ $alumno->apellido_paterno_tutor }}">
                                    </div>
                                </div>
                                <div class="col-md-4 pl-1">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Apellido materno de tutor</label>
                                        <input disabled="" name="apellido_materno_tutor" type="text" class="form-control"
                                            placeholder="Apellido paterno de tutor"
                                            value="{{ $alumno->apellido_materno_tutor }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 pr-1">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Teléfono del tutor</label>
                                        <input disabled="" name="telefono_tutor" type="number" class="form-control"
                                            placeholder="Teléfono del tutor" value="{{ $alumno->telefono_tutor }}">
                                    </div>
                                </div>
                                <div class="col-md-3 px-1">
                                    <div class="form-group">
                                        <label>E-mail de tutor</label>
                                        <input disabled="" type="email" class="form-control" placeholder="correo del tutor"
                                            value="{{ $alumno->correo_tutor }}">
                                    </div>
                                </div>
                                <div class="col-md-4 pl-1">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Dirección del tutor</label>
                                        <input disabled="" name="direccion_tutor" type="text" class="form-control"
                                            placeholder="Dirección de tutor" value="{{ $alumno->direccion_tutor }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="update ml-auto mr-auto">
                                    <a href="{{ route('alumnos.edit', ['grupo' => $alumno->grupo_nombre, 'id' => $alumno->id]) }}"
                                        class="btn btn-primary btn-round">Completar / Actualizar datos</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!---ROW----->
            <div class="row">


                <div class="col-md-8">
                    <div class="card card-user">

                        <div class="card-body">
                            <div id="chart_alumno"></div>
                            <div class="table-responsive">
                                <div id="TableroDos"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-user">
                        <div class="card-header btn-volver-container">
                            <h5 class="card-title">Calificación de {{ $alumno->nombres }}
                                <div class="form-group forom-inline pull-center">
                                    <form style="margin-right: 0.5em;"
                                        action="{{ route('alumnos.show', ['id' => $alumno->id]) }}" method="GET"
                                        class="form-inline pull-center" role="search">
                                        <label for="grado"> asignatura: </label>
                                        <select name="n_id" class="form-control" id="grado" onchange="this.form.submit()">
                                            <option value="{{ request('n_id') }}">
                                                @isset($promedio_curso)
                                                    {{ $promedio_curso->nombre }}
                                                @endisset
                                            </option>
                                            @forelse($cursos as $curso)
                                                <option value="{{ $curso->id }}">{{ $curso->nombre }}</option>
                                            @empty
                                                <option value="">Registrar asignatura</option>
                                            @endforelse
                                        </select>
                                    </form>
                                </div>
                            </h5>
                        </div>
                        <div class="card-body">
                            <div style="overflow:hidden;" class="table-responsive tbl">
                                <table id="example" class="table table-striped table-hover " style="width:100%">
                                    <thead class=" text-info">
                                        @forelse($periodos as $periodo)
                                            <th>{{ $periodo->abreviacion }} </th>
                                        @empty
                                            <th>no hay bimestres aún :(</th>
                                        @endforelse
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @forelse($promedio as $c)
                                                <td>{{ round($c->prom) }} </td>
                                            @empty
                                                <td>no hay promedio aún :(</td>
                                            @endforelse
                                        </tr>
                                    </tbody>
                                </table>
                                @forelse($promedioFIN as $c)
                                    <p style="font-size: 16px;">Promedio final de
                                        @isset($promedio_curso)
                                            {{ $promedio_curso->nombre }}
                                        @endisset: {{ round($c->prom) }}
                                    </p>
                                @empty
                                    <p>no hay promedio final aún :(</p>
                                @endforelse
                            </div>
                            <a href="{{ route('admin.calificaciones.detalles', ['id' => $alumno->id]) }}"
                                class="btn btn-info"><i class="nc-icon nc-hat-3"></i> Todas las calificaciones</a>
                        </div>
                    </div>
                    <div class="card card-user">
                        <div class="card-header ">
                            <h5 class="card-title">Necesita mejorar en:
                                <div class="form-group forom-inline pull-center">
                                </div>
                            </h5>
                            <div class="d-flex flex-column">
                                @forelse($promedioCount as $prom)
                                    @if ($prom->prom <= 6)
                                        <p style="margin-left: 5px !important;" class="btn btn-danger p-2"
                                            style="margin-left:4em;">{{ $prom->nota_nombre }} :(</p>
                                    @endif
                                @empty
                                    <p>No hay registros :(</p>
                                @endforelse

                            </div>


                        </div>

                    </div>
                </div>


            </div>
            <a href="{{ route('calificaciones.show', ['curso_id' => $alumno->id]) }}" class="btn btn-info"><i
                    class="nc-icon nc-bullet-list-67"></i> Asistencia</a>
            <a href="{{ route('exp', ['id' => $alumno->id, 'nombre' => $alumno->nombres, 'a' => '1']) }}"
                class="btn btn-info"><i class="nc-icon nc-bullet-list-67"></i>Ver expediente</a>

        </div>
    </div>
    <script src="http://code.highcharts.com/highcharts.js" type="application/javascript"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"type="application/javascript"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"type="application/javascript"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"type="application/javascript"></script>
    <script type="application/javascript">
        var categoria = <?php echo json_encode($subcomponentes); ?>;    var series = <?php echo json_encode($series); ?>;    var notas = <?php echo json_encode($notas); ?>;    var users = <?php echo json_encode($users); ?>;    var ns = <?php echo json_encode($ns); ?>;    var curso = <?php echo json_encode($curso_grafica); ?>;
        Highcharts.chart('chart_alumno', {
            chart: {
                type: 'line'
            },
            title: {
                text: "Rendimiento de: " + users + " en " + curso
            },
            /*,
            subtitle: {
            text: 'Source: WorldClimate.com'
            },*/
            xAxis: {
                categories: ns
            },
            yAxis: {
                title: {
                    text: 'Notas'
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: true
                }
            },
            series: notas
        });

    </script type="application/javascript">
    @include('sweetalert::alert')
    <script src="{{ asset('js/jquery-3.1.0.min.js') }}"type="application/javascript"></script>

    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])


@endsection
