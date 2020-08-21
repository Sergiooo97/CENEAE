@extends('layouts.app')

@section('title', "N-dolares | CENEAE")
<style>
  .page-item.active .page-link {
    z-index: 3;
    color: #fff;
    background-color: #007B8D !important;
    border-color: #007B8D !important;
  }

  .page-link {
    position: relative;
    display: block;
    padding: .5rem .75rem;
    margin-left: -1px;
    line-height: 1.25;
    color: #007B8D !important;
    background-color: #fff;
    border: 1px solid #dee2e6;
  }

  .page-item.active .page-link {
    z-index: 3;
    color: #fff !important;
    background-color: #007B8D;
    border-color: #007B8D;
  }
  </style>
@section('content')
<div class="notificationsss bounce ">
      <div  class="container  ">
        <div class="row">
          <div class="col-md-12">
            <div class="card bounceInleft">
              <div class="card-header">
                <h4 class="card-title btn-volver-container">Banco de CENEAE</h4>
                <h5>Historial ndolares de {{ $alumno_matricula->nombres }}</h5>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                                    <!-------------------------------------------empieza tabla ---------------------------------->

                  <table class="table ">
                    <thead class=" text-primary">                  
                      <th>$</th>
                      <th>Fecha</th>
                      <th>Hora</th>
                    </thead>
                    <tbody>
                      @forelse ($alumnos  as $alumno)
                      <tr>                                        
                        <td>{{$alumno->accion}} de ${{$alumno->cantidad}}</td>
                        <td>{{ $alumno->created_at->isoFormat('D-M-Y') }}</td>
                        <td>{{ $alumno->created_at->isoFormat('H:mm A') }}</td>
                        @empty
                        <p style="font-size: 20px;">No hay registros</p>
                      </tr>                   
                      @endforelse
                    </tbody>
                  </table>
                  {{ $alumnos->appends($_GET)->links() }}

                  <!-------------------------------------------termina tabla ---------------------------------->
                </div>
              </div>
            </div>
            @if(Auth::user()->hasRole('admin'))
            <a href="{{route('alumnos.show',['id' => $id_alumno->id,])}}" class="btn btn-info"> info del alumno<i  class="nc-icon nc-alert-circle-i"></i></a>
            @endif
            <a href="{{route('exportar_ndolar_info',['id' => $id_alumno->id, 'nombre'=>$id_alumno->nombres])}}" class="btn btn-warning">Descargar historial de {{$id_alumno->nombres}} <i  class="nc-icon nc-alert-circle-i"></i></a>
          </div>
        </div>

@endsection
