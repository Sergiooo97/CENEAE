@extends('layouts.app', ['cursos' => $cursos->curso_id])
@section('title', 'Ceneae alumno')
@section('content')
<div style="padding:1em;" class="content">
    <h5>Hola {{ $alumnos->nombres}}</h5>

    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <img src="{!! asset('img/034-locker.svg') !!}">
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Ndolares</p>
                                <p class="card-title">{{ $alumnos->ndolar_cantidad}}<p>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="{{route('alumnos.index')}}">
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <img src="{!! asset('img/034-locker.svg') !!}" height="30px" width="30px">
                            <p style="font-size:18px; float:right;">
                                <a
                                    href="{{ route('alumno.rendimiento.user', ['n_id'=>$cursos->curso_id])}}">Ver
                                    detalles 
                                </a>
                            </p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <img src="{!! asset('img/002-medal.svg') !!}">

                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Rendimiento</p>
                                <p class="card-title text-success">
                                    Bueno
                                <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <img src="{!! asset('img/002-medal.svg') !!}" height="30px" width="30px">
                        <p style="font-size:18px; float:right;">
                            <a
                                href="{{ route('alumno.rendimiento.user', ['n_id'=>$cursos->curso_id])}}">Ver
                                detalles 
                            </a>
                        </p>
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
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Aún nada</p>
                                <p class="card-title">404
                                    <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-refresh"></i> nada aún
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
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Aún nada</p>
                                <p class="card-title">404
                                    <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-refresh"></i> nada aún
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection