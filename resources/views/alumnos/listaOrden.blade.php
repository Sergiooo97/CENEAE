@extends('layouts.app')
@section('title', 'orden de lista | CENEAE')
@section('content')
    
<div class="notificationsss bounce ">
    <div class="container  ">
      <div class="row">
        <div class="col-md-12">
          <div class="card bounceInleft">
            <div class="card-header">
              <h4 class="card-title">Alumnos del CENEAE</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <!-------------------------------------------empieza tabla ---------------------------------->
                <table id="example" class="table table-striped table-hover " style="width:100%">
                    <thead class=" text-info">
                      <th>
                        No. lista
                      </th>
                      <th>
                        Apellidos
                      </th>
                      <th>
                        Nombres
                      </th>
                      <th>
                        grado
                      </th>
                      <th>
                        grupo
                      </th>
                     
                    </thead>
                    @foreach ($alumnos as $count=>$alumno)
                <form method="POST" action="{{route('alumnos.updateOrden',$alumno->grado)}}">
                    @csrf @method('PATCH')
                    <input id="id[]" value="{{$alumno->id}}" name="id[]" class="form-control" hidden/>
                    <input  value="{{$alumno->matricula}}" name="matricula[]" class="form-control" hidden/>
                   
                   
                    <tbody>
                      
                      <tr>
                        <td style="width: 3em;">
                        <input id="orden[]"  value="{{++$count}}" name="orden[]" class="form-control"/>
                        </td>
                        <td>
                          {{ $alumno->apellido_paterno }}&nbsp;{{ $alumno->apellido_materno }}
                        </td>
                        <td>
                            {{ $alumno->nombres }}                      </td>
                       
                        <td>
                          {{ $alumno->grado }} 
                        </td>
                        <td>

                            {{ $alumno->grupo }}                        </td>
                    
    
                      </tr>
                      @endforeach
    
    
    
                    </tbody>
                  </table>
              
                <!-------------------------------------------termina tabla ---------------------------------->
  
  
              </div>
            </div>
          </div>
          
  
          <!-- Button trigger modal -->
          <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#listas-infoModal">
            <i class="nc-icon nc-cloud-download-93"></i>
            ordenar
          </button>
        
  
        </form>

  
        </div>
      </div>
      <script src="{{asset('js/jquery-3.1.0.min.js')}}"></script>
@endsection