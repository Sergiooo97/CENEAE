@extends('layouts.app')

@section('title', 'Alumnos | CENEAE')

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
                        $
                      </th>
                      <th>
                        Última modificación
                      </th>                    
                      <th>                        
                      </th>
                    </thead>
                    <tbody>                   
                      <tr>
                        <td>
                          01BACY130918M1A1920
                        </td>
                        <td>
                          Yesenia Naomi Balam Chan
                        </td>                      
                        <td>
                          $560
                        </td>
                        <td>
                          24-11-2020
                        </td>                      
                        <td>
                        <button class="btn btn-primary">Detalles</button>
                        </td>
                      </tr>                     
                    </tbody>
                  </table>
                  <!-------------------------------------------termina tabla ---------------------------------->

                  
                </div>
              </div>
            </div>
          </div>     
        </div>          
     
@endsection