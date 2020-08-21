@extends('layouts.app')
@section('title', 'Rendimieto | CENEAE')
@section('content')
<!---ROW----->
<div class="container">
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
                    <h5 class="card-title">Calificación de {{$alumno->nombres}}
                        <div class="form-group forom-inline pull-center">
                            <form style="margin-right: 0.5em;" action="{{route('alumno.rendimiento.user')}}" method="GET"
                                class="form-inline pull-center" role="search">
                                <label for="grado"> asignatura: </label>
                                <select name="n_id" class="form-control" id="grado" onchange="this.form.submit()">
                                    <option value="{{request('n_id')}}">
                                        @isset($promedio_curso)
                                        {{$promedio_curso->nombre}}
                                        @endisset
                                    </option>
                                    @forelse($cursos as $curso)
                                    <option value="{{$curso->id}}">{{$curso->nombre}}</option>
                                    @empty
                                    <option value="">Registrar asignatura</option>
                                    @endforelse
                                </select>
                            </form>
                        </div>
                    </h5>
                </div>
                <div class="card-body">
                    <div  class="table-responsive">
                        <table id="example" class="table table-striped table-hover " style="width:100%">
                            <thead class=" text-info">
                                @forelse($periodos as $periodo)
                                <th>{{$periodo->abreviacion}} </th>
                                @empty
                                <th>no hay bimestres aún :(</th>
                                @endforelse
                            </thead>
                            <tbody>
                                <tr>
                                    @forelse($promedio as $c)
                                    <td>{{round($c->prom)}} </td>
                                    @empty
                                    <td>no hay promedio aún :(</td>
                                    @endforelse
                                </tr>
                            </tbody>
                        </table>
                        @forelse($promedioFIN as $c)
                        <p style="font-size: 16px;">Promedio final de
                            @isset($promedio_curso)
                            {{$promedio_curso->nombre}}
                            @endisset: {{round($c->prom)}}
                        </p>
                        @empty
                        <p>no hay promedio final aún :(</p>
                        @endforelse
                    </div>
                    <a href="{{route('calificaciones.detalles', ['id'=> $alumno->id])}}" class="btn btn-info"><i
                            class="nc-icon nc-hat-3"></i> Todas las calificaciones</a>
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
                        @if($prom->prom <=6) <p style="margin-left: 5px !important;" class="btn btn-danger p-2"
                            style="margin-left:4em;">{{$prom->nota_nombre}} :(</p>
                            @endif
                            @empty
                            <p>No hay registros :(</p>
                            @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script type="text/javascript">
    var categoria =  <?php echo json_encode($subcomponentes) ?>;
    var series =  <?php echo json_encode($series) ?>;
    var notas =  <?php echo json_encode($notas) ?>;
    var users =  <?php echo json_encode($users) ?>;
    var ns =  <?php echo json_encode($ns) ?>;
    var curso =  <?php echo json_encode($curso_grafica) ?>;

    Highcharts.chart('chart_alumno', {
        chart: {
            type: 'line'
        },
        title: {
            text: "Rendimiento de: " + users + " en " + curso
        },/*,
	    subtitle: {
	        text: 'Source: WorldClimate.com'
	    },*/
        xAxis: {
            categories:ns
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
</script>
@include('sweetalert::alert')
<script src="{{asset('js/jquery-3.1.0.min.js')}}"></script>
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

@endsection