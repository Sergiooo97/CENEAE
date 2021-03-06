@extends('layouts.app')
@section('title', 'Banco | CENEAE')
<script src="{{ asset('js/app.js') }}"></script>
@section('content')

<div class="notificationsss bounce ">
  <div class="container  ">
    <div class="row">
      <div class="col-md-12">
        <div class="card bounceInleft">
          <div class="card-header">
            <h4 class="card-title btn-volver-container">Seleccione grupo o alumno a depositar <a
                class="topic btn btn-info form-inline pull-right" href="{{ URL::previous() }}">
                <i class="nc-icon nc-minimal-left"></i> Volver atrás</a></h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <form action="{{route('ndolares.deposito')}}" method="GET" class="form-inline pull-right" role="search">
                <label for="grupo"> Grupo: </label>
                <select name="grupo" class="form-control" id="grupo" onchange="this.form.submit();  ">
                  @foreach ($grupos as $grupo)
                    @if ($grupo->id == request('grupo') )
                    <option value="{{request('grupo')}}">{{$grupo->nombre}}</option>
                    @endif      
                  @endforeach
                  @foreach ($grupos as $grupo)
                    <option value="{{ $grupo->id }}">{{ $grupo->nombre }}</option>
                  @endforeach
                </select>
                <label for="nombres">Nombre:</label>
                <input value="{{ request('nombres')}}" name="nombres" id="nombres" class="form-control"
                  onkeydown="document.ready = document.getElementById('grado').value = '0';document.ready = document.getElementById('grupo').value = '0';" />

                <button type="submit" class="btn btn-info"><i class="nc-icon nc-zoom-split"></i> Buscar</button>
              </form>
              <form id="form" method="POST" action="{{route('ndolares.deposito.store')}}">
                <div class="form-group form-inline pull-right">

                </div>
                <!-------------------------------------------empieza tabla ---------------------------------->
                <table id="example" class="table table-striped table-hover " style="width:100%">
                  <thead class=" text-info">

                    <th>
                      Nombres
                    </th>
                    <th>
                      Grado y grupo
                    </th>
                    <th>
                      Cantidad actual
                    </th>
                    <th>
                      cantidad
                    </th>
                    <th></th>
                    @foreach ($alumnos as $count=>$alumno)
                    @csrf @method('PATCH')



                    @if ($errors->has('cantidad.*'))
                    <div id="ERROR_COPY" style="display: none;" class="alert alert-danger">

                      {{ $errors->first('cantidad.*') }}
                    </div>
                @endif


                    <tbody>

                      <tr>
                        <td>
                          {{ $alumno->nombres }}
                          <input id="nombre[]" value="{{$alumno->nombres}}" name="nombre[]" class="form-control" hidden />
                          <input id="id_alumno[]" value="{{$alumno->id}}" name="id_alumno[]" class="form-control"
                            hidden />
                          <input value="{{$alumno->matricula}}" name="matricula[]" id="matricula[]" class="form-control"
                            hidden />
                        </td>
                        <td>
                          {{ $alumno->grado }}&nbsp;{{ $alumno->grupo }} </td>

                        <td>
                            <input id="actual[]" value="{{ $alumno->cantidad }}" name="actual[]" class="form-control" hidden />
                            {{ $alumno->cantidad }}
                        </td>
                        <td style="width: 3em;">
                          <input class="required form-control" id="field" type="text" maxlength="3" pattern="([0-9]|[0-9]|[0-9])" id="cantidad[]" name="cantidad[]" onkeyup="limpiarNumero(this)" required/>
                          <script>
                            function limpiarNumero(obj) {
                              /* El evento "change" sólo saltará si son diferentes */
                              obj.value = obj.value.replace(/\D/g, '');
                            }
                              $("#myField").keyup(function() {
                                  $("#myField").val(this.value.match(/[0-9]*/));
                              });
                            </script>                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                </table>

                <!-------------------------------------------termina tabla ---------------------------------->

                {{ $alumnos->appends($_GET)->links() }}


            </div>
          </div>
        </div>

        <div class="form-group pull-left">

          <!-- Button trigger modal -->
        <a href="{{route('ndolares.retiro')}}" class="btn btn-danger">
            <i class="nc-icon nc-money-coins"></i>
            ir a retiros
          </a>
        </div>
        <div class="form-group pull-right">

          <!-- Button trigger modal -->
          <button  type="submit" class="btn btn-success" onclick="confirmAlert()">
            <i class="nc-icon nc-money-coins"></i>
            Depositar
          </button>
        </div>



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
            title: '<strong>Error!</br> <ul style="font-size:16px; margin-right: 1.7em;"><li>Solo se permite numeros</li><li>Maximo 4 numeros</li><li>No puede quedar campo vacio</li></ul>',
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
                  title: '¡Está seguro de realizar el deposito?',
                  text: "Estás a tiempo de cancelar!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Si, depositar!'
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
