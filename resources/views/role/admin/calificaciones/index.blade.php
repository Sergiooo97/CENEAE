@extends('layouts.app')

@section('title', "calificacion |")


@section('content')
    <div class="notificationsss bounce ">
        <div class="container  ">
            <div class="row">
                <div class="col-md-12">
                    <div class="card bounceInleft">
                        <div class="card-header">
                            <h4 class="card-title">Calificación de asignatura</h4>
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
                                                <li><a  href="#tab_3" data-toggle="tab" id="Tab3" style="display: none;">Estructura</a></li>
                                                <!--<li><a href="#tab_3" data-toggle="tab">Tab 3</a></li>-->

                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tab_1">
                                                    <div class="box">
                                                        <div class="box-header">
                                                            <h3 class="box-title">Lista de Notas</h3>
                                                        </div>
                                                        <div class="box-body">
                                                            <table id="example" class="table table-striped table-hover " style="width:100%">
                                                                <thead class="text-primary">
                                                                <tr>

                                                                    <th>Nombre</th>
                                                                    <th>Descripción</th>
                                                                    <th>Asignatura</th>
                                                                    <th></th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @forelse($notas as $nota)
                                                                <tr>
                                                                    <td>{{$nota->nota_nombre}}</td>
                                                                    <td>{{$nota->descripcion}}</td>
                                                                    <td>{{$nota->curso_nombre}}</td>
                                                                    <td><a href="{{route('calificaciones.show', ['curso_id'=>$nota->curso_id])}}" class="btn btn-success">Registrar actividades</a></td>
                                                              </tr>

                                                                @empty
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
                                                            <h3 class="box-title">Curso</h3>
                                                        </div>
                                                        <form action="{{route('calificaciones.store')}}" role="form" method="POST" id="FormNota">
                                                           @csrf
                                                            <input type="hidden" name="Accion" id="Accion" value="Registrar">

                                                            <div class="box-body">
                                                                <div class="form-group">
                                                                    <label for="Curso">Curso</label>
                                                                    <select class="form-control" style="width:100%;" id="Curso" name="Curso" required>
                                                                        @if(count($cursos)>0)
                                                                            <option value="">Seleccione curso</option>
                                                                            @foreach($cursos as $cur)
                                                                                <option value="{{ $cur->id }}">{{ $cur->nombre }}</option>
                                                                            @endforeach
                                                                        @else
                                                                            <option value="">No hay cursos registrados</option>
                                                                        @endif
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="Nombre">Nombre</label>
                                                                    <input type="text" class="form-control" id="Nombre" name="Nombre" placeholder="Ingrese Nombre" required>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="Descripcion">Descripción</label>
                                                                    <textarea class="form-control" name="Descripcion" id="Descripcion" rows="3" placeholder="Ingrese Descripción"></textarea>
                                                                </div>

                                                            </div>
                                                            <!-- /.box-body -->
                                                            <div class="box-footer">
                                                                <button type="submit" id="Enviar" class="btn btn-primary pull-right">Enviar</button>
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>
                                                <div class="tab-pane" id="tab_3" >
                                                    <div class="box">
                                                        <div class="box-header with-border">
                                                            <h3 class="box-title">Agregar Sub Notas a <span id="NombreNota"></span></h3>
                                                        </div>
                                                        <div class="box-body">
                                                            <form role="form" method="POST" id="FormSubNota">
                                                                <input type="hidden" name="AccionSubNota" id="AccionSubNota" value="RegistrarSubNota">
                                                                <div class="form-group">
                                                                    <label for="NombreSubNota">Nombre</label>
                                                                    <input type="text" class="form-control" id="NombreSubNota" name="NombreSubNota" placeholder="Ingrese Nombre de la Sub Nota" required autofocus>
                                                                </div>
                                                                <!-- /.box-body -->
                                                                <div class="box-footer">
                                                                    <button type="submit" id="EnviarForm" class="btn btn-primary pull-right">Enviar</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>

                                                    <div class="box">
                                                        <div class="box-header with-border">
                                                            <h3 class="box-title">Lista de Sub Notas</h3>
                                                        </div>
                                                        <div class="box-body">
                                                            <table id="tblSubNotas" class="table table-bordered table-hover" width="100%">
                                                                <thead>
                                                                <tr>
                                                                    <th></th>
                                                                    <th>Nombre</th>
                                                                    <th></th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
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


@endsection
