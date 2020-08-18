@extends('layouts.app')

@section('title', "Actividades | {$notas->nombre}")


@section('content')
<!-- Button trigger modal -->
<!-- Button trigger modal -->

<!-- Modal -->

<div class="notificationsss bounce ">
    <div style="width: 80%; overflow: hidden;" class="container  ">
        <div class="row">
            <div class="col-md-12">
                <div class="card bounceInleft">
                    <div class="card-header">
                        <h4 class="card-title">Alumnos del CENEAE</h4>
                    </div>
                    <div class="card-body">
                        <div >
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Agregar actividades a {{$notas->nombre}}</span></h3>
                                </div>
                                <div class="box-body">
                                    <form action="{{route('actividad.store')}}" role="form" method="POST" id="FormSubNota">
                                       @csrf
                                        <input type="hidden" name="AccionSubNota" id="AccionSubNota" value="RegistrarSubNota">
                                        <div class="form-group">
                                            <label for="NombreSubNota">Nombre</label>
                                            <input type="text" class="form-control" id="NombreSubNota" name="nombre" placeholder="Ingrese actividad" required autofocus>
                                            <input name="nota_id" value="{{$notas->id}}" hidden>
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
                                    <h3 class="box-title">Lista de actividades</h3>
                                </div>
                                <div class="box-body">
                                    <table id="example" class="table table-striped table-hover " style="width:100%">
                                        <thead class="text-primary">
                                        <tr>

                                            <th>Nombre</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($lista as $lis)
                                        <tr>

                                            <td>
                                                {{$lis->nombre}}
                                            </td>

                                        </tr>
                                        @empty
                                            <h3>Sin registros</h3>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
