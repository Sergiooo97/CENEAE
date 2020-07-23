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
        <th style="background-color: #ffffff;"   colspan="6" ></th>

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
      
     
    <tr >
      <th>#ID</th>
        <th style="background-color: #c4eee7; width:15px;" >Matricula</th>
        <th style="background-color: #c4eee7;  width:20px;" >Nombres</th>
        <th style="background-color: #c4eee7; width:23px;" >accion</th>
        <th style="background-color: #c4eee7; width:5px;">cantidad $</th>
        <th style="background-color: #c4eee7; width:15%;" >fecha de modificación</th>

    </tr>
    </thead>
    <tbody>
    @foreach($alumnos as $i=>$alumno)
        <tr>
          <td style="background-color: #c4eee7;  width:15px;">{{ ++$i }}</td>

            <td style="background-color: #c4eee7;  width:15px;">{{ $alumno->matricula }}</td>
            <td style="border:1px dashed #ccc;  width:15px;  font-size: 10px;" >{{ $alumno->nombre }}</td>
            <td style="border:1px dashed #ccc; width:18px;  font-size: 10px;" >{{ $alumno->accion }}</td>
            <td style="border:1px dashed #ccc; width:15px;  font-size: 10px;" >{{ $alumno->cantidad }}</td>
            <td style="border:1px dashed #ccc; width:15px; font-size: 10px;" >{{ $alumno->created_at }}</td>


          </tr>
          @endforeach
         
   
    </tbody>
</table>
</body>
</html>