@extends('layouts.app')
@section('title', 'CENEAE')
<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
<!-- Select2 -->
<style>
    .dataTables_filter{
        margin-left:-60px;
    }
    #TablaAlumnos_paginate{
        margin-left:-70px;
    }
</style>
@section('content')
    <div class="notificationsss bounce ">
        <div class="container  ">
            <div class="row">
                <div class="col-md-12">
                    <div class="card bounceInleft">
                        <div class="card-header">
                            <h4 class="card-title">Alumnos del CENEAE</h4>
                        </div>
                        <div class="card-body">
                            <div id="chart_alumno"></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.highcharts.com/highcharts.js"></script>

    <script type="text/javascript">

        var notas =  <?php echo json_encode($notas) ?>;
        var users =  <?php echo json_encode($users) ?>;
        var ns =  <?php echo json_encode($ns) ?>;

        Highcharts.chart('chart_alumno', {
            chart: {
                type: 'line'
            },
            title: {
                text: "Rendimiento de: " + users
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
@endsection
