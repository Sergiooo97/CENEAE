@extends('layouts.app')
@section('title', 'orden de lista | CENEAE')
@section('content')
    
<div class="notificationsss bounce ">
    <div class="container  ">
      <div class="row">
        <div class="col-md-12">
          <div class="card bounceInleft">
            <div class="card-header">
              <h4 class="card-title btn-volver-container">Grupos del CENEAE <a class="topic btn btn-info form-inline pull-right" href="{{ URL::previous() }}">
                <i class="nc-icon nc-minimal-left"></i> Volver atrás</a></h4>
                <h5>Generar matricula y usuario para plataforma.</h5>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <form id="form" method="POST" action="{{route('grupos.update',$grad->grado)}}">
                  <div class="form-group form-inline pull-right">
                   
                  </div>
                <!-------------------------------------------empieza tabla ---------------------------------->
                <table id="example" class="table table-striped table-hover " style="width:100%">
                    <thead class=" text-info">
                      <th>
                        No. lista
                      </th>
                      <th>
                        Apellidos
                      </th>
                      <th>
                        Nombres
                      </th>
                      <th>
                        grado
                      </th>
                      <th>
                        grupo
                      </th>
                     <th></th>
                    </thead>
                    @foreach ($alumnos as $count=>$alumno)
                    @csrf @method('PATCH')
                    
                    @if ($errors->has('orden.*'))
                    <div id="ERROR_COPY" style="display: none;" class="alert alert-danger">
                      
                      {{ $errors->first('orden.*') }}
                    </div>
                @endif

                    <input id="id[]" value="{{$alumno->id}}" name="id[]" class="form-control" hidden/>
                    <input  value="{{$alumno->matricula}}" name="matricula[]" class="form-control" hidden/>
                    <input  value="{{$alumno->nombres}}" name="nombres[]" class="form-control" hidden/>

                    <tbody>
                      
                      <tr>
                        <td style="width: 3em;">
                        <input id="orden[]"  value="{{++$count}}" name="orden[]" class="form-control" required maxlength="2"/>
                        </td>
                        <td>
                          {{ $alumno->apellido_paterno }}&nbsp;{{ $alumno->apellido_materno }}
                        </td>
                        <td>
                            {{ $alumno->nombres }}                      </td>
                       
                        <td>
                          {{ $alumno->grado }} 
                        </td>
                        <td>

                            {{ $alumno->grupo }} 
                        </td>
                        <td>
                          <select name="periodo[]" class="form-control" id="periodo[]">
                            <option value="1920">Periodo 2019-2020</option>
                            <option value="2021">Periodo 2020-2021</option>
                            <option value="2122">Periodo 2021-2022</option>
                            <option value="2223">Periodo 2022-2023</option>
                            <option value="2324">Periodo 2023-2024</option>
                          </select>
                        </td>
                   
                      </tr>
                      @endforeach
    
    
    
                    </tbody>
                  </table>
              
                <!-------------------------------------------termina tabla ---------------------------------->
  
  
              </div>
            </div>
          </div>
          
  
          <!-- Button trigger modal -->
          <button type="submit" class="btn btn-primary" onclick="confirmAlert()">
            <i class="nc-icon nc-cloud-download-93"></i>
            Generar matricula y correos
          </button>
         
          <a class="btn btn-info" href="{{ URL::previous() }}"><i class="nc-icon nc-minimal-left"></i> Volver atrás</a>

  
        </form>

  
        </div>
      </div>
      @include('sweetalert::alert')
      <script src="{{asset('js/jquery-3.1.0.min.js')}}"></script>
      @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
  
      <script>
  
  
        var has_errors = {{$errors->count() > 0 ? 'true' : 'false'}};
  
        if( has_errors ){
          Swal.fire({
              title: '<strong>Error :(</br> <ul style="font-size:16px; margin-right: 1.7em;"><li>Solo se permite numeros</li><li>Maximo 2 numeros</li><li>No puede quedar campo vacio</li></ul>',
              type: 'errors',
              icon: 'error',
              html:jQuery("#ERROR_COPY").html(),
              showCloseButton: true,
            
            })
        }
            
  
     function confirmAlert() {
      event.preventDefault();
       let form = event.target;
              Swal.fire({
                    title: '¡Está seguro?',
                    text: "Estás a tiempo de cancelar!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, ordenar grupo!'
                  }).then((result) => {
                    if (result.value) {
                      document.getElementById("form").submit();
                      if(form.submit()){
                        Swal.fire(
                        'Retiro con éxito!',
                        'Ahora te mandaré a la lista :).',
                        'success'
                      )
                      }
                      
                    }
                  })         
         }
  </script>
@endsection