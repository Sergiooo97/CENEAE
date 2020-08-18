<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
      <!-- CSS Files -->
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    </head>
<body>

  <table>
    <thead>

      <tr>
        <th style="background-color: #ffffff;"   colspan="5" ></th>

      </tr>
      <tr>
        <th style="background-color: #ffffff; text-align:center;"  colspan="6" >SECRETARÍA DE EDUCACIÓN DEL ESTADO DE YUCATÁN</th>


      </tr>
      <tr>
        <th style="background-color: #ffffff; text-align:center;"  colspan="6" >"CENTRO EDUCATIVO NATANAEL"</th>

      </tr>
      <tr>
        <th style="background-color: #ffffff; text-align:center;"  colspan="6" >C.C.T 31PPR0032N, ZONA 029</th>

      </tr>
      <tr>
        <th style="background-color: #ffffff; text-align:center;"  colspan="6" >ACUERDO 2285, 2 DE JULIO DEL 2019</th>

      </tr>
      <tr>
        <th style="background-color: #ffffff; text-align:center;"  colspan="6" >CACALCHÉN, YUCATÁN</th>

      </tr>
      <tr>
        <th style="background-color: #ffffff; "  colspan="6" ></th>

      </tr>
      <tr>
          <th style="background-color: #ffffff; text-align:center;"  colspan="6" >Historial de: {{$alumno_n->nombres}}</th>
      </tr>
      <tr>
          <th style="background-color: #ffffff; text-align:center;"  colspan="6" >Matricula: {{$alumno_n->matricula}}</th>
      </tr>

    <tr >
      <th>#ID</th>
        <th style="background-color: #c4eee7; " >accion</th>
        <th style="background-color: #c4eee7; ">$</th>
        <th style="background-color: #c4eee7; ">Comentario</th>
        <th style="background-color: #c4eee7;" >Fecha</th>
        <th style="background-color: #c4eee7;" >Hora</th>
    </tr>
    </thead>
    <tbody>
    @foreach($alumnos as $i=>$alumno)
        <tr>
          <td style="background-color: #c4eee7;">{{ ++$i }}</td>
            <td style="border:1px dashed #ccc; width:18px;  font-size: 10px;" >{{ $alumno->accion }}</td>
            <td style="border:1px dashed #ccc; font-size: 10px;" >{{ $alumno->cantidad }}</td>
            <td style="border:1px dashed #ccc; width:15px;  font-size: 10px;" >{{ $alumno->comentario }}</td>
            <td style="border:1px dashed #ccc; width:15px; font-size: 10px;" >{{ $alumno->created_at->isoFormat('D-M-Y') }}</td>
            <td style="border:1px dashed #ccc; width:15px; font-size: 10px;" >{{ $alumno->created_at->isoFormat('H:mm A') }}</td>
          </tr>
          @endforeach
    <tr>
        <th style="background-color: #c4eee7; " colspan="5"></th>
        <th style="background-color: #c4eee7; ">Actual: ${{$alumno_n->total}}</th>
    </tr>
    </tbody>
</table>
</body>
</html>
