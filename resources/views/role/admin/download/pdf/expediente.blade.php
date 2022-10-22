<!DOCTYPE html>
<html>
<head>
    <title>EXPEDIENTE DE {{  strtoupper($alumnos->nombres) }}</title>
    <style type="text/css">
    body{
        font-size: 12px;
        font-family: "Arial";
    }
    table{
        border-collapse: collapse;
    }
    td{
        padding: 2px 2px;
        font-size: 15px;
    }
    .h1{
        font-size: 21px;
        font-weight: bold;
    }
    .h2{
        font-size: 18px;
        font-weight: bold;
    }
    .tabla1{
        margin-bottom: 20px;
    }
    .tabla2 {
        margin-bottom: 20px;
    }
    .tabla3{
        margin-top: 15px;
    }
    .tabla3 td{
        border: 1px solid #000;
    }
    .tabla3 .cancelado{
        border-left: 0;
        border-right: 0;
        border-bottom: 0;
        border-top: 1px dotted #000;
        width: 200px;
    }
    .emisor{
        color: red;
    }
    .linea{
        border-bottom: 1px dotted #000;
        

    }
    .border{
        border: 1px solid #000;
    }
    .fondo{
       /*background-color: #dfdfdf;*/
        background-color: #e0f3ef;" 
    }
    .fisico{
        color: #fff;
    }
    .fisico td{
        color: #fff;
    }
    .fisico .border{
        border: 1px solid #fff;
    }
    .fisico .tabla3 td{
        border: 1px solid #fff;
    }
    .fisico .linea{
        border-bottom: 1px dotted #fff;
    }
    .fisico .emisor{
        color: #fff;
    }
    .fisico .tabla3 .cancelado{
        border-top: 1px dotted #fff;
    }
    .fisico .text{
        color: #000;
    }
    .fisico .fondo{
        background-color: #fff;
    }
   td{
       padding-top: 5px;
       margin-top: 10px !important;
   }
   .text{
       font-size: 12px !important;
   }
   .text2{
       font-size: 13px !important;
   }
   body{
      font-family: sans-serif;
    }
    @page {
      margin: 180px 10px;
    }
    header { position: fixed;
      left: 0px;
      top: -150px;
      right: 0px;
      height: 100px;
      background-color: rgb(255, 255, 255);
      text-align: center;
      padding: 0;
    }
    header h1{
      margin: 10px 0;
    }
    header h2{
      margin: 0 0 10px 0;
    }
    footer {
      position: fixed;
      left: 0px;
      bottom: -170px;
      right: 0px;
      height: 200px;
      border-bottom: 2px solid rgb(255, 255, 255);
    }
    footer .page:after {
      content: counter(page);
    }
    footer table {
      width: 100%;
    }
    footer p {
      text-align: right;
    }
    footer .izq {
      text-align: left;
    }
    .content{
        margin-left: 40px;
        margin-right: 40px;
    }
    #footer .page:after { content: counter(page, upper-roman); }

