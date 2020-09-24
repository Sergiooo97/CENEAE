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
                            <div class="col-sm-6">
                                <p class="slider-label ">Nomina</p>
                            </div>
                            <div class="col-sm-6">
                                <p style="font-weight: bold;" class="text-danger" class="slider-label ">$ 1,000.00</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row">
                            <div class="col-sm-6">
                                <p class="slider-label ">Eventos</p>
                            </div>
                            <div class="col-sm-6">
                                <p style="font-weight: bold;" class="text-danger">$ 3,000.00</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row">
                            <div class="col-sm-6">
                                <p class="slider-label ">Varios</p>
                            </div>
                            <div class="col-sm-6">
                                <p style="font-weight: bold;" class="text-danger">$ 6,000.00</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row">
                            <div class="col-sm-6">
                                <p class="slider-label ">Mantenimiento</p>
                            </div>
                            <div class="col-sm-6">
                                <p style="font-weight: bold;" class="text-danger">$ 600.00</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row">
                            <div class="col-sm-6">
                                <p class="slider-label ">Utilidades</p>
                            </div>
                            <div class="col-sm-6">
                                <p style="font-weight: bold;" class="text-danger">$ 900.00</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row">
                            <div class="col-sm-6">
                                <p class="slider-label ">Salarios</p>
                            </div>
                            <div class="col-sm-6">
                                <p  style="font-weight: bold;" class="text-danger">$ 0.00</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row">
                            <div class="col-sm-6">
                                <p class="slider-label ">Corriente Eléctrica</p>
                            </div>
                            <div class="col-sm-6">
                                <p  style="font-weight: bold;" class="text-danger">$ 0.00</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row">
                            <div class="col-sm-6">
                                <p class="slider-label ">Entregado</p>
                            </div>
                            <div class="col-sm-6">
                                <p  style="font-weight: bold;" class="text-danger">$ 0.00</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row">
                            <div class="col-sm-6">
                                <p class="slider-label ">Insumo planta de agua</p>
                            </div>
                            <div class="col-sm-6">
                                <p  style="font-weight: bold;" class="text-danger">$ 0.00</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row">
                            <div class="col-sm-6">
                                <p class="slider-label ">Gasto de planta de agua</p>
                            </div>
                            <div class="col-sm-6">
                                <p  style="font-weight: bold;" class="text-danger">$ 0.00</p>
                            </div>
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
                        <div class="col-sm-6">
                            <p class="slider-label ">DONATIVOS CENEAE</p>
                        </div>
                        <div class="col-sm-6">
                            <p style="font-weight: bold;" class="text-success">$ 1,000.00</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row">
                        <div class="col-sm-6">
                            <p class="slider-label ">Coutas, examenes, copias</p>
                        </div>
                        <div class="col-sm-6">
                            <p style="font-weight: bold;" class="text-success">$ 3,000.00</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row">
                        <div class="col-sm-6">
                            <p class="slider-label ">Colegiaturas</p>
                        </div>
                        <div class="col-sm-6">
                            <p style="font-weight: bold;" class="text-success">$ 6,000.00</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row">
                        <div class="col-sm-6">
                            <p class="slider-label ">Desayunos</p>
                        </div>
                        <div class="col-sm-6">
                            <p style="font-weight: bold;" class="text-success">$ 600.00</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row">
                        <div class="col-sm-6">
                            <p class="slider-label ">Internet</p>
                        </div>
                        <div class="col-sm-6">
                            <p style="font-weight: bold;" class="text-success">$ 900.00</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row">
                        <div class="col-sm-6">
                            <p class="slider-label ">Renta local</p>
                        </div>
                        <div class="col-sm-6">
                            <p style="font-weight: bold;" class="text-success">$ 0.00</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row">
                        <div class="col-sm-6">
                            <p class="slider-label ">Renta de taxi</p>
                        </div>
                        <div class="col-sm-6">
                            <p style="font-weight: bold;" class="text-success">$ 0.00</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row">
                        <div class="col-sm-6">
                            <p class="slider-label ">Planta de agua</p>
                        </div>
                        <div class="col-sm-6">
                            <p style="font-weight: bold;" class="text-success">$ 0.00</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row">
                        <div class="col-sm-6">
                            <p class="slider-label ">Devol. de prestamo</p>
                        </div>
                        <div class="col-sm-6">
                            <p style="font-weight: bold;" class="text-success">$ 0.00</p>
                        </div>
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
                                            <p style="font-weight: bold;" class="">$ 21,000.00</p>
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
                                            <p style="font-weight: bold;" class="">$ 11,500.00</p>
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
                                            <p style="font-weight: bold;" class="">$ 6,000.00</p>
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
                                            <p style="font-weight: bold;" class="">$ 31,000.00</p>
                                        </div>
                                    </div>                          
                                </a>  
                            </li>

                        </ul>                   
                       
                          <script  type="application/javascript">
                            var dropdown = document.getElementsByClassName("dropdown-btn");
                                    var i;
                
                                    for (i = 0; i < dropdown.length; i++) {
                                        dropdown[i].addEventListener("click", function() {
                                            this.classList.toggle("active");
                                            var dropdownContent = this.nextElementSibling;
                                            if (dropdownContent.style.display === "block") {
                                                dropdownContent.style.display = "none";
                                            } else {
                                                dropdownContent.style.display = "block";
                                            }
                                        });
                                    }
                          </script> 

                </div>
                </div>
            <a href="{{ route('finanzas.create')}}" class="btn btn-info pull-right">Administrar</a>
            </div>
        </div>
        <a href="#" class="btn btn-warning">Descargar informe</a>
    </div>
<!------------------------Inicia card gráfica --------------------->
    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats">
           
            <div class="card-body">
                <div id="chart_alumno"></div>
            </div>
        </div>
    </div>

</div>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>


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
        categories: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ],
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
            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
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
    series: [{
        name: 'Ingreso de la escuela',
        data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

    }, {
        name: 'Salidas',
        data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]

    }, {
        name: 'Presupuesto mensual',
        data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]

    }]
    });
</script>
@endsection