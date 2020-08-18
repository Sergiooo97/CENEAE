@extends('layouts.app')

@section('title', "calificacion |")
<style>
    .curso-asignar a{
        font-size: 30px;
        color: #ffffff;
    }
</style>

@section('content')
    <div class="notificationsss bounce ">
        <div class="container  ">
            <div class="row">
                <div class="col-md-12">
                    <div class="card bounceInleft">
                        <div class="card-header">
                            <h4 class="card-title">Seleccione asignatura a calificar</h4>
                        </div>
                        <div class="card-body">
                            <div class="">
                                <div class="row">

                                    <div class="container">

                                       <!-- <div class="form-group forom-inline pull-right">
                                            <select name="PeriodosCb" id="PeriodosCb" class="form-control" style="font-size: 17px;">
                                                <option value="">Seleccione Periódo</option>
                                                @foreach($periodos as $periodo)
                                                    <option value="{{ $periodo->id }}">
                                                        {{ $periodo->nombre }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div> -->

                                                <div class="container curso-asignar">
                                                    @foreach($cursos as $curso)
                                                                    <a href="{{route('asignar.create',['curso_id' => $curso->curso_id, 'curso_grado'=>$curso->grado, 'curso_grupo'=>$curso->grupo,'nota_id' => $curso->nota_id])}}" class="btn btn-success"
                                                                       id="{{ $curso->nota_id }}"
                                                                        name="{{ $curso->_nota_e }}">
                                                                        {{ $curso->curso_nombre }} <br/>
                                                                        <small style="font-size: 17px;">{{$curso->clave}}</small>
                                                                    </a>

                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>

                                       <!-- <div class="col-md-12">
                                            <div class="alert alert-warning alert-dismissible">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                <h4><i class="icon fa fa-warning"></i> Advertencia!</h4>
                                                No existen cursos registrados para este periódo
                                            </div>
                                        </div> -->



                                </div>






                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
