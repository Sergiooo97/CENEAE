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
                    <di class="container">   
                        <ul>
                            <il>
                                <a class="dropdown-btn">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <p class="">PRESUPUESTO MENSUAL</p>
                                        </div>
                                        <di class="col-sm-3 text-success">
                                            <p style="font-weight: bold;" class="">$ 21,000.00</p>
                                        </di>
                                    </div>                          
                                </a>  
                            </il>
                            <li>
                                <a class="dropdown-btn">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <p class="">INGRESOS DE LA ESCUELA</p>
                                        </div>
                                        <di class="col-sm-3 text-success">
                                            <p style="font-weight: bold;" class="">$ 11,500.00</p>
                                        </di>
                                    </div>                          
                                </a>
                                <div class="dropdown-container">
                                  <ul style="padding-left: 20px !important;">
                                    <li>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="slider-label ">DONATIVOS CENEAE</p>
                                            </div>
                                            <di class="col-sm-3">
                                                <p class="slider-label ">$ 1,000.00</p>
                                            </di>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="slider-label ">Coutas, examenes, copias</p>
                                            </div>
                                            <di class="col-sm-3">
                                                <p class="slider-label ">$ 3,000.00</p>
                                            </di>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="slider-label ">Colegiaturas</p>
                                            </div>
                                            <di class="col-sm-3">
                                                <p class="slider-label ">$ 6,000.00</p>
                                            </di>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="slider-label ">Desayunos</p>
                                            </div>
                                            <di class="col-sm-3">
                                                <p class="slider-label ">$ 600.00</p>
                                            </di>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="slider-label ">Internet</p>
                                            </div>
                                            <di class="col-sm-3">
                                                <p class="slider-label ">$ 900.00</p>
                                            </di>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="slider-label ">Renta local</p>
                                            </div>
                                            <di class="col-sm-3">
                                                <p class="slider-label ">$ 0.00</p>
                                            </di>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="slider-label ">Renta de taxi</p>
                                            </div>
                                            <di class="col-sm-3">
                                                <p class="slider-label ">$ 0.00</p>
                                            </di>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="slider-label ">Planta de agua</p>
                                            </div>
                                            <di class="col-sm-3">
                                                <p class="slider-label ">$ 0.00</p>
                                            </di>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="slider-label ">Devol. de prestamo</p>
                                            </div>
                                            <di class="col-sm-3">
                                                <p class="slider-label ">$ 0.00</p>
                                            </di>
                                        </div>
                                    </li>
                                  </ul>
                                </div>
                              </li>
                              <li>
                                <a class="dropdown-btn">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <p class="">MONTHLY DISCHARGE</p>
                                        </div>
                                        <di class="col-sm-3 text-danger">
                                            <p style="font-weight: bold;" class="">$ 6,000.00</p>
                                        </di>
                                    </div>                          
                                </a>
                                <div class="dropdown-container">
                                  <ul style="padding-left: 20px !important;">
                                    <li>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="slider-label ">Nomina</p>
                                            </div>
                                            <di class="col-sm-3">
                                                <p class="slider-label ">$ 1,000.00</p>
                                            </di>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="slider-label ">Eventos</p>
                                            </div>
                                            <di class="col-sm-3">
                                                <p class="slider-label ">$ 3,000.00</p>
                                            </di>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="slider-label ">Varios</p>
                                            </div>
                                            <di class="col-sm-3">
                                                <p class="slider-label ">$ 6,000.00</p>
                                            </di>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="slider-label ">Mantenimiento</p>
                                            </div>
                                            <di class="col-sm-3">
                                                <p class="slider-label ">$ 600.00</p>
                                            </di>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="slider-label ">Utilidades</p>
                                            </div>
                                            <di class="col-sm-3">
                                                <p class="slider-label ">$ 900.00</p>
                                            </di>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="slider-label ">Salarios</p>
                                            </div>
                                            <di class="col-sm-3">
                                                <p class="slider-label ">$ 0.00</p>
                                            </di>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="slider-label ">Corriente Eléctrica</p>
                                            </div>
                                            <di class="col-sm-3">
                                                <p class="slider-label ">$ 0.00</p>
                                            </di>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="slider-label ">Entregado</p>
                                            </div>
                                            <di class="col-sm-3">
                                                <p class="slider-label ">$ 0.00</p>
                                            </di>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="slider-label ">Insumo planta de agua</p>
                                            </div>
                                            <di class="col-sm-3">
                                                <p class="slider-label ">$ 0.00</p>
                                            </di>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="slider-label ">Gasto de planta de agua</p>
                                            </div>
                                            <di class="col-sm-3">
                                                <p class="slider-label ">$ 0.00</p>
                                            </di>
                                        </div>
                                    </li>
                                  </ul>
                                </div>
                              </li>
                            <il>
                                <a class="dropdown-btn">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <p class="">TOTAL</p>
                                        </div>
                                        <di class="col-sm-3 text-success">
                                            <p style="font-weight: bold;" class="">$ 31,000.00</p>
                                        </di>
                                    </div>                          
                                </a>  
                            </il>

                        </ul>                   
                       
                          <script>
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


                </di>
                </div>
                <a href="#" class="btn btn-info pull-right">Administrar</a>
            </div>
        </div>
        <a href="#" class="btn btn-warning">Descargar informe</a>
    </div>
</div>

@endsection