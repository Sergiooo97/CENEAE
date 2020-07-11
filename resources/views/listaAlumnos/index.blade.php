@extends('layouts.app')

@section('title', 'Alumnos | CENEAE')

@section('content')
<div class="notificationsss bounce ">
      <div  class="container  ">
        <div class="row">
          <div class="col-md-12">
            <div class="card bounceInleft">
              <div class="card-header">
                <h4 class="card-title">Alumnos del CENEAE</h4>
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
                          BACY130918MYNLHSA2
                        </td>
                        <td>
                          Calle 23x14y16 s/n
                        </td>
                        <td>
                          1 Grado
                        </td>
                        <td>
                          (999) 329-2434
                        </td>
                       
                        <td>
                        <button class="btn btn-primary">Detalles</button>
                        </td>
                      </tr>

                      <tr>
                        <td>
                          1
                        </td>
                        <td>
                          Trip-On
                        </td>
                        <td>
                          Tecnología
                        </td>
                        <td>
                          Sergio, Ulises, Tamayo, Uriel
                        </td>
                        <td>
                          8vo Semestre
                        </td>
                        <td>
                          2018-11-24
                        </td>
                      
                        <td>
                        <button class="btn btn-primary">Detalles</button>
                        </td>
                      </tr>

                      <tr>
                        <td>
                          1
                        </td>
                        <td>
                          Trip-On
                        </td>
                        <td>
                          Tecnología
                        </td>
                        <td>
                          Sergio, Ulises, Tamayo, Uriel
                        </td>
                        <td>
                          8vo Semestre
                        </td>
                        <td>
                          2018-11-24
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