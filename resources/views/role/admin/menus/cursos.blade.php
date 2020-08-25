@extends('layouts.app')
@section('title', 'hola cursos')
@section('content')

    <div class="notificationsss bounce ">
        <div class="container  ">
            <div class="row">
                <div class="col-md-12">
                    <div class="card bounceInleft">
                        <div class="card-header">
                            <h4 class="card-title">Periodo del curso escolar</h4>
                        </div>
                        <div class="card-body">
                            <div class="">
                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- Custom Tabs -->
                                        <div class="nav-tabs-custom">
                                            <ul class="nav nav-tabs" id="myTab">
                                                <li ><a class="btn btn-primary" href="#tab_1" data-toggle="tab">Listado</a></li>
                                                <li><a class="btn btn-primary" href="#tab_2" data-toggle="tab">Nuevo</a></li>


                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tab_1">
                                                    <div class="box">
                                                        <div class="box-header">
                                                            <h3 class="box-title">Lista de Cursos</h3>

                                                        </div>
                                                        <div class="box-body">
                                                            <table id="tblCursos" class="table table-striped table-hover ">
                                                                <thead class=" text-info">
                                                                <tr>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th>Nombre</th>
                                                                    <th>Descripción</th>
                                                                    <th>Periódo</th>
                                                                    <th></th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @forelse($cursos as $curso)
                                                                <tr>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th>{{$curso->nombre_curso}}</th>
                                                                    <th>{{$curso->descripcion}}</th>
                                                                    <th>{{$curso->nombre_periodo}}</th>
                                                                    <th></th>
                                                                </tr>
                                                                @empty
                                                                    <h3>No hay registros</h3>
                                                                @endforelse
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.tab-pane -->
                                                <div class="tab-pane" id="tab_2">
                                                    <div class="box">
                                                        <div class="box-header with-border">
                                                            <h3 class="box-title">Asignatura</h3>
                                                        </div>
                                                        <form action="{{route('curso.store')}}" role="form" method="POST" id="FormCurso">
                                                            @csrf
                                                            <input type="hidden" name="Accion" id="Accion" value="Registrar">

                                                            <div class="box-body">
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <div class="form-group">
                                                                            <label for="Nombre">Nombre</label>
                                                                            <input type="text" class="form-control" id="Nombre"
                                                                                   name="Nombre" placeholder="Ejemplo: ESPAÑOL" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <label for="clave">Clave</label>
                                                                        <input name="clave" id="clave" class="form-control" placeholder="ejemplo: ESPAÑOL6A">
                                                                    </div>
                                                                </div>
                                                               
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-4">
                                                                            <label for="docente">Docente</label>
                                                                            <select id="docente" name="docente" class="form-control" id="grado">
                                                                                <option value="">Seleccionar</option>
                                                                            @foreach ($docentes as $docente)
                                                                            <option value="{{ $docente->id }}">{{ $docente->nombres}}</option>
                                                                            @endforeach
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-4">
                                                                            <label for="grado">Grado</label>
                                                                            <select id="grado" name="grado" class="form-control" id="grado">
                                                                                <option value="">Seleccionar</option>
                                                                                <option value="1">1°</option>
                                                                                <option value="2">2°</option>
                                                                                <option value="3">3°</option>
                                                                                <option value="4">4°</option>
                                                                                <option value="5">5°</option>
                                                                                <option value="6">6°</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-4">
                                                                            <label for="grupo">Grupo</label>
                                                                            <select id="grupo" name="grupo" class="form-control" id="grupo">
                                                                                <option value="">Seleccionar</option>
                                                                                <option value="A">A</option>
                                                                                <option value="B">B</option>
                                                                                <option value="C">C</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>
                                                            <!-- /.box-body -->
                                                            <div class="box-footer">
                                                                <button type="submit" id="Enviar" class="btn btn-primary pull-right">Enviar</button>
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>

                                                <!--<div class="tab-pane" id="tab_3"></div>-->
                                                <!-- /.tab-pane -->
                                            </div>
                                            <!-- /.tab-content -->
                                        </div>
                                        <!-- nav-tabs-custom -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
