@extends('layouts.app')
@section('title', 'Grupos | CENEAE')
@section('content')
   <div class="notificationsss bounce ">
    <div class="container  ">
      <div class="row">
        <div class="col-md-12">
          <div class="card bounceInleft">
            <div class="card-header">
              <h4 class="card-title">Grupos del CENEAE</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <!-------------------------------------------empieza tabla ---------------------------------->
              
                <button style="font-size: 18px;" type="button" class="btn btn-success" data-toggle="modal" data-target="#asistencias-Modal">
                    <i  class="nc-icon nc-single-copy-04"></i>
                    Orden de lista y periodo
                  </button>
          
                <!-------------------------------------------termina tabla ---------------------------------->
  
  
              </div>
            </div>
          </div>
          <!-- Modal assistencias -->
          <div class="modal fade" id="asistencias-Modal" tabindex="-1" role="dialog" aria-labelledby="asistencias-Modal"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Orden de lista y periodo de grupos</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <a href ="{{route('grupos.edit',['grado' => '1', 'grupo' => 'A'])}}" class="btn btn-success"><i class="nc-icon nc-cloud-download-93"></i> 1°A</a>
                  <a href ="{{route('grupos.edit',['grado' => '1', 'grupo' => 'B'])}}" class="btn btn-success"><i class="nc-icon nc-cloud-download-93"></i> 1°B</a>
                  <a href ="{{route('grupos.edit',['grado' => '2', 'grupo' => 'A'])}}" class="btn btn-success"><i class="nc-icon nc-cloud-download-93"></i> 2°A</a>
                  <a href ="{{route('grupos.edit',['grado' => '2', 'grupo' => 'B'])}}" class="btn btn-success"><i class="nc-icon nc-cloud-download-93"></i> 2°B</a>
                  <a href ="{{route('grupos.edit',['grado' => '3', 'grupo' => 'A'])}}" class="btn btn-success"><i class="nc-icon nc-cloud-download-93"></i> 3°A</a>
                  <a href ="{{route('grupos.edit',['grado' => '3', 'grupo' => 'B'])}}" class="btn btn-success"><i class="nc-icon nc-cloud-download-93"></i> 3°B</a>
                  <a href ="{{route('grupos.edit',['grado' => '4', 'grupo' => 'A'])}}" class="btn btn-success"><i class="nc-icon nc-cloud-download-93"></i> 4°A</a>
                  <a href ="{{route('grupos.edit',['grado' => '4', 'grupo' => 'B'])}}" class="btn btn-success"><i class="nc-icon nc-cloud-download-93"></i> 4°B</a>
                  <a href ="{{route('grupos.edit',['grado' => '5', 'grupo' => 'A'])}}" class="btn btn-success"><i class="nc-icon nc-cloud-download-93"></i> 5°A</a>
                  <a href ="{{route('grupos.edit',['grado' => '5', 'grupo' => 'B'])}}" class="btn btn-success"><i class="nc-icon nc-cloud-download-93"></i> 5°B</a>
                  <a href ="{{route('grupos.edit',['grado' => '6', 'grupo' => 'A'])}}" class="btn btn-success"><i class="nc-icon nc-cloud-download-93"></i> 6°A</a>
                  <a href ="{{route('grupos.edit',['grado' => '6', 'grupo' => 'B'])}}" class="btn btn-success"><<i class="nc-icon nc-cloud-download-93"></i> 6°B</a>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
              </div>
            </div>
          </div>
          <!-- Modal listas -->
          <div class="modal fade" id="listas-infoModal" tabindex="-1" role="dialog" aria-labelledby="listas-infoModal"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Descargar listas</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <a href ="{{route('exportar_lista',['grado' => '1', 'grupo' => 'A'])}}" class="btn btn-danger"><i class="nc-icon nc-cloud-download-93"></i> 1°A</a>
                  <a href ="{{route('exportar_lista',['grado' => '1', 'grupo' => 'B'])}}" class="btn btn-danger"><i class="nc-icon nc-cloud-download-93"></i> 1°B</a>
                  <a href ="{{route('exportar_lista',['grado' => '2', 'grupo' => 'A'])}}" class="btn btn-danger"><i class="nc-icon nc-cloud-download-93"></i> 2°A</a>
                  <a href ="{{route('exportar_lista',['grado' => '2', 'grupo' => 'B'])}}" class="btn btn-danger"><i class="nc-icon nc-cloud-download-93"></i> 2°B</a>
                  <a href ="{{route('exportar_lista',['grado' => '3', 'grupo' => 'A'])}}" class="btn btn-danger"><i class="nc-icon nc-cloud-download-93"></i> 3°A</a>
                  <a href ="{{route('exportar_lista',['grado' => '3', 'grupo' => 'B'])}}" class="btn btn-danger"><i class="nc-icon nc-cloud-download-93"></i> 3°B</a>
                  <a href ="{{route('exportar_lista',['grado' => '4', 'grupo' => 'A'])}}" class="btn btn-danger"><i class="nc-icon nc-cloud-download-93"></i> 4°A</a>
                  <a href ="{{route('exportar_lista',['grado' => '4', 'grupo' => 'B'])}}" class="btn btn-danger"><i class="nc-icon nc-cloud-download-93"></i> 4°B</a>
                  <a href ="{{route('exportar_lista',['grado' => '5', 'grupo' => 'A'])}}" class="btn btn-danger"><i class="nc-icon nc-cloud-download-93"></i> 5°A</a>
                  <a href ="{{route('exportar_lista',['grado' => '5', 'grupo' => 'B'])}}" class="btn btn-danger"><i class="nc-icon nc-cloud-download-93"></i> 5°B</a>
                  <a href ="{{route('exportar_lista',['grado' => '6', 'grupo' => 'A'])}}" class="btn btn-danger"><i class="nc-icon nc-cloud-download-93"></i> 6°A</a>
                  <a href ="{{route('exportar_lista',['grado' => '6', 'grupo' => 'B'])}}" class="btn btn-danger"><<i class="nc-icon nc-cloud-download-93"></i> 6°B</a>
                  <a href="{{url('admin/download/lista-todos')}}" class="btn btn-danger"><i class="nc-icon nc-cloud-download-93"></i> Todos (Sin formato)</a>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
              </div>
            </div>
          </div>
  
         
          <!-- Button trigger modal -->
         
  
  
        </div>
      </div>
      <script src="{{asset('js/jquery-3.1.0.min.js')}}"></script> 
@endsection