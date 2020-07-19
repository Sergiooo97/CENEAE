@extends('layouts.app')

@section('title', 'Alumnos | CENEAE')
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
              <form action="{{route('listaAlumnos')}}" method="GET" class="form-inline pull-right" role="search">
                <label for="grado"> Grado: </label>
                <select name="grado" class="form-control" id="grado" onchange="this.form.submit()" >
                  <option value="{{request('grado')}}">{{request('grado')}}</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select>
                <label for="grupo"> Grado: </label>
                <select  name="grupo" class="form-control" id="grupo" onchange="this.form.submit();  ">
                  <option value="{{request('grupo')}}">{{request('grupo')}}</option>
                  <option value="A">A</option>
                  <option value="B">B</option>
                  
                </select>
                <label for="nombres">Nombre:</label>
                <input value="{{ request('nombres')}}" name="nombres" id="nombres" class="form-control" onkeydown="document.ready = document.getElementById('grado').value = '0';document.ready = document.getElementById('grupo').value = '0';"/> 
               
                <button type="submit" class="btn btn-primary">Buscar</button>
              </form>
              <table id="example" class="table table-striped table-hover " style="width:100%">
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
                    <td><a href="{{route('listaAlumnos.show',['id' => $alumno->id])}}">
                        {{ $alumno->nombres }}&nbsp;{{ $alumno->apellido_paterno }}&nbsp;{{ $alumno->apellido_materno }}
                      </a></td>
                    <td>
                      {{ $alumno->curp }}
                    </td>
                    <td>
                      {{ $alumno->direccion }}
                    </td>
                    <td>
                      {{ $alumno->grado }} {{ $alumno->grupo }}
                    </td>
                    <td>
                      {{ $alumno->telefono_tutor }}
                    </td>
                    <td>
                      {{ $alumno->ndolares}}
                    </td>

                    <td>
                      <a href="{{route('listaAlumnos.show',['id' => $alumno->id])}}" class="btn btn-primary">info</a>



                    </td>

                  </tr>
                  @endforeach



                </tbody>
              </table>
              {{ $alumnos->appends($_GET)->links() }}              <!-------------------------------------------termina tabla ---------------------------------->


            </div>
          </div>
        </div>
        <a href="{{url('/download/lista-1A')}}" class="btn btn-primary"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> 1°A</a>
        <a href="{{url('/download/lista-1B')}}" class="btn btn-primary"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> 1°B</a>
        <a href="{{url('/download/lista-2A')}}" class="btn btn-primary"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> 2°A</a>
        <a href="{{url('/download/lista-2A')}}" class="btn btn-primary"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> 2°B</a>
        <a href="{{url('/download/lista-2A')}}" class="btn btn-primary"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> 3°A</a>
        <a href="{{url('/download/lista-2A')}}" class="btn btn-primary"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> 3°B</a>

      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    @endsection