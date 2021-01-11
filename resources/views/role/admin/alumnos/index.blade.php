@extends('layouts.app')
<style>
    #tags {
        width:100%
    }
</style>
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
            <div class="table-responsive ">
              <!-------------------------------------------empieza tabla ---------------------------------->
              <form action="{{route('alumnos.index')}}" method="GET" class="form-inline pull-right" role="search">
                <label for="grupo"> Grupo: </label>
                <select name="grupo" class="form-control" id="grupo" onchange="this.form.submit();  ">
                  @if (request('grupo') == "")
                  <option value="">Seleccione</option>
                  @else
                  <option value="{{ $grupo_id->id }}">{{ $grupo_id->nombre }}</option>
                  @endif
                  @foreach ($grupos as $grupo)
                    <option value="{{ $grupo->id }}">{{ $grupo->nombre }}</option>
                  @endforeach
                </select>
                <label for="nombres">Nombre:</label>
                <input value="{{ request('nombres')}}" name="nombres" id="nombres" class="form-control"
                  onkeydown="document.ready = document.getElementById('grado').value = '0';document.ready = document.getElementById('grupo').value = '0';" />

                <button type="submit" class="btn btn-info"><i  class="nc-icon nc-zoom-split"></i> Buscar</button>
              </form>
              <table id="example" class="table table-striped table-hover " style="width:100%">
                <thead class=" text-info">
                 
                  <th>
                    Nombres
                  </th>
                  <th>
                    CURP
                  </th>
                  <th>
                    Grado
                  </th>
                  <th>
                    Dirección
                  </th>
                  <th>
                    Municipio
                  </th>
                  <th>
                    Teléfono
                  </th>
                  
                </thead>
                <tbody>
                  @foreach ($alumnos as $alumno)
                  <tr url="{{route('alumnos.show', ['id' => $alumno->id])}}">
                  
                    <td>
                      {{ $alumno->nombres }}&nbsp
                    </td>
                    <td>
                      {{ $alumno->curp }}
                    </td>
                    <td>
                      {{ $alumno->grupo_nombre }}
                    </td>
                    <td>
                      {{ $alumno->direccion }}
                    </td>
                    <td>
                      {{ $alumno->municipio }}
                    </td>
                    <td>
                        {{$alumno->telefono}}
                    </td>
                   

                  </tr>
                        <input id="id_alumno[]" value="{{$alumno->id}}" name="id_alumno[]" class="form-control" hidden>
                  @endforeach

                </tbody>
              </table>
            {{ $alumnos->appends($_GET)->links() }}
              <!-------------------------------------------termina tabla ---------------------------------->
            </div>
              <!-- Button trigger modal -->
        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#listas-infoModal">
          <i class="nc-icon nc-cloud-download-93"></i>
          Listas info
        </button>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#asistencias-Modal">
          <i  class="nc-icon nc-cloud-download-93"></i>
          Formato asistencias
        </button>

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
                @foreach($grupos as $grupo)
                  <a href ="{{route('exportar_asistencia',['grupo' => $grupo->id])}}" class="btn btn-warning"><i class="nc-icon nc-cloud-download-93"></i>{{ $grupo->nombre }}</a>
                @endforeach
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
                @foreach($grupos as $grupo)
                  <a href ="{{route('exportar_lista',['grupo' => $grupo->id])}}" class="btn btn-warning"><i class="nc-icon nc-cloud-download-93"></i> {{ $grupo->nombre }}</a>
                @endforeach
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>


                  </div>
              </div>
          </div>
          <!-- /.tab-pane -->



      </div>
    </div>
    @include('sweetalert::alert')
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])


      <script>
          $('#FormAlumno').bootstrapValidator({
              message: 'Este valor no es valido',
              feedbackIcons: {
                  valid: 'glyphicon glyphicon-ok',
                  invalid: 'glyphicon glyphicon-remove',
                  validating: 'glyphicon glyphicon-refresh'
              },
              fields: {
                  Nombre: {
                      message: 'El Nombre no es valido',
                      validators: {
                          notEmpty: {
                              message: 'No ha ingresado el Nombre'
                          },
                          stringLength: {
                              max: 191,
                              message: 'El Nombre no debe ser mayor de 191 caracteres'
                          }
                      }
                  },
                  Apellidos: {
                      message: 'Los apellidos no son validos',
                      validators: {
                          notEmpty: {
                              message: 'No ha ingresado los Apellidos'
                          },
                          stringLength: {
                              max: 191,
                              message: 'Los apellidos no deben ser mayor de 191 caracteres'
                          }
                      }
                  },
                  Direccion: {
                      message: 'La Dirección no es valida',
                      validators: {
                          notEmpty: {
                              message: 'No ha ingresado la Dirección'
                          },
                          stringLength: {
                              max: 191,
                              message: 'La Dirección no debe ser mayor de 191 caracteres'
                          }
                      }
                  },
                  Email: {
                      message: 'El Email no es valido',
                      validators: {
                          notEmpty: {
                              message: 'No ha ingresado el Email'
                          },
                          emailAddress: {
                              message: 'No es un Email valido'
                          }
                      }
                  }
              }
          })
              .on('success.form.bv', function(e) {
                  // Prevent form submission
                  e.preventDefault();
                  insertar();
                  $("#FormAlumno").data('bootstrapValidator').resetForm();
              });

          $(".select2").select2();
          configurarTabla();

          //insertar();
          viewData();
          eliminar();
          subirFoto();
          mostrarConfiguracion();
          guardarRelacion();

      </script>
<script src="{{ asset('js/tr_href.js')  }}" type="text/javascript"></script>

@endsection
