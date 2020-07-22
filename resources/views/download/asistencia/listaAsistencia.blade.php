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
        <th style="background-color: #ffffff;"   colspan="23" ></th>
        <th style="background-color: #ffffff; text-align:center;"></th>

      </tr>
      <tr>
        <th style="background-color: #ffffff; text-align:center;"  colspan="22" >SECRETARÍA DE EDUCACIÓN DEL ESTADO DE YUCATÁN</th>
        <th style="background-color: #ffffff; text-align:center;"></th>


      </tr>
      <tr>
        <th style="background-color: #ffffff; text-align:center;"  colspan="22" >"CENTRO EDUCATIVO NATANAEL"</th>
        <th style="background-color: #ffffff; text-align:center;"></th>

      </tr>
      <tr>
        <th style="background-color: #ffffff; text-align:center;"  colspan="22" >C.C.T 31PPR0032N, ZONA 029</th>
        <th style="background-color: #ffffff; text-align:center;"></th>

      </tr>
      <tr>
        <th style="background-color: #ffffff; text-align:center;"  colspan="22" >ACUERDO 2285, 2 DE JULIO DEL 2019</th>
        <th style="background-color: #ffffff; text-align:center;"></th>

      </tr>
      <tr>
        <th style="background-color: #ffffff; text-align:center;"  colspan="22" >CACALCHÉN, YUCATÁN</th>
        <th style="background-color: #ffffff; text-align:center;"></th>

      </tr>
      <tr>
        <th style="background-color: #ffffff; "  colspan="22" ></th>
        <th style="background-color: #ffffff; text-align:center;"></th>

      </tr>
      
     
    <tr >
        <th style="background-color: #c4eee7;" >Nombres</th>
        <th style="background-color: #c4eee7;" >No. Tutor</th>

        <th style="background-color: #c4eee7;">L</th>
        <th style="background-color: #c4eee7;">M</th>
        <th style="background-color: #c4eee7;">M</th>
        <th style="background-color: #c4eee7;">J</th>
        <th style="background-color: #c4eee7;">V</th>
        <th style="background-color: #c4eee7;">L</th>
        <th style="background-color: #c4eee7;">M</th>
        <th style="background-color: #c4eee7;">M</th>
        <th style="background-color: #c4eee7;">J</th>
        <th style="background-color: #c4eee7;">V</th>
        <th style="background-color: #c4eee7;">L</th>
        <th style="background-color: #c4eee7;">M</th>
        <th style="background-color: #c4eee7;">M</th>
        <th style="background-color: #c4eee7;">J</th>
        <th style="background-color: #c4eee7;">V</th>
        <th style="background-color: #c4eee7;">L</th>
        <th style="background-color: #c4eee7;">M</th>
        <th style="background-color: #c4eee7;">M</th>
        <th style="background-color: #c4eee7;">J</th>
        <th style="background-color: #c4eee7;">V</th>
      
        
      

    </tr>
    </thead>
    <tbody>
    @foreach($alumnos as $alumno)
        <tr>
            
            <td style="border:1px dashed #ccc;  width:15px;  font-size: 10px;" >
              {{ $alumno->nombres }}&nbsp;{{ $alumno->apellido_paterno }}&nbsp;{{ $alumno->apellido_materno }}
            </td>
            <td style="border:1px dashed #ccc; width:18px; " >
              {{ $alumno->telefono_tutor }}
            </td>
            <td style="border:1px dashed #ccc; width:18px; " ></td>
            <td style="border:1px dashed #ccc; width:18px; " ></td>
            <td style="border:1px dashed #ccc; width:18px; " ></td>
            <td style="border:1px dashed #ccc; width:18px; " ></td>
            <td style="border:1px dashed #ccc; width:18px; " ></td>
            <td style="border:1px dashed #ccc; width:18px; " ></td>
            <td style="border:1px dashed #ccc; width:18px; " ></td>
            <td style="border:1px dashed #ccc; width:18px; " ></td>
            <td style="border:1px dashed #ccc; width:18px; " ></td>
            <td style="border:1px dashed #ccc; width:18px; " ></td>
            <td style="border:1px dashed #ccc; width:18px; " ></td>
            <td style="border:1px dashed #ccc; width:18px; " ></td>
            <td style="border:1px dashed #ccc; width:18px; " ></td>
            <td style="border:1px dashed #ccc; width:18px; " ></td>
            <td style="border:1px dashed #ccc; width:18px; " ></td>
            <td style="border:1px dashed #ccc; width:18px; " ></td>
            <td style="border:1px dashed #ccc; width:18px; " ></td>
            <td style="border:1px dashed #ccc; width:18px; " ></td>
            <td style="border:1px dashed #ccc; width:18px; " ></td>
            <td style="border:1px dashed #ccc; width:18px; " ></td>



          </tr>
          @endforeach
          <tr>
            <td style="background-color: #ffffff; text-align:center;"  colspan="22"></td>
            <th style="background-color: #ffffff; text-align:center;"></th>

          </tr>
          
          <tr>
            <td style="background-color: #ffffff; text-align:center;"  colspan="22"></td>
            <th style="background-color: #ffffff; text-align:center;"></th>

          </tr>
   
    </tbody>
</table>
</body>
</html>