</style>
</head>
<body>
    <header>
        <table style="padding: 0;">
            <tr style="padding: 0;">
              <td style="padding: 0;" width="100%" height="100%">
                <img id="logo" src="{{ public_path('img/hed.png') }}" alt="" width="100%" height="200">
              </td>
            
            </tr>
          </table>
      </header>
      <footer>
        <table style="padding: 0;">
            <tr style="padding: 0;">
              <td style="padding: 0;" width="100%" height="100%">
                <img id="logo" src="{{ public_path('img/he.png') }}" alt="" width="100%" height="200">
              </td>
            
            </tr>
          </table>
      </footer>
    <div class="content">
       <table style="margin-bottom: 34px;">
           <tr>
               <td width="56%"></td>
               <td width="44%"> <p style="position: fixed">Cacalchén, Yucatán a 2 de Marzo del 2021</p></td>

           </tr>
       </table>
        <h3 style="text-align: center;">INFORMACION DEL ALUMNO</h3>
        <table width="100%" class="tabla2">
           
            <tr style="padding: 2em;">
                <td  height="30px"  width="15%"> <span class="text2">Nombre (s):</span></td>
                <td  colspan="1" height="10px"  width="35%" class="linea"><span class="text">{{ strtoupper($alumno->nombres)}} &nbsp;{{ strtoupper($alumno->apellido_paterno)}} &nbsp;{{ strtoupper($alumno->apellido_materno)}} </span></td>

                <td  height="30px"  width="7%"> <span class="text2">Curp:</span></td>
                <td  colspan="3" height="10px"  width="35%" class="linea"><span class="text">{{ strtoupper($alumnos->curp)}} </span></td>
               
            
            </tr>
            <tr style="padding: 1em;">
                <td  height="30px"  width="15%"> <span class="text2">Fecha de nacimiento:</span></td>
                <td  colspan="1" height="10px"  width="35%" class="linea"><span class="text">{{ strtoupper($alumnos->fecha_de_nacimiento)}}</span></td>

                <td  height="30px"  width="7%"> <span class="text2">edad:</span></td>
                <td  colspan="3" height="10px"  width="35%" class="linea"><span class="text">{{ strtoupper($alumnos->edad)}} </span></td>


    
            </tr>
            <tr>
                <td  height="30px"  width="15%"> <span class="text2">Sexo:</span></td>
                <td  height="10px"  width="35%" class="linea"><span class="text">{{ strtoupper($alumnos->sexo)}}</span></td>

                <td  height="30px"  width="7%"> <span class="text2">Peso:</span></td>
                <td  height="10px"  width="17%" class="linea"><span class="text">{{ strtoupper($alumnos->peso)}} </span></td>


                <td  height="30px"  width="7%"> <span class="text2">Estatura:</span></td>
                <td  height="10px"  width="15%" class="linea"><span class="text">{{ strtoupper($alumnos->estatura)}} </span></td>


               
            </tr>
            <tr>
                <td  height="30px"  width="15%"> <span class="text2">Domicilio:</span></td>
                <td  colspan="5" height="10px"  width="85%" class="linea"><span class="text">{{ strtoupper($alumnos->direccion)}}&nbsp; &nbsp; {{ $alumnos->cp}},  &nbsp; {{ strtoupper($alumnos->municipio) }}</span></td>

            </tr>
            <tr>
                <td  height="30px"  width="15%"> <span class="text2">Escuela de procedencia:</span></td>
                <td  colspan="5" height="10px"  width="85%" class="linea"><span class="text">{{ strtoupper($alumnos->escuela_procedencia)}}</span></td>


               
            </tr>
          
           
            <tr>
                <td  height="30px"  width="15%"> <span class="text2">Fecha de ingreso:</span></td>
                <td  colspan="1" height="10px"  width="35%" class="linea"><span class="text">{{ $alumnos->created_at->isoFormat('D-M-Y') }} </span></td>

                <td  height="30px"  width="7%"> <span class="text2">Estatus:</span></td>
                <td  colspan="3" height="10px"  width="35%" class="linea"><span class="text">{{ $alumnos->status_id }} </span></td>

            </tr>
           
        </table>
        <br/>
        <h3 style="text-align: center;">INFORMACION DEL TUTOR</h3>
        <table width="100%" class="tabla2">
           
            <tr style="padding: 2em;">
                <td  height="30px"  width="15%"> <span class="text2">Nombre (s):</span></td>
                <td  colspan="1" height="10px"  width="35%" class="linea"><span class="text">{{ strtoupper($alumnos->nombres_tutor)}} &nbsp;{{ strtoupper($alumnos->apellido_paterno_tutor)}} &nbsp;{{ strtoupper($alumnos->apellido_materno_tutor)}} </span></td>

                <td  height="30px"  width="7%"> <span class="text2">Curp:</span></td>
                <td  colspan="3" height="10px"  width="35%" class="linea"><span class="text">{{ strtoupper($alumnos->curp_tutor)}} </span></td>
               
            
            </tr>
            <tr style="padding: 1em;">
                <td  height="30px"  width="15%"> <span class="text2">Fecha de nacimiento:</span></td>
                <td  colspan="1" height="10px"  width="35%" class="linea"><span class="text">{{ strtoupper($alumnos->fecha_nacimiento_tutor)}}</span></td>

                <td  height="30px"  width="7%"> <span class="text2">edad:</span></td>
                <td  colspan="3" height="10px"  width="35%" class="linea"><span class="text">{{ strtoupper($alumnos->edad_tutor)}} </span></td>


    
            </tr>
            <tr>
                <td  height="30px"  width="15%"> <span class="text2">Sexo:</span></td>
                <td  colspan="5" height="10px"  width="85%" class="linea"><span class="text">{{ strtoupper($alumnos->sexo)}}</span></td>

            </tr>
            <tr>
                <td  height="30px"  width="15%"> <span class="text2">Domicilio:</span></td>
                <td  colspan="5" height="10px"  width="85%" class="linea"><span class="text">{{ strtoupper($alumnos->direccion_tutor)}}&nbsp; &nbsp; {{ $alumnos->cp_tutor}},  &nbsp; {{ strtoupper($alumnos->municipio_tutor) }}</span></td>

            </tr>
            <tr>
                <td  height="30px"  width="15%"> <span class="text2">Parentezco con el alumno:</span></td>
                <td  colspan="5" height="10px"  width="85%" class="linea"><span class="text">{{ strtoupper($alumnos->parentesco_con_alumno)}}</span></td>


               
            </tr>
            <tr>
                
                <td  height="30px"  width="15%"> <span class="text2">Escolaridad:</span></td>
                <td  colspan="5" height="10px"  width="85%" class="linea"><span class="text">{{ $alumnos->escolaridad }} </span></td>
            </tr>
            <tr>
                <td  height="30px"  width="15%"> <span class="text2">Ocupacion:</span></td>
                <td  colspan="5" height="10px"  width="85%" class="linea"><span class="text">{{ $alumnos->ocupacion }} </span></td>
            </tr>
            <tr style="padding: 2em;">
                <td  height="30px"  width="15%"> <span class="text2">Correo:</span></td>
                <td  colspan="1" height="10px"  width="35%" class="linea"><span class="text">{{ strtoupper($alumnos->correo)}} </span></td>

                <td  height="30px"  width="7%"> <span class="text2">Cel:</span></td>
                <td  colspan="3" height="10px"  width="35%" class="linea"><span class="text">{{ strtoupper($alumnos->telefono_tutor)}} </span></td>
            
            </tr>
           
            
           
        </table>
        <!--SALTO DE PÁGINA ---->
        <!--SALTO DE PÁGINA ---->
        <!--SALTO DE PÁGINA ---->
        <!--SALTO DE PÁGINA ---->
    </div>
    
        <div style="page-break-after:always;"></div>
        <header style="">
            <table style="padding: 0;">
                <tr style="padding: 0;">
                  <td style="padding: 0;" width="100%" height="100%">
                    <img id="logo" src="{{ public_path('img/hed.png') }}" alt="" width="100%" height="200">
                  </td>
                
                </tr>
              </table>
          </header>
          <footer>

            <table style="padding: 0;">
                <tr style="padding: 0;">
                  <td style="padding: 0;" width="100%" height="100%">
                    <img id="logo" src="{{ public_path('img/he.png') }}" alt="" width="100%" height="200">
                  </td>
                
                </tr>
              </table>
          </footer>
          <div class="content">
            <table style="margin-bottom: 34px;">
                <tr>
                    <td width="56%"></td>
                    <td width="44%"> <p style="position: fixed">Cacalchén, Yucatán a 2 de Marzo del 2021</p></td>
     
                </tr>
            </table>
        <h3 style="text-align: center;">HISTORIAL DE NATA DOLARES DE {{ strtoupper($alumno->nombres) }}</h3>
        <table width="100%" class="tabla2">
           
            <tr style="padding: 2em;">
                <td  height="30px"  width="15%"> <span class="text2">Nombre (s):</span></td>
                <td  colspan="1" height="10px"  width="30%" class="linea"><span class="text">{{ strtoupper($alumnos->nombres)}} &nbsp;{{ strtoupper($alumnos->apellido_paterno)}} &nbsp;{{ strtoupper($alumnos->apellido_materno)}} </span></td>

                <td  height="30px"  width="10%"> <span class="text2">Matricula:</span></td>
                <td  colspan="3" height="10px"  width="35%" class="linea"><span class="text">{{ strtoupper($alumnos->matricula)}} </span></td>d>
            </tr>

        </table>
        <table width="100%" class="tabla3">
            <tr>
                <td align="center" class="fondo"><strong>ACCIÓN</strong></td>
                <td align="center" class="fondo"><strong>DESCRIPCIÓN</strong></td>
                <td align="center" class="fondo"><strong>FECHA</strong></td>
                <td align="center" class="fondo"><strong>HORA</strong></td>
                <td align="center" class="fondo"><strong>CANT.</strong></td>
            </tr>
           

    
              @foreach($ndolar as $dolar)
            <tr>
                <td width="7%" align="center"><span class="text">{{ $dolar->accion }}</span></td>
                <td width="59%"><span class="text">{{ $dolar->comentario }}</span></td>
                <td width="16%" align="right"><span class="text">{{ $dolar->created_at->isoFormat('D-M-Y') }}</span></td>
                <td width="16%" align="right"><span class="text">{{ $dolar->created_at->isoFormat('H:mm A') }} </span></td>
                <td width="18%" align="right">$ &nbsp;<span class="text">{{ $dolar->cantidad }}</span></td>
            </tr>
            @endforeach

            <tr>
                <td width="7%">&nbsp;</td>
                <td width="59%">&nbsp;</td>
                <td width="16%">&nbsp;</td>
                <td width="16%">&nbsp;</td>

                <td width="18%" align="left">&nbsp;</td>
            </tr>
            <tr>
                <td style="border:0;">&nbsp;</td>
                <td style="border:0;">&nbsp;</td>
                <td style="border:0;">&nbsp;</td>
               
                <td align="right"><strong>TOTAL S/.</strong></td>
                <td align="right"><span class="text">$ &nbsp;{{ $ndolar_t->cantidad}}</span></td>
            </tr>
            <tr></tr>
            <tr>
                <td style="border:0;">&nbsp;</td>
                <td align="center" style="border:0;">
                    <table width="200" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td align="center" class="cancelado">Firma del director</td>
                        </tr>
                    </table>
                </td>
                <td style="border:0;">&nbsp;</td>
                <td align="center" style="border:0;" class="emisor"><strong>EMISOR</strong></td>
            </tr>
        </table>
    </div>
        <div style="page-break-after:always;"></div>
        <header style="">
            <table style="padding: 0;">
                <tr style="padding: 0;">
                  <td style="padding: 0;" width="100%" height="100%">
                    <img id="logo" src="{{ public_path('img/hed.png') }}" alt="" width="100%" height="200">
                  </td>
                
                </tr>
              </table>
          </header>
          <footer>

            <table style="padding: 0;">
                <tr style="padding: 0;">
                  <td style="padding: 0;" width="100%" height="100%">
                    <img id="logo" src="{{ public_path('img/he.png') }}" alt="" width="100%" height="200">
                  </td>
                
                </tr>
              </table>
          </footer>
        <div class="content">
            <h3 style="text-align: center;">PROMEDIOS DE {{ strtoupper($alumno->nombres) }}</h3>
        <table width="100%" class="tabla2">
           
            <tr style="padding: 2em;">
                <td  height="30px"  width="15%"> <span class="text2">Nombre (s):</span></td>
                <td  colspan="1" height="10px"  width="30%" class="linea"><span class="text">{{ strtoupper($alumnos->nombres)}} &nbsp;{{ strtoupper($alumnos->apellido_paterno)}} &nbsp;{{ strtoupper($alumnos->apellido_materno)}} </span></td>

                <td  height="30px"  width="10%"> <span class="text2">Matricula:</span></td>
                <td  colspan="3" height="10px"  width="35%" class="linea"><span class="text">{{ strtoupper($alumnos->matricula)}} </span></td>d>
            </tr>

        </table>
               

                            <table id="example" class="table table-striped table-hover tabla3 " style="width:100%">
                                <tr class="fondo" style=" border:1px dashed #ccc;" class="text-primary">
                                    <td style="border:1px dashed #ccc;" colspan="2"></td>
                                   
                                    <td class="fondo" style="border:1px dashed #ccc; padding-bottom: 0px; padding-top: 0px; font-size: 18px;" width="200px" colspan="1" >Promedio final</td>

                                    <!--================= Mostrar la fina de los bimestres ================================-->
                                    @forelse($periodos as $periodo)
                                        <td style="border:1px dashed #ccc; " class="fondo" >{{$periodo->nombre}}</td>
                                    @empty
                                        <p>sin bimestres</p>
                                    @endforelse

                                </tr>
                                <tbody>

                                @forelse($cursos as $crs) <!-- forelese para obtener el id de los cursos -->
                                <tr style="border:1px dashed #ccc;" class="">

                                    <!--================= Mostrar la columna de los nombre de los cursos ================================-->
                                    @forelse($cursos_nombre as $curso)
                                        @if($curso->id == $crs)
                                            <td class="text-primary" style="  padding-bottom: 0px; padding-top: 0px;border: 0px; font-size: 18px; background-color: #e0f3ef;" rowspan="2" colspan="2">{{$curso->nombre}}</td>
                                        @endif
                                    @empty
                                        <p>No hay registros</p>
                                    @endforelse
                                <!--================= Mostrar la fina de las actividades ================================-->
                                @if(count($promedioFINAL)) 
                                    @forelse($promedioFINAL as $prom)
                                    @if($prom->curso_id == $crs) <!-- solo cuando el id del curso sea igual al id que recibe del forelse de cursos-->
                                    <td rowspan="2"   style="border:1px dashed #ccc; font-size: 20px; padding: 10px;"><small>final: </small>{{round($prom->prom)}}</td>
                                 
                                    @endif
                                        @empty
                                            <p>No hay registros</p>
                                        @endforelse
                               
                                @endif

                                 
                                </tr>
                                <tr>
                                    <!--================= Mostrar la fina de las calificaciones ================================-->
                                    @if(count($promedioFIN)) 
                                        @forelse($promedioFIN as $prom)
                                            @if($prom->curso_id == $crs) <!-- solo cuando el id del curso sea igual al id que recibe del forelse de cursos-->
                                                <td  style="border:1px dashed #ccc; font-size: 20px; padding: 10px;">{{round($prom->prom)}}</td>
                                                @endif
                                            @empty
                                                <p>No hay registros</p>
                                            @endforelse
                                    @else
                                    <td  style="border:1px dashed #ccc; font-size: 20px; padding: 10px;">0</td>
                                    <td  style="border:1px dashed #ccc; font-size: 20px; padding: 10px;">0</td>
                                    <td  style="border:1px dashed #ccc; font-size: 20px; padding: 10px;">0</td>
                                    <td  style="border:1px dashed #ccc; font-size: 20px; padding: 10px;">0</td>
                                    <td  style="border:1px dashed #ccc; font-size: 20px; padding: 10px;">0</td>
                                    <td  style="border:1px dashed #ccc; font-size: 20px; padding: 10px;">0</td>
                                    <td  style="border:1px dashed #ccc; font-size: 20px; padding: 10px;">0</td>

                                    @endif
                                </tr>
                                @empty
                                    <p>No hay registros</p>
                                @endforelse
                                </tbody>
                            </table>
        
    </div>
</div>

</body>
</html>