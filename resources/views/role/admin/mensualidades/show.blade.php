@extends('layouts.app')

@section('title', "Mensualidades | CENEAE")
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
                <h4 class="card-title btn-volver-container">PAGOS</h4>
                <h5>Historial de pagos de {{ $alumno_matricula->nombres }}</h5>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                                    <!-------------------------------------------empieza tabla ---------------------------------->

                  <table class="table ">
                    <thead class=" text-primary">                  
                      <th>$cantidad</th>
                      <th>Concepto</th>
                      <th>Fecha</th>
                      <th>Hora</th>
                    </thead>
                    <tbody>
                    @forelse ($pagos  as $pago)
                    <!-- Modal Imprimir-->
                        <div class="modal fade bd-example-modal-lg" id="ModalImprimir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">pago de {{ $pago->concepto }}</h6>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div style="margin-top: 1em;" class="modal-body" id="areaImprimir">
                                    <!-- REPORTE DE PAGO DE MENSUALIDAD -->
                                        <div class="row container">
                                            <div class="col-2">
                                               <img width="90" class="" src="{{ asset('img/logo_centro_educativo.png') }}" alt="...">
                                            </div>
                                            <div class="col-8 ">
                                                <div style="line-height: 5px;" class="row d-flex justify-content-center"><p></p></div>
                                                <div style="line-height: 5px;"  class="row d-flex justify-content-center"><p>SECRETARÍA DE EDUCACIÓN DEL ESTADO DE YUCATÁN</p></div>
                                                <div style="line-height: 5px;" class="row d-flex justify-content-center"><p>"CENTRO EDUCATIVO NATANAEL"</p></div>
                                                <div style="line-height: 5px;" class="row d-flex justify-content-center"><p>C.C.T 31PPR0032N, ZONA 029</p></div>
                                                <div style="line-height: 5px;" class="row d-flex justify-content-center"><p>ACUERDO 2285, 2 DE JULIO DEL 2019</p></div>
                                                <div style="line-height: 5px;" class="row d-flex justify-content-center"><p>CACALCHÉN, YUCATÁN</p></div>
                                            </div>
                                            <div class="col-2 pull-right">
                                               <img width="90" class="pull-right" src="{{ asset('img/segeey.png') }}" alt="...">
                                            </div>
                                        </div>
                                        <hr>
                                        <div style="margin-left:0px" class="row container">
                                            <div class="col-6 pull-left">
                                                <div class="form-group">
                                                    <label for="Folio">FOLIO</label>
                                                    <input readonly style="border:0" type="number"  value="{{ $pago->pago_id }}" class="form-control" id="Folio">
                                                </div>
                                                
                                            </div>
                                            <div style="float:right !important;" class="col-6 pull-right">
                                              <div class="form-group pull-right">
                                                    <label for="Fecha">FECHA</label>
                                                    <input readonly style="border:0" type="text"  value="{{ date_format($pago->created_at,"Y/m/d") }}" class="form-control" id="Feche">
                                                </div>

                                            </div>
                                        </div>     
                                        <hr>
                                        <div style="margin-left:0px" class="row container">
                                            <div class="col-3 pull-left">
                                                <div class="form-group">
                                                    <label for="Matricula">MATRICULA</label>
                                                    <input readonly style="border:0" type="text"  value="{{ $pago->matricula }}" class="form-control" id="Matricula">
                                                </div>
                                            </div>
                                            <div style="float:right !important;" class="col-6">
                                                <div class="form-group pull-right">
                                                    <label for="Folio">NOMBRE DEL ALUMNO</label>
                                                    <input readonly style="border:0"  value="{{ strtoupper($pago->nombres)}}" class="form-control">
                                                </div>
                                            </div>
                                            <div style="float:right !important;" class="col-3 pull-right">
                                                <div class="form-group pull-right">
                                                    <label for="Folio">CURP</label>
                                                    <input readonly style="border:0"  value="{{ $pago->curp }}" class="form-control">
                                                </div>
                                            </div>
                                        </div>   
                                        <hr>
                                        <div style="margin-left:0px" class="row container">
                                            <div class="col-3 pull-left">
                                                <div class="form-group">
                                                    <?php  
                                                        setlocale(LC_TIME, 'es_ES');
                                                        setlocale(LC_ALL, 'es_CO.UTF-8');
                                                        $MonthNum = date_format($pago->created_at,"m");
                                                        $dateObj  = DateTime::createFromFormat('!m', $MonthNum);
                                                        $monthName = strftime('%B', $dateObj->getTimestamp());
                                                    ?>
                                                    <label for="Matricula">MES DE PAGO</label>
                                                    <input readonly style="border:0" type="text"  value="{{ strtoupper($monthName) }}" class="form-control" id="Matricula">
                                                </div>
                                            </div>
                                            <div style="float:right !important;" class="col-3">
                                                <div class="form-group pull-right">
                                                    <label for="Folio">NOMBRE DEL ALUMNO</label>
                                                    <input readonly style="border:0"  value="{{ $pago->nombres}}" class="form-control">
                                                </div>
                                            </div>
                                            <div style="float:right !important;" class="col-3 pull-right">
                                                <div class="form-group pull-right">
                                                    <label for="Folio">CURP</label>
                                                    <input readonly style="border:0"  value="{{ $pago->curp }}" class="form-control">
                                                </div>
                                            </div>

                                        </div>     

                                  <script type="text/javascript">
                                        function printDiv(nombreDiv) {
                                         var contenido= document.getElementById(nombreDiv).innerHTML;
                                         var contenidoOriginal= document.body.innerHTML;
                                         document.body.innerHTML = contenido;
                                         window.print();
                                         document.body.innerHTML = contenidoOriginal;
                                    }
                                  </script>

                                        <!-- REPORTE DE PAGO DE MENSUALIDAD -->
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <input class="btn btn-primary" type="button" onclick="printDiv('areaImprimir')" value="imprimir div" />
                              </div>
                            </div>
                          </div>
                        </div>
                      <tr>                                        
                        <td>$ {{ $pago->cantidad}}</td>
                        <td>{{ $pago->concepto}}</td>
                        <td>{{ $pago->created_at->isoFormat('D-M-Y') }}</td>
                        <td>{{ $pago->created_at->isoFormat('H:mm A') }}</td>
                       <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalImprimir"><i  class="nc-icon nc-paper"></i></button></td>
                        @empty
                        <p style="font-size: 20px;">No hay registros</p>
                      </tr>                   
                      @endforelse
                    </tbody>
                  </table>
                  {{ $pagos->appends($_GET)->links() }}

                  <!-------------------------------------------termina tabla ---------------------------------->
                </div>
              </div>
            </div>
            @if(Auth::user()->hasRole('admin'))
            <a href="{{route('alumnos.show',['id' => $id_alumno->id,])}}" class="btn btn-info"> info del alumno<i  class="nc-icon nc-alert-circle-i"></i></a>
            @endif
            <a href="{{route('exportar_ndolar_info',['id' => $id_alumno->id, 'nombre'=>$id_alumno->nombres])}}" class="btn btn-warning">Descargar historial de {{$id_alumno->nombres}} <i  class="nc-icon nc-alert-circle-i"></i></a>
          </div>
        </div>

@endsection
