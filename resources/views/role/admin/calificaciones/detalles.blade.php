@extends('layouts.app')
@section('title', 'detalles | CENEAE')
<style>
    .tbl{
        overflow:hidden;
    }
    .table-responsive:hover{
        overflow:scroll !important;
    }

</style>
@section('content')
    <div class="notificationsss bounce ">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card bounceInleft">
                        <div class="card-header">
                            <h4 class="card-title">Calificaciones de {{$alumno->nombres}}</h4>
                        </div>
                        <div class="card-body">
                            <div style="overflow:hidden;"  class="table-responsive tbl">
                                <table id="example" class="table table-striped table-hover " style="width:100%">
                               <tr style="background-color: #e0f3ef; border:1px dashed #ccc;" class="text-primary">
                                   <td style="border:1px dashed #ccc;" colspan="2"></td>
                           <!--================= Mostrar la fina de los bimestres ================================-->
                               @forelse($periodos as $periodo)
                                   <td style="border:1px dashed #ccc; padding-bottom: 0px; padding-top: 0px; font-size: 28px;"  colspan="{{$bimestres_total->Total}}">{{$periodo->nombre}}</td>
                                   @empty
                                   <p>sin bimestres</p>
                                   @endforelse
                               </tr>
                               <tbody>
                       @forelse($cursos as $crs) <!-- forelese para obtener el id de los cursos -->
                           <tr style="border:1px dashed #ccc;" class="">
                           <!--================= Mostrar la columna de los nombre de los cursos ================================-->
                           @forelse($cursos_nombre as $curso)
                                   @if($curso->id == $crs)
                                       <td class="text-primary" style="  padding-bottom: 0px; padding-top: 0px;border: 0px; font-size: 28px; background-color: #e0f3ef;" rowspan="2" colspan="2">{{$curso->nombre}}</td>
                                   @endif
                               @empty
                                   <p>No hay registros</p>
                               @endforelse
                           <!--================= Mostrar la fina de las actividades ================================-->
                           @forelse($promedio as $prom)
                                   @if($prom->curso_id == $crs)<!-- solo cuando el id del curso sea igual al id que recibe del forelse de cursos-->
                                           <td  style="padding-bottom: 0px; padding-top: 0px;border:1px dashed #ccc; background-color: #e0f3ef; font-size: 20px; padding: 10px;">{{$prom->ns_nombre}}</td>
                                       @endif
                                   @empty
                                       <p>No hay registros</p>
                                   @endforelse
                               </tr>
                               <tr>
                                   <!--================= Mostrar la fina de las calificaciones ================================-->
                               @forelse($promedio as $prom)
                                       @if($prom->curso_id == $crs) <!-- solo cuando el id del curso sea igual al id que recibe del forelse de cursos-->
                                           @if($prom->nota >= 8)
                                       <td style="color: #0dce37; border:1px dashed #00a701; font-size: 20px; padding: 10px;">{{$prom->nota}}</td>
                                           @elseif($prom->nota >=6 && $prom->nota <=8 )
                                               <td  style="color: #d29216; border:1px dashed #ccc; font-size: 20px; padding: 10px;">{{$prom->nota}}</td>
                                           @elseif($prom->nota <=5 )
                                               <td  style="color: #ff0000; border:1px dashed #ccc; font-size: 20px; padding: 10px;">{{$prom->nota}}</td>
                                           @endif
                                       @endif
                               @empty
                                       <p>No hay registros</p>
                               @endforelse
                               </tr>
                       @empty
                           <p>No hay registros</p>
                       @endforelse
                               </tbody>
                           </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card bounceInleft">
                        <div class="card-header">
                            <h4 class="card-title">Promedios de {{$alumno->nombres}}</h4>
                        </div>
                        <div class="card-body">
                            <div style="overflow:hidden;"  class="table-responsive tbl">
                                <table id="example" class="table table-striped table-hover " style="width:100%">
                                    <tr style="background-color: #e0f3ef; border:1px dashed #ccc;" class="text-primary">
                                        <td style="border:1px dashed #ccc;" colspan="2"></td>
                                        <td style="border:1px dashed #ccc; padding-bottom: 0px; padding-top: 0px; font-size: 28px;" width="200px" colspan="1" >Promedio final</td>

                                        <!--================= Mostrar la fina de los bimestres ================================-->
                                        @forelse($periodos as $periodo)
                                            <td style="border:1px dashed #ccc; padding-bottom: 0px; padding-top: 0px; font-size: 28px;" width="200px" colspan="1" >{{$periodo->nombre}}</td>
                                        @empty
                                            <p>sin bimestres</p>
                                        @endforelse

                                    </tr>
                                    <tbody>

                                    @forelse($cursos as $crs) <!-- forelese para obtener el id de los cursos -->
                                    <tr style="border:1px dashed #ccc;" class="">

                                        <!--================= Mostrar la columna de los nombre de los cursos ================================-->
                                        @forelse($cursos_nombre as $curso)
                                            @if($curso->id == $crs)
                                                <td class="text-primary" style="  padding-bottom: 0px; padding-top: 0px;border: 0px; font-size: 28px; background-color: #e0f3ef;" rowspan="2" colspan="2">{{$curso->nombre}}</td>
                                            @endif
                                        @empty
                                            <p>No hay registros</p>
                                        @endforelse
                                    <!--================= Mostrar la fina de las actividades ================================-->
                                        @forelse($promedioFINAL as $prom)
                                            @if($prom->curso_id == $crs) <!-- solo cuando el id del curso sea igual al id que recibe del forelse de cursos-->
                                            <td rowspan="2"   style="border:1px dashed #ccc; font-size: 20px; padding: 10px;"><small>final: </small>{{round($prom->prom)}}</td>
                                            @endif
                                        @empty
                                            <p>No hay registros</p>
                                        @endforelse
                                    </tr>
                                    <tr>
                                        <!--================= Mostrar la fina de las calificaciones ================================-->
                                    @forelse($promedioFIN as $prom)
                                        @if($prom->curso_id == $crs) <!-- solo cuando el id del curso sea igual al id que recibe del forelse de cursos-->
                                            <td  style="border:1px dashed #ccc; font-size: 20px; padding: 10px;">{{round($prom->prom)}}</td>
                                            @endif
                                        @empty
                                            <p>No hay registros</p>
                                        @endforelse


                                    </tr>
                                    @empty
                                        <p>No hay registros</p>
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

@endsection
