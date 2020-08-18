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
<table id="example" class="table table-striped table-hover " style="width:100%">
@foreach($cursos as $crs)

    <thead>
<tr style="background-color: #e0f3ef; border:1px dashed #ccc;" class="text-primary">
    <td style="border:1px dashed #ccc; background-color: #e0f3ef;" ></td>
    <!--================= Mostrar la fina de los bimestres ================================-->
    @foreach($periodos as $periodo)
        <td style="border:1px dashed #ccc; background-color: #e0f3ef;"  colspan="11">{{$periodo->nombre}}</td>
    @endforeach
</tr>
</thead>

    <tbody>
    <tr>
       <td>Español</td>

        @foreach($promedio as $prom)
            @if($prom->curso_id == 1)<!-- solo cuando el id del curso sea igual al id que recibe del forelse de cursos-->
                <td  style="border:1px dashed #ccc; background-color: #e0f3ef; ">{{$prom->ns_nombre}}</td>
                @endif
        @endforeach

    </tr>
    </tbody>

@endforeach
</table>

</body>
</html>
