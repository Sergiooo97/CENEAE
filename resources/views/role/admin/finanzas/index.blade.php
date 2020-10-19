@extends('layouts.app')
@section('title', 'Finanzas | CENEAE')
<style>
    th{
  white-space:nowrap;
}
td{
  white-space:nowrap;
}
.highcharts-figure, .highcharts-data-table table {
    min-width: 310px; 
    max-width: 800px;
    margin: 1em auto;
}


.highcharts-data-table table {
	font-family: Verdana, sans-serif;
	border-collapse: collapse;
	border: 1px solid #EBEBEB;
	margin: 10px auto;
	text-align: center;
	width: 100%;
	max-width: 500px;
}
.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}
.highcharts-data-table th {
	font-weight: 600;
    padding: 0.5em;
}
.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
    padding: 0.5em;
}
.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
}
.highcharts-data-table tr:hover {
    background: #f1f7ff;
}
</style>
@section('content')
<!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="salidaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ingresos de la escuela</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <ul style="padding-left: 20px !important;">
                    <li>
                        <div class="row">                                
                            @foreach ($conceptos_salidas as $concepto)
                                <div class="col-sm-6">
                                    <p class="slider-label "> {{ $concepto->concepto}}</p>
                                </div>
                                <div class="col-sm-6">
                                <p style="font-weight: bold;" class="text-danger" class="slider-label ">$ {{ number_format($concepto->conceptos) }}</p>
                                </div>
                            @endforeach
                        </div>
                    </li>
                  </ul>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary">Administrar</button>
            </div>
          </div>
        </div>
      </div>
        <!-- Modal -->
  <!-- Modal -->
  <div class="modal fade" id="ingresosModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ingresos de la escuela</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <ul style="padding-left: 20px !important;">
                <li>
                    <div class="row">                                
                        @foreach ($conceptos_ingresos as $concepto)
                            <div class="col-sm-6">
                                <p class="slider-label "> {{ $concepto->concepto}}</p>
                            </div>
                            <div class="col-sm-6">
                            <p style="font-weight: bold;" class="text-success" class="slider-label ">$ {{ number_format($concepto->conceptos) }}</p>
                            </div>
                        @endforeach
                    </div>
                </li>
              </ul>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary">Administrar</button>
        </div>
      </div>
    </div>
  </div>
    <!-- Modal -->

<div class="container">
    <div class="content">
        <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header">
                    <h5>Finanzas de CENEAE</h5>
                </div>
            <div class="card-body">
                <h3 class="text-center">SEPTIEMBRE</h3>
                <div class="row">
                    <div class="container">   
                        <ul>
                            <li>
                                <a class="dropdown-btn">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="">PRESUPUESTO MENSUAL</p>
                                        </div>
                                        <div class="col-sm-6 text-success">
                                            <p style="font-weight: bold;" class="">$ 0</p>
                                        </div>
                                    </div>                          
                                </a>  
                            </li>
                            <li>
                                <button type="button" class="dropdown-btn" style="background: transparent !important; color: #000;" data-toggle="modal" data-target="#ingresosModal">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="">INGRESOS DE LA ESCUELA</p>
                                        </div>
                                        <div class="col-sm-6 text-success">
                                            <p style="font-weight: bold;" class="">$ {{ number_format($ingresos->total_ingreso) }}</p>
                                        </div>
                                    </div> 
                                  </button>
                              </li>
                              <li>
                                <button type="button" class="dropdown-btn" style="background: transparent !important; color: #000;" data-toggle="modal" data-target="#salidaModal">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="">MONTHLY DISCHARGE</p>
                                        </div>
                                        <div class="col-sm-6 text-danger">
                                            <p style="font-weight: bold;" class="">$ {{ number_format($salidas->total_salida) }}</p>
                                     
                                        </div>
                                    </div>                          
                                </button>
                              </li>
                            <li>
                                <a class="dropdown-btn">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="">TOTAL</p>
                                        </div>
                                        <div class="col-sm-6 text-success">
                                            <p style="font-weight: bold;" class="">$ {{ number_format($tot) }}</p>
                                        </div>
                                    </div>                          
                                </a>  
                            </li>

                        </ul>                   
                       
              

                </div>
                </div>
            <a href="{{ route('finanzas.create')}}" class="btn btn-info pull-right">Administrar</a>
            </div>
        </div>
    </div>
<!------------------------Inicia card gráfica --------------------->
    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats">
           
            <div class="card-body">
                <div id="chart_alumno"></div>
            </div>
        </div>
    </div>
    <a href="#" class="btn btn-warning">Descargar informe</a>

</div>
 <script src="{{asset('js/Highcharts/highcharts.js')}}"></script>
<script src="{{asset('js/Highcharts/exporting.js')}}"></script>
<script src="{{asset('js/Highcharts/export-data.js')}}"></script>
<script src="{{asset('js/Highcharts/accessibility.js')}}"></script>

<!-- <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script> -->
<script>

    var ingresos =  <?php echo json_encode($ingresos_grafica) ?>;
    var salidas =  <?php echo json_encode($salidas_grafica) ?>;
    var presupuesto =  <?php echo json_encode($presupuesto_grafica) ?>;
    var mes =  <?php echo json_encode($mes_grafica) ?>;
    var total =  <?php echo json_encode($total_grafica) ?>;

    Highcharts.setOptions({
       colors: ['#ef8157', '#6bd098', '#fbc658', '#51bcda',  '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4']
    });

    Highcharts.chart('chart_alumno', {
        chart: {
        type: 'column'
    },
    title: {
        text: 'Finanzas del ciclo 2020-2021'
    },
    subtitle: {
        text: 'CENTRO EDUCATIVO NATANAEL'
    },
    xAxis: {
        categories:mes,
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: '$'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>$ {point.y:.1f} </b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [ {
        name: 'Salidas',
        data: salidas

    }, {
        name: 'Ingreso de la escuela',
        data: ingresos

    }, {
        name: 'Presupuesto mensual',
        data: presupuesto

    }, {
        name: 'Total disponible',
        data: total

    },
    ]
    });
</script>
@endsection