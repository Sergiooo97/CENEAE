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
                <h4 class="card-title">Banco de CENEAE</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                                    <!-------------------------------------------empieza tabla ---------------------------------->

                  <table class="table ">
                    <thead class=" text-primary">
                      <th>
                        Clave
                      </th>
                      <th>
                        Nombres
                      </th>
                      <th>
                        $
                      </th>
                      <th>
                        Última modificación
                      </th>                    
                    
                    </thead>
                    <tbody>        
                      @foreach ($alumnos as $alumno)           
                      <tr>
                        <td>
                          {{ $alumno->matricula }}
                        </td>
                        <td>
                          {{ $alumno->nombre }}
                        </td>                      
                        <td>
                         {{$alumno->accion}} de ${{$alumno->cantidad}}
                        </td>
                        <td>
                          {{$alumno->created_at}}
                        </td>                      
                        
                      </tr>       
                      @endforeach              
                    </tbody>
                  </table>
                  {{ $alumnos->appends($_GET)->links() }}

                  <!-------------------------------------------termina tabla ---------------------------------->

                  
                </div>
              </div>
            </div>
            <a href="{{route('alumnos.show',['id' => $alumno->id_alumno])}}" class="btn btn-info"> info del alumno <i  class="nc-icon nc-alert-circle-i"></i></a>

          </div>     
        </div>          
     
@endsection