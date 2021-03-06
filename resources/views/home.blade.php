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
<div class="container">
    <div class="content">
        <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
            <div class="card-body ">
                <div class="row">
                <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                    <i class=" nc-icon nc-satisfied text-warning"></i>
                    </div>
                </div>
                <div class="col-7 col-md-8">
                    <div class="numbers">
                    <p class="card-category">Alumnos</p>
                    <p class="card-title">150<p>
                    </div>
                </div>
                </div>
            </div>
            <div class="card-footer ">
                <hr>
                <div class="stats">
                <i class="nc-icon nc-paper"></i>
                Detalles
                </div>
            </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
            <div class="card-body ">
                <div class="row">
                <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                    <i class="nc-icon nc-money-coins text-success"></i>
                    </div>
                </div>
                <div class="col-7 col-md-8">
                    <div class="numbers">
                    <p class="card-category">N-dolar</p>
                    <p class="card-title">$ 6,345<p>
                    </div>
                </div>
                </div>
            </div>
            <div class="card-footer ">
                <hr>
                <div class="stats">
                <i class="nc-icon nc-paper  "></i>
                ver lista
                </div>
            </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
            <div class="card-body ">
                <div class="row">
                <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                    <i class="nc-icon nc-cloud-download-93 text-danger"></i>
                    </div>
                </div>
                <div class="col-7 col-md-8">
                    <div class="numbers">
                    <p class="card-category">Archivos</p>
                    <p class="card-title">23<p>
                    </div>
                </div>
                </div>
            </div>
            <div class="card-footer ">
                <hr>
                <div class="stats">
                <i class="fa fa-clock-o"></i>
                In the last hour
                </div>
            </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
            <div class="card-body ">
                <div class="row">
                <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                    <i class="nc-icon nc-calendar-60 text-primary"></i>
                    </div>
                </div>
                <div class="col-7 col-md-8">
                    <div class="numbers">
                    <p class="card-category">Calendario escolar</p>
                    <p class="card-title"><p>
                    </div>
                </div>
                </div>
            </div>
            <div class="card-footer ">
                <hr>
                <div class="stats">
                <i class="nc-icon nc-calendar-60"></i>
                Ver detalles
                </div>
            </div>
            </div>
        </div>
        </div>
        <div class="row">
        <div class="col-md-12">
            <div class="card ">
            <div class="card-header ">
                <h5 class="card-title">Users Behavior</h5>
                <p class="card-category">24 Hours performance</p>
            </div>
            <div class="card-body ">
                <canvas id=chartHours width="400" height="100"></canvas>
            </div>
            <div class="card-footer ">
                <hr>
                <div class="stats">
                <i class="fa fa-history"></i> Updated 3 minutes ago
                </div>
            </div>
            </div>
        </div>
        </div>
        <div class="row">
        <div class="col-md-4">
            <div class="card ">
            <div class="card-header ">
                <h5 class="card-title">Email Statistics</h5>
                <p class="card-category">Last Campaign Performance</p>
            </div>
            <div class="card-body ">
                <canvas id="chartEmail"></canvas>
            </div>
            <div class="card-footer ">
                <div class="legend">
                <i class="fa fa-circle text-primary"></i> Opened
                <i class="fa fa-circle text-warning"></i> Read
                <i class="fa fa-circle text-danger"></i> Deleted
                <i class="fa fa-circle text-gray"></i> Unopened
                </div>
                <hr>
                <div class="stats">
                <i class="fa fa-calendar"></i> Number of emails sent
                </div>
            </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card card-chart">
            <div class="card-header">
                <h5 class="card-title">NASDAQ: AAPL</h5>
                <p class="card-category">Line Chart with Points</p>
            </div>
            <div class="card-body">
                <canvas id="speedChart" width="400" height="100"></canvas>
            </div>
            <div class="card-footer">
                <div class="chart-legend">
                <i class="fa fa-circle text-info"></i> Tesla Model S
                <i class="fa fa-circle text-warning"></i> BMW 5 Series
                </div>
                <hr />
                <div class="card-stats">
                <i class="fa fa-check"></i> Data information certified
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>   
</div>                 
@endsection
