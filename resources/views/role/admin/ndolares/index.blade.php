@extends('layouts.app')

@section('title', 'Archivos | CENEAE')
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
                  <form action="{{route('ndolares.index')}}" method="GET" class="form-inline pull-right" role="search">
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

                    <button type="submit" class="btn btn-info">Buscar</button>
                  </form>
                                    <!-------------------------------------------empieza tabla ---------------------------------->

                  <table class="table ">
                    <thead class=" text-info">
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
                            <a href="{{route('alumnos.show',['id' => $alumno->alumno_id])}}" >
                            {{ $alumno->nombres }}
                            </a>
                        </td>
                        <td>
                          {{ $alumno->grado}}{{ $alumno->grupo }}
                        </td>
                        <td>
                          <input id="ndolar-d" value="{{ $alumno->cantidad }} " hidden/>
                          {{ $alumno->cantidad }}                        </td>
                        <td>
                             <td>
                        <button id="-b" class="enlace btn btn-primary" role="link" onclick="window.location='{{route('ndolares.show',['id' => $alumno->id, 'nombres'=>$alumno->nombres])}}'"  style="font-size: 14px;">Historial</button>

                    <script>
                      if(document.getElementById('ndolarTransacciones-d').value <=0){
                        document.getElementById('boton').disabled=true;
                        document.getElementById('retiro').disabled=true;

                      }
                  </script>
                      </td>
                      </tr>

                      @endforeach

                    </tbody>
                  </table>
                  {{ $alumnos->appends($_GET)->links() }}

                  <!-------------------------------------------termina tabla ---------------------------------->
                  <div style="margin-right: 1em;" class="form-group pull-right">
                    <a href="{{route('ndolares.retiro')}}" class="btn btn-danger"><i class="nc-icon nc-money-coins"
                      aria-hidden="true"></i>Retirar</a>
                    <a href="{{route('ndolares.deposito')}}" class="btn btn-success"><i class="nc-icon nc-money-coins"
                      aria-hidden="true"></i>Depositar</a>

                  </div>


                </div>
              </div>
            </div>
            <a href="{{url('admin/download/lista-ndolarTransacciones')}}" class="btn btn-warning"><i class="fa fa-file-excel-o"
              aria-hidden="true"></i> Descargar lISTAS (Sin formato)</a>

          </div>
        </div>

        @include('sweetalert::alert')
    <script src="{{asset('js/jquery-3.1.0.min.js')}}"></script>
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

@endsection
