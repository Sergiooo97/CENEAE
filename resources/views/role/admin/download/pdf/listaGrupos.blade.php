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
        <th style="background-color: #ffffff;"   colspan="7" ></th>

      </tr>
      <tr>
        <th style="background-color: #ffffff; text-align:center;"  colspan="7" >SECRETARÍA DE EDUCACIÓN DEL ESTADO DE YUCATÁN</th>


      </tr>
      <tr>
        <th style="background-color: #ffffff; text-align:center;"  colspan="7" >"CENTRO EDUCATIVO NATANAEL"</th>

      </tr>
      <tr>
        <th style="background-color: #ffffff; text-align:center;"  colspan="7" >C.C.T 31PPR0032N, ZONA 029</th>

      </tr>
      <tr>
        <th style="background-color: #ffffff; text-align:center;"  colspan="7" >ACUERDO 2285, 2 DE JULIO DEL 2019</th>

      </tr>
      <tr>
        <th style="background-color: #ffffff; text-align:center;"  colspan="7" >CACALCHÉN, YUCATÁN</th>

      </tr>
      <tr>
        <th style="background-color: #ffffff; "  colspan="15" ></th>

      </tr>


    <tr >
        <th style="background-color: #c4eee7; " >Matricula</th>
        <th style="background-color: #c4eee7; " >Nombres</th>
        <th style="background-color: #c4eee7; width:23px;" >curp</th>
        <th style="background-color: #c4eee7; width:5px;">grupo</th>
        <th style="background-color: #c4eee7; width:15%;" >direccion</th>
        <th style="background-color: #c4eee7; width:20px;" >nombre tutor</th>
        <th style="background-color: #c4eee7; width:20px;" >telefono tutor</th>

    </tr>
    </thead>
    <tbody>
    @foreach($alumnos as $alumno)
        <tr>
            <td style="background-color: #c4eee7;  width:15px;">{{ $alumno->matricula }}</td>
            <td style="border:1px dashed #ccc;  width:15px;  font-size: 10px;" >{{ $alumno->nombres }}&nbsp;{{ $alumno->apellido_paterno }}&nbsp;{{ $alumno->apellido_materno }}</td>
            <td style="border:1px dashed #ccc; width:18px;  font-size: 10px;" >{{ $alumno->curp }}</td>
            <td style="border:1px dashed #ccc; width:5px; font-size: 10px">{{ $alumno->grupo }}</td>
            <td style="border:1px dashed #ccc; width:15px;  font-size: 10px;" >{{ $alumno->direccion }}</td>
            <td style="border:1px dashed #ccc; width:15px; font-size: 10px;" >{{ $alumno->nombres_tutor }}&nbsp;{{ $alumno->apellido_paterno_tutor }} &nbsp;{{ $alumno->apellido_materno_tutor }}</td>
            <td style="border:1px dashed #ccc; width:15px;  font-size: 10px;" >{{ $alumno->telefono_tutor }}</td>


          </tr>
          @endforeach


    </tbody>
</table>
</body>
</html>
