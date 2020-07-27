@extends('layouts.app')

@section('title', "calificacion | {$alumno->nombres}")


@section('content') 
<!-- Button trigger modal -->
<!-- Button trigger modal -->

<!-- Modal -->

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Calificaciones</h4>
        </div>
        <div class="card-body">
          <!------------------- TABLA DE CALIFICACIONES------------------------------------->
          <div style="padding-left: 10%;padding-right: 10%;" class="table-responsive">
            <table id="example" class="table table-striped table-hover " style="width:100%">
                <thead class=" text-info">
                <th scope="row">UNIDADES CURRICULARES</th>
               
                <th>1er</th>
                <th>2°</th>
                <th>3er</th>
                <th>PROMEDIO FINAL</th>

                </thead>
              <tr>
                <th  >ESPAÑOL</th>
                <td>100</td>
                <td>100</td>
                <td>100</td>
                <td>100</td>

              </tr>
            
              <tr>
                <th >Matemáticas</th>
                <td>100</td>
                <td>100</td>
                <td>100</td>
                <td>100</td>

              </tr>
            

              <tr>
                <th >Inglés</th>
                <td>100</td>
                <td>100</td>
                <td>100</td>
                <td>100</td>

              </tr>
          
              <tr>
                <th >Conocimiento del medio</th>
                <td>100</td>
                <td>100</td>
                <td>100</td>
                <td>100</td>

              </tr>
             
              <tr>
                <th >PROMEDIO FINAL</th>
                <td>100</td>
                <td>100</td>
                <td>100</td>
                <td>100</td>

              </tr>
            
            </table>
            <!------------------- FIN TABLA DE CALIFICACIONES------------------------------------->
            <table style="margin-top:1em !important;"id="example" class="table table-striped table-hover " style="width:100%">

              <thead class=" text-info">
                <th scope="row">UNIDADES CURRICULARES</th>
               
                <th>1er</th>
                <th>2°</th>
                <th>3er</th>
                <th>PROMEDIO FINAL</th>

                </thead>
            
            <tr>
              <th>ARTES</th>
              <td>100</td>
              <td>100</td>
              <td>100</td>
              <td>100</td>

            </tr>
            <tr>
              <th>EDUCACIÓN  SOCIOEMOCIONAL</th>
              <td>100</td>
              <td>100</td>
              <td>100</td>
              <td>100</td>

            </tr>
            <tr>
              <th>EDUCACIÓN FÍSICA</th>
              <td>100</td>
              <td>100</td>
              <td>100</td>
              <td>100</td>

            </tr>
        
            <tr>
              <th>PROMEDIO FINAL</th>
              <td>100</td>
              <td>100</td>
              <td>100</td>
              <td>100</td>

            </tr>
            <tr>
              <td>Calificación</td>
              <td>100</td>
              <td>100</td>
              <td>100</td>
              <td>100</td>
            </tr>
          </table>
          <!-------____-------------------------------------------->
            <!------------------- FIN TABLA DE CALIFICACIONES------------------------------------->
            <table tyle="margin-top:1em !important;"id="example" class="table table-striped table-hover " style="width:100%">

              <thead class=" text-info">
                <th scope="row">UNIDADES CURRICULARES</th>
               
                <th>1er</th>
                <th>2°</th>
                <th>3er</th>
                <th>PROMEDIO FINAL</th>

                </thead>
            
              <tr>
                <th>AUTONOMÍA CURRICULAR</th>
                <td>100</td>
                <td>100</td>
                <td>100</td>
                <td>100</td>
          
              <tr>
                <th >PROMEDIO FINAL</th>
                <td>100</td>
                <td>100</td>
                <td>100</td>
                <td>100</td>

              </tr>
              <tr>
                <td>Calificación</td>
                <td>100</td>
                <td>100</td>
                <td>100</td>
                <td>100</td>
              </tr>
            </table>
            <!-------____-------------------------------------------->

          </div>

        </div>
      </div>
    </div>

  </div>
</div>
</div>
@endsection