@extends('layouts.app')

@section('title', 'Alumnos | CENEAE')

@section('content')
<div class="notificationsss bounce ">
      <div  class="container  ">
        <div class="row">
          <div class="col-md-12">
            <div class="card bounceInleft">
              <div class="card-header">
                <h4 class="card-title">Alumnos del CENEAE</h4>
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
                        CURP
                      </th>
                      <th>
                        Dirección
                      </th>
                      <th>
                        Grado
                      </th>
                      <th>
                        Teléfono
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
                          {{ $alumno->nombres }}&nbsp;{{ $alumno->apellido_paterno }}&nbsp;{{ $alumno->apellido_materno }}
                        </td>
                        <td>
                          {{ $alumno->curp }}
                        </td>
                        <td>
                          {{ $alumno->direccion_tutor }}
                        </td>
                        <td>
                          {{ $alumno->grado }} {{ $alumno->grupo }}
                        </td>
                        <td>
                          {{ $alumno->telefono_tutor }}
                        </td>
                       
                        <td>
                        <a  href="{{route('listaAlumnos.show',['id' => $alumno->id])}}"  class="btn btn-primary">Detalles</a>
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