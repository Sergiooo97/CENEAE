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
                        $
                      </th>
                      <th>
                        Última modificación
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
                          {{ $alumno->nombre }}
                        </td>                      
                        <td>
                         {{$alumno->accion}} - {{$alumno->cantidad}}
                        </td>
                        <td>
                          {{$alumno->created_at}}
                        </td>                      
                        <td>
                        <button class="btn btn-primary">Detalles</button>
                        </td>
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