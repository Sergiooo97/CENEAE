@extends('layouts.app')

@section('title', 'Alumnos | CENEAE')

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
                        Grado|Grupo
                      </th>
                      <th>
                        $
                      </th>                    
                      <th>                        
                      </th>
                    </thead>
                    <tbody>   
                      @foreach ($alumnos as $alumno)                 
                      <tr>
                        <td>
                          {{ $alumno->matricula }}
                        </td>
                        <td>
                          {{ $alumno->nombres }}
                        </td>                      
                        <td>
                          {{ $alumno->grado}}{{ $alumno->grupo }}
                        </td>
                        <td>
                          {{ $alumno->cantidad }}                        </td>                      
                        <td>
                          <a href="{{route('ndolares.show',['id' => $alumno->matricula])}}" style="font-size: 14px;" class="btn btn-primary" >
                            detalles
                        </a>                        </td>
                      </tr>     
                      @endforeach                  
                    </tbody>
                  </table>
                  <!-------------------------------------------termina tabla ---------------------------------->

                  
                </div>
              </div>
            </div>
          </div>     
        </div>          
     
@endsection