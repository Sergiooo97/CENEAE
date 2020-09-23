@extends('layouts.app')
@section('title', 'Finanzas | CENEAE')
<style>
    th{
  white-space:nowrap;
}
td{
  white-space:nowrap;
}
</style>
@section('content')
<!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="salidaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ingresos de la escuela</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <ul style="padding-left: 20px !important;">
                    <li>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="slider-label ">Nomina</p>
                            </div>
                            <div class="col-sm-3">
                                <p class="slider-label ">$ 1,000.00</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="slider-label ">Eventos</p>
                            </div>
                            <div class="col-sm-3">
                                <p class="slider-label ">$ 3,000.00</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="slider-label ">Varios</p>
                            </div>
                            <div class="col-sm-3">
                                <p class="slider-label ">$ 6,000.00</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="slider-label ">Mantenimiento</p>
                            </div>
                            <div class="col-sm-3">
                                <p class="slider-label ">$ 600.00</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="slider-label ">Utilidades</p>
                            </div>
                            <div class="col-sm-3">
                                <p class="slider-label ">$ 900.00</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="slider-label ">Salarios</p>
                            </div>
                            <div class="col-sm-3">
                                <p class="slider-label ">$ 0.00</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="slider-label ">Corriente Eléctrica</p>
                            </div>
                            <div class="col-sm-3">
                                <p class="slider-label ">$ 0.00</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="slider-label ">Entregado</p>
                            </div>
                            <div class="col-sm-3">
                                <p class="slider-label ">$ 0.00</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="slider-label ">Insumo planta de agua</p>
                            </div>
                            <div class="col-sm-3">
                                <p class="slider-label ">$ 0.00</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="slider-label ">Gasto de planta de agua</p>
                            </div>
                            <div class="col-sm-3">
                                <p class="slider-label ">$ 0.00</p>
                            </div>
                        </div>
                    </li>
                  </ul>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary">Administrar</button>
            </div>
          </div>
        </div>
      </div>
        <!-- Modal -->
  <!-- Modal -->
  <div class="modal fade" id="ingresosModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ingresos de la escuela</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <ul style="padding-left: 20px !important;">
                <li>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="slider-label ">DONATIVOS CENEAE</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="slider-label ">$ 1,000.00</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="slider-label ">Coutas, examenes, copias</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="slider-label ">$ 3,000.00</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="slider-label ">Colegiaturas</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="slider-label ">$ 6,000.00</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="slider-label ">Desayunos</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="slider-label ">$ 600.00</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="slider-label ">Internet</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="slider-label ">$ 900.00</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="slider-label ">Renta local</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="slider-label ">$ 0.00</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="slider-label ">Renta de taxi</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="slider-label ">$ 0.00</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="slider-label ">Planta de agua</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="slider-label ">$ 0.00</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="slider-label ">Devol. de prestamo</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="slider-label ">$ 0.00</p>
                        </div>
                    </div>
                </li>
              </ul>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary">Administrar</button>
        </div>
      </div>
    </div>
  </div>
    <!-- Modal -->

<div class="container">
    <div class="content">
        <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card card-stats">
                <div class="card-header">
                    <h5>Finanzas de CENEAE</h5>
                </div>
            <div class="card-body">
                <h3 class="text-center">SEPTIEMBRE</h3>
                <div class="row">
                    <div class="container">   
                        <ul>
                            <li>
                                <a class="dropdown-btn">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <p class="">PRESUPUESTO MENSUAL</p>
                                        </div>
                                        <div class="col-sm-3 text-success">
                                            <p style="font-weight: bold;" class="">$ 21,000.00</p>
                                        </div>
                                    </div>                          
                                </a>  
                            </li>
                            <li>
                                <button type="button" class="dropdown-btn" style="background: transparent !important; color: #000;" data-toggle="modal" data-target="#ingresosModal">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <p class="">INGRESOS DE LA ESCUELA</p>
                                        </div>
                                        <div class="col-sm-3 text-success">
                                            <p style="font-weight: bold;" class="">$ 11,500.00</p>
                                        </div>
                                    </div> 
                                  </button>
                              </li>
                              <li>
                                <button type="button" class="dropdown-btn" style="background: transparent !important; color: #000;" data-toggle="modal" data-target="#salidaModal">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <p class="">MONTHLY DISCHARGE</p>
                                        </div>
                                        <div class="col-sm-3 text-danger">
                                            <p style="font-weight: bold;" class="">$ 6,000.00</p>
                                        </div>
                                    </div>                          
                                </button>
                              </li>
                            <li>
                                <a class="dropdown-btn">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <p class="">TOTAL</p>
                                        </div>
                                        <div class="col-sm-3 text-success">
                                            <p style="font-weight: bold;" class="">$ 31,000.00</p>
                                        </div>
                                    </div>                          
                                </a>  
                            </li>

                        </ul>                   
                       
                          <script  type="application/javascript">
                            var dropdown = document.getElementsByClassName("dropdown-btn");
                                    var i;
                
                                    for (i = 0; i < dropdown.length; i++) {
                                        dropdown[i].addEventListener("click", function() {
                                            this.classList.toggle("active");
                                            var dropdownContent = this.nextElementSibling;
                                            if (dropdownContent.style.display === "block") {
                                                dropdownContent.style.display = "none";
                                            } else {
                                                dropdownContent.style.display = "block";
                                            }
                                        });
                                    }
                          </script> 

                </div>
                </div>
            <a href="{{ route('finanzas.create')}}" class="btn btn-info pull-right">Administrar</a>
            </div>
        </div>
        <a href="#" class="btn btn-warning">Descargar informe</a>
    </div>
</div>

@endsection