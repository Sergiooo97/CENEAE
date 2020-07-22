@extends('layouts.app')

@section('title', 'Alumnos | CENEAE')
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
                <select name="grado" class="form-control" id="grado" onchange="this.form.submit()">
                  <option value="{{request('grado')}}">{{request('grado')}}</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select>
                <label for="grupo"> Grado: </label>
                <select name="grupo" class="form-control" id="grupo" onchange="this.form.submit();  ">
                  <option value="{{request('grupo')}}">{{request('grupo')}}</option>
                  <option value="A">A</option>
                  <option value="B">B</option>

                </select>
                <label for="nombres">Nombre:</label>
                <input value="{{ request('nombres')}}" name="nombres" id="nombres" class="form-control"
                  onkeydown="document.ready = document.getElementById('grado').value = '0';document.ready = document.getElementById('grupo').value = '0';" />

                <button type="submit" class="btn btn-info"><i  class="nc-icon nc-zoom-split"></i> Buscar</button>
              </form>
              <table id="example" class="table table-striped table-hover " style="width:100%">
                <thead class=" text-info">
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
                    <td>
                      {{ $alumno->nombres }}&nbsp;{{ $alumno->apellido_paterno }}&nbsp;{{ $alumno->apellido_materno }}
                    </td>
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
                      <a href="{{route('listaAlumnos.show',['id' => $alumno->id])}}" class="btn btn-info"> info <i  class="nc-icon nc-alert-circle-i"></i></a>



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
        <!-- Modal assistencias -->
        <div class="modal fade" id="asistencias-Modal" tabindex="-1" role="dialog" aria-labelledby="asistencias-Modal"
          aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="nc-icon nc-cloud-download-93"></i>Descargar formatos de asistencias</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <a href="{{url('admin/download/asistencia-1A')}}" class="btn btn-danger"><i class="nc-icon nc-cloud-download-93"></i> 1°A</a>
                <a href="{{url('admin/download/asistencia-1B')}}" class="btn btn-danger"><i class="nc-icon nc-cloud-download-93"></i> 1°B</a>
                <a href="{{url('admin/download/asistencia-2A')}}" class="btn btn-danger"><i class="nc-icon nc-cloud-download-93"></i> 2°A</a>
                <a href="{{url('admin/download/asistencia-2B')}}" class="btn btn-danger"><i class="nc-icon nc-cloud-download-93"></i> 2°B</a>
                <a href="{{url('admin/download/asistencia-3A')}}" class="btn btn-danger"><i class="nc-icon nc-cloud-download-93"></i> 3°A</a>
                <a href="{{url('admin/download/asistencia-3B')}}" class="btn btn-danger"><i class="nc-icon nc-cloud-download-93"></i> 3°B</a>
                <a href="{{url('admin/download/asistencia-4A')}}" class="btn btn-danger"><i class="nc-icon nc-cloud-download-93"></i> 4°A</a>
                <a href="{{url('admin/download/asistencia-4B')}}" class="btn btn-danger"><i class="nc-icon nc-cloud-download-93"></i> 4°B</a>
                <a href="{{url('admin/download/asistencia-5A')}}" class="btn btn-danger"><i class="nc-icon nc-cloud-download-93"></i> 5°A</a>
                <a href="{{url('admin/download/asistencia-5B')}}" class="btn btn-danger"><i class="nc-icon nc-cloud-download-93"></i> 5°B</a>
                <a href="{{url('admin/download/asistencia-6A')}}" class="btn btn-danger"><i class="nc-icon nc-cloud-download-93"></i> 6°A</a>
                <a href="{{url('admin/download/asistencia-6B')}}" class="btn btn-danger"><<i class="nc-icon nc-cloud-download-93"></i> 6°B</a>
                <a href="{{url('admin/download/lista-todos')}}" class="btn btn-danger"><i class="nc-icon nc-cloud-download-93"></i> Todos (Sin formato)</a>
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
                <a href="{{url('admin/download/lista-1A')}}" class="btn btn-danger"><i class="nc-icon nc-cloud-download-93"></i> 1°A</a>
                <a href="{{url('admin/download/lista-1B')}}" class="btn btn-danger"><i class="nc-icon nc-cloud-download-93"></i> 1°B</a>
                <a href="{{url('admin/download/lista-2A')}}" class="btn btn-danger"><i class="nc-icon nc-cloud-download-93"></i> 2°A</a>
                <a href="{{url('admin/download/lista-2B')}}" class="btn btn-danger"><i class="nc-icon nc-cloud-download-93"></i> 2°B</a>
                <a href="{{url('admin/download/lista-3A')}}" class="btn btn-danger"><i class="nc-icon nc-cloud-download-93"></i> 3°A</a>
                <a href="{{url('admin/download/lista-3B')}}" class="btn btn-danger"><i class="nc-icon nc-cloud-download-93"></i> 3°B</a>
                <a href="{{url('admin/download/lista-4A')}}" class="btn btn-danger"><i class="nc-icon nc-cloud-download-93"></i> 4°A</a>
                <a href="{{url('admin/download/lista-4B')}}" class="btn btn-danger"><i class="nc-icon nc-cloud-download-93"></i> 4°B</a>
                <a href="{{url('admin/download/lista-5A')}}" class="btn btn-danger"><i class="nc-icon nc-cloud-download-93"></i> 5°A</a>
                <a href="{{url('admin/download/lista-5B')}}" class="btn btn-danger"><i class="nc-icon nc-cloud-download-93"></i> 5°B</a>
                <a href="{{url('admin/download/lista-6A')}}" class="btn btn-danger"><i class="nc-icon nc-cloud-download-93"></i> 6°A</a>
                <a href="{{url('admin/download/lista-6B')}}" class="btn btn-danger"><i class="nc-icon nc-cloud-download-93"></i> 6°B</a>
                <a href="{{url('admin/download/lista-todos')}}" class="btn btn-danger"><i class="nc-icon nc-cloud-download-93"></i> Todos (Sin formato)</a>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#listas-infoModal">
          <i class="nc-icon nc-cloud-download-93"></i>
          Listas info
        </button>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#asistencias-Modal">
          <i  class="nc-icon nc-cloud-download-93"></i>
          Formato asistencias
        </button>



      </div>
    </div>
    <script src="{{asset('js/jquery-3.1.0.min.js')}}"></script>
    @endsection