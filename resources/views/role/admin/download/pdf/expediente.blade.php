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
        padding: 6px 5px;
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
  
</style>
</head>
<body>
    <div>
        <table width="100%" class="tabla1">
            <tr>
               
                
            </tr>
            <tr>
                <td rowspan="3" width="25%" align="center"><img id="logo" src="{{ public_path('img/logo_centro_educativo.png') }}" alt="" width="150" height="120"></td>
                <td style="line-height: 2px;" align="center">CENTRO EDUCATIVO NATANAEL</td>
                <td width="25%" rowspan="3" align="center" style="padding-right:0">
                    <table width="90">
                        
                        <tr>
                            <td width="90" height="auto" align="center" class="border "><span class="h1"><img id="logo" src="{{ public_path('img/u.jpeg') }}" alt="" width="90" height="100"></span></td>
                        </tr>
                        
                    </table>
                </td>
            </tr>
            <tr>
                <td style="line-height: 2px;" align="center">C.C.T 31PPR0032N, ZONA 029</td>
            </tr>
            <tr>
                <td style="line-height: 2px;" align="center">CACALCHÉN, YUCATÁN</td>
            </tr>
            

        </table>

        <h3 style="text-align: center;">Información del alumno</h3>
        <table width="100%" class="tabla2">
           
            <tr style="padding: 2em;">
                <td  height="60px" style="font-size: 12px !important; font-weight:bold;" width="15%">Nombre (s):</td>
                <td height="60px"  width="33%" class="linea"><span class="text">{{ strtoupper($alumno->nombres)}} &nbsp;{{ strtoupper($alumno->apellido_paterno)}} &nbsp;{{ strtoupper($alumno->apellido_materno)}} </span></td>
               
            
            </tr>
            <tr style="padding: 2em;">
                <td height="60px" style="font-size: 12px !important; font-weight:bold;" >Fecha de nacimiento</td>
                <td height="60px"  width="33%" class="linea"><span class="text">{{ $alumnos->nacimiento}} </span></td>
                <td height="60px" style="font-size: 12px !important; font-weight:bold;" >edad:</td>
                <td height="60px" class="linea"><span class="text">{{ $alumnos->edad}} </span></td>
                <td height="60px" style="font-size: 12px !important; font-weight:bold;" >CURP:</td>
                <td height="60px" class="linea"><span class="text">EXGS971124HYNBLR01</span></td>
    
            </tr>
            <tr>
                <td height="60px" style="font-size: 12px !important; font-weight:bold;" >Sexo:</td>
                <td height="60px" class="linea"><span class="text">MASCULINO</span></td>
                <td height="60px" style="font-size: 12px !important; font-weight:bold;" >Peso:</td>
                <td height="60px" class="linea"><span class="text">60kg</span></td>
                <td height="60px" style="font-size: 12px !important; font-weight:bold;" >altura:</td>
                <td height="60px" class="linea"><span class="text">1.70m</span></td>
               
            </tr>
            <tr>
                <td height="60px" style="font-size: 12px !important; font-weight:bold;" >Dirección:</td>
                <td height="60px" class="linea"><span class="text">CALLE 16 X 17 Y 19.</span></td>
                <td height="60px" style="font-size: 12px !important; font-weight:bold;" >Código postal:</td>
                <td height="60px" class="linea"><span class="text">{{ $alumnos->cp}} </span></td>
                <td height="60px" style="font-size: 12px !important; font-weight:bold;" >Municipio:</td>
                <td height="60px" class="linea"><span class="text">CACALCHÉN, YUCATÁN.</span></td>
              
            </tr>
            <tr>
               
                <td height="60px" style="font-size: 12px !important; font-weight:bold;" >Escuela de procedencia:</td>
                <td  height="60px" class="linea"><span class="text">CHAC-MOOL</span></td>
                <td height="60px" style="font-size: 12px !important; font-weight:bold;" >Grupo:</td>
                <td height="60px" class="linea"><span class="text">1A</span></td>
                <td height="60px" style="font-size: 12px !important; font-weight:bold;" >Regularidad:</td>
                <td height="60px" class="linea"><span class="text">Regular</span></td>

               
            </tr>
          
           
            <tr>
                <td height="50px" style="font-size: 12px !important; font-weight:bold;" >Fecha de ingreso:</td>
                <td height="50px" class="linea"><span class="text">24/11/2019</span></td>
                <td height="50px" style="font-size: 12px !important; font-weight:bold;" >Estatus:</td>
                <td height="50px" class="linea"><span class="text">ACTIVO</span></td>
   
            </tr>
           
        </table>
        <h3 style="text-align: center;">Información del Tutor</h3>
        <table width="100%" class="tabla2">
           
            <tr style="padding: 2em;">
                <td  height="60px" style="font-size: 12px !important; font-weight:bold;" width="15%">Nombre (s):</td>
                <td height="60px"  width="33%" class="linea"><span class="text">{{ strtoupper($alumno->nombres)}} &nbsp;{{ strtoupper($alumno->apellido_paterno)}} &nbsp;{{ strtoupper($alumno->apellido_materno)}} </span></td>
               
            
            </tr>
            <tr style="padding: 2em;">
                <td height="60px" style="font-size: 12px !important; font-weight:bold;" >Fecha de nacimiento</td>
                <td height="60px"  width="33%" class="linea"><span class="text">{{ $alumnos->nacimiento}} </span></td>
                <td height="60px" style="font-size: 12px !important; font-weight:bold;" >edad:</td>
                <td height="60px" class="linea"><span class="text">{{ $alumnos->edad}} </span></td>
                <td height="60px" style="font-size: 12px !important; font-weight:bold;" >CURP:</td>
                <td height="60px" class="linea"><span class="text">EXGS971124HYNBLR01</span></td>
    
            </tr>
            <tr>
                <td height="60px" style="font-size: 12px !important; font-weight:bold;" >Sexo:</td>
                <td height="60px" class="linea"><span class="text">MASCULINO</span></td>
                <td height="60px" style="font-size: 12px !important; font-weight:bold;" >Peso:</td>
                <td height="60px" class="linea"><span class="text">60kg</span></td>
                <td height="60px" style="font-size: 12px !important; font-weight:bold;" >altura:</td>
                <td height="60px" class="linea"><span class="text">1.70m</span></td>
               
            </tr>
            <tr>
                <td height="60px" style="font-size: 12px !important; font-weight:bold;" >Dirección:</td>
                <td height="60px" class="linea"><span class="text">CALLE 16 X 17 Y 19.</span></td>
                <td height="60px" style="font-size: 12px !important; font-weight:bold;" >Código postal:</td>
                <td height="60px" class="linea"><span class="text">{{ $alumnos->cp}} </span></td>
                <td height="60px" style="font-size: 12px !important; font-weight:bold;" >Municipio:</td>
                <td height="60px" class="linea"><span class="text">CACALCHÉN, YUCATÁN.</span></td>
              
            </tr>
            <tr>
               
                <td height="60px" style="font-size: 12px !important; font-weight:bold;" >Escuela de procedencia:</td>
                <td  height="60px" class="linea"><span class="text">CHAC-MOOL</span></td>
                <td height="60px" style="font-size: 12px !important; font-weight:bold;" >Grupo:</td>
                <td height="60px" class="linea"><span class="text">1A</span></td>
                <td height="60px" style="font-size: 12px !important; font-weight:bold;" >Regularidad:</td>
                <td height="60px" class="linea"><span class="text">Regular</span></td>

               
            </tr>
          
           
            <tr>
                <td height="50px" style="font-size: 12px !important; font-weight:bold;" >Fecha de ingreso:</td>
                <td height="50px" class="linea"><span class="text">24/11/2019</span></td>
                <td height="50px" style="font-size: 12px !important; font-weight:bold;" >Estatus:</td>
                <td height="50px" class="linea"><span class="text">ACTIVO</span></td>
   
            </tr>
           
        </table>
        <!--SALTO DE PÁGINA ---->
        <!--SALTO DE PÁGINA ---->
        <!--SALTO DE PÁGINA ---->
        <!--SALTO DE PÁGINA ---->
       
        <div style="page-break-after:always;"></div>
        <table width="100%" class="tabla1">
            <tr>
             
                
            </tr>
            <tr>
                <td  rowspan="3" width="20%" align="center"><img id="logo" src="{{ public_path('img/logo_centro_educativo.png') }}" alt="" width="120" height="100"></td>
                <td style="line-height: 2px;" align="center">CENTRO EDUCATIVO NATANAEL</td>
                <td  rowspan="3" width="20%" align="center"><img id="logo" src="{{ public_path('img/segeey.png') }}" alt="" width="120" height="100"></td>
            </tr>
            <tr>

                <td style="line-height: 2px;" align="center">C.C.T 31PPR0032N, ZONA 029</td>
            </tr>
            <tr>

                <td style="line-height: 2px;" align="center">CACALCHÉN, YUCATÁN</td>
            </tr>
            

        </table>
        <h3 style="text-align: center;">Historial de Natadolares de {{ $alumno->nombres }}</h3>
        <table width="100%" class="tabla2">
           
            <tr style="padding: 2em;">
                <td  height="60px" style="font-size: 12px !important; font-weight:bold;" width="15%">Nombre (s):</td>
                <td height="60px"  width="33%" class="linea"><span class="text">{{ strtoupper($alumno->nombres)}} &nbsp;{{ strtoupper($alumno->apellido_paterno)}} &nbsp;{{ strtoupper($alumno->apellido_materno)}} </span></td>
               
                <td  height="60px" style="font-size: 12px !important; font-weight:bold;" width="15%">Matricula</td>
                <td height="60px"  width="33%" class="linea"><span class="text">{{ strtoupper($alumnos->matricula)}}</span></td>
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
            <tr>
                <td style="border:0;">&nbsp;</td>
                <td align="center" style="border:0;">
                    <table width="200" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td align="center" class="cancelado">CANCELADO</td>
                        </tr>
                    </table>
                </td>
                <td style="border:0;">&nbsp;</td>
                <td align="center" style="border:0;" class="emisor"><strong>EMISOR</strong></td>
            </tr>
        </table>
        <div style="page-break-after:always;"></div>
        <table width="100%" class="tabla1">
            <tr>
             
                
            </tr>
            <tr>
                <td  rowspan="3" width="20%" align="center"><img id="logo" src="{{ public_path('img/logo_centro_educativo.png') }}" alt="" width="120" height="100"></td>
                <td style="line-height: 2px;" align="center">CENTRO EDUCATIVO NATANAEL</td>
                <td  rowspan="3" width="20%" align="center"><img id="logo" src="{{ public_path('img/segeey.png') }}" alt="" width="120" height="100"></td>
            </tr>
            <tr>

                <td style="line-height: 2px;" align="center">C.C.T 31PPR0032N, ZONA 029</td>
            </tr>
            <tr>

                <td style="line-height: 2px;" align="center">CACALCHÉN, YUCATÁN</td>
            </tr>
            

        </table>
        <h3 style="text-align: center;">promedios de {{ $alumno->nombres }}</h3>
        <table width="100%" class="tabla2">
           
            <tr style="padding: 2em;">
                <td  height="60px" style="font-size: 12px !important; font-weight:bold;" width="15%">Nombre (s):</td>
                <td height="60px"  width="33%" class="linea"><span class="text">{{ strtoupper($alumno->nombres)}} &nbsp;{{ strtoupper($alumno->apellido_paterno)}} &nbsp;{{ strtoupper($alumno->apellido_materno)}} </span></td>
               
                <td  height="60px" style="font-size: 12px !important; font-weight:bold;" width="15%">Matricula</td>
                <td height="60px"  width="33%" class="linea"><span class="text">{{ strtoupper($alumnos->matricula)}}</span></td>
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
                                    @forelse($promedioFINAL as $prom)
                                        @if($prom->curso_id == $crs) <!-- solo cuando el id del curso sea igual al id que recibe del forelse de cursos-->
                                        <td rowspan="2"   style="border:1px dashed #ccc; font-size: 20px; padding: 10px;"><small>final: </small>{{round($prom->prom)}}</td>
                                        @endif
                                    @empty
                                        <p>No hay registros</p>
                                    @endforelse
                                </tr>
                                <tr>
                                    <!--================= Mostrar la fina de las calificaciones ================================-->
                                @forelse($promedioFIN as $prom)
                                    @if($prom->curso_id == $crs) <!-- solo cuando el id del curso sea igual al id que recibe del forelse de cursos-->
                                        <td  style="border:1px dashed #ccc; font-size: 20px; padding: 10px;">{{round($prom->prom)}}</td>
                                        @endif
                                    @empty
                                        <p>No hay registros</p>
                                    @endforelse
                                </tr>
                                @empty
                                    <p>No hay registros</p>
                                @endforelse
                                </tbody>
                            </table>
        
    </div>
</body>
</html>