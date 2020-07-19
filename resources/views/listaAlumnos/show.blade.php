@extends('layouts.app')

@section('title', "info | {$alumno->nombres}")
<style>
  table {
   width: 100%;
  border-radius: 15px;
}
th, td {
   width: 10%;
   text-align: left;
   vertical-align: top;
   border: 1px solid rgba(82, 82, 82, 0.455);
   padding: 0.3em;
}
thead{
  background: rgb(149, 149, 149);
  color: #ffffff;
}
.deposito {
    background: rgb(0, 141, 45);
    color: #ffffff;
  }

  .retiro {
    background: rgb(141, 5, 0);
    color: #ffffff;
  }
</style>

@section('content') 
<!-- Button trigger modal -->
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="depositoRetiro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{route('ndolares.store')}}" method="POST">
        @csrf
          <div class="form-group">
            <div class="row">
                <div class="col-sm">

                  {!!Form::label('accion','se realiza...',['class'=>'label'])!!}
                  <input name="accion" type="text" class="form-control accion" id="accion" id="recipient-name" readonly>

                </div>
                <div class="col-sm">
                  {!!Form::label('matricula','matricula',['class'=>'label'])!!}
                  <input name="matricula" type="text" class="form-control " value="{{$alumno->matricula}}" readonly>

                </div>
              </div>
              <label for="accion-para" class="col-form-label ">Para...</label>
            <input name="nombre" type="text" class="form-control" id="accion-para" value="{{$alumno->nombres}}&nbsp;{{$alumno->apellido_paterno}}&nbsp;{{$alumno->apellido_materno}}" readonly>
            <input name="antes" type="text" class="form-control" id="antes" value="{{$alumno->ndolares}}" hidden >
            <input name="actual" type="text" class="form-control" id="actual" hidden>

            <label for="recipient-name" class="col-form-label titulo-accion">Desposito/Retiro</label>
            <input name="cantidad" type="text" class="form-control" id="cantidad" id="recipient-name" >
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">comentario (opcional):</label>
            <textarea name="comentario" class="form-control" id="message-text"></textarea>
          </div>
   
<script>
  $('document').ready(function(){
            $('#enviar').click(function(){
              var actual = $("#actual").val();
              var accion = $("#accion").val();
              if(accion == "deposito"){
                $("#actual").val(parseFloat($('#antes').val()) + parseFloat($('#cantidad').val()));
              }else if(accion == "retiro"){
                $("#actual").val(parseFloat($('#antes').val()) - parseFloat($('#cantidad').val()));

              }                
            });
        });
 
</script>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button id="enviar" type="submit" class="btn btn-primary">Enviar</button>
      </div>
    </form>
    </div>
  </div>
</div>
<script>
  $('#depositoRetiro').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever')
  var nombre =  $("#nombres").val(); 

  // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text(recipient + ' para ' + nombre)
  modal.find('.titulo-accion').text('Cantidad para ' + recipient)

  modal.find('.accion').val(recipient)
})
</script>
<div class="container">


<div class="content">
  <div class="row">
    <div class="col-md-4">
      <div class="card card-user">
        <div class="image">
          <img src="{{asset('img/nat.jpg')}}" width="" alt="...">
        </div>
       
        <div class="card-body">
          <div class="author">
            <a href="#">
           
                  
              
              <img class="avatar border-gray" src="{{asset('img/yo.jpg')}}" alt="...">
              <h5 class="title">{{$alumno->nombres}} <span class="mrEK_ Szr5J coreSpriteVerifiedBadge " title="Verificado">Verificado</span></h5>
            </a>
           
            <p class="description">
              @ {{$alumno->matricula}}
            </p>
          </div>
          <p class="description text-center">
            "De grande quiero ser {{$alumno->quiero_ser}}"
           
          </p>
        </div>
        <div class="card-footer">
          <hr>
          <div class="button-container">
            <div class="row">
              <div class="col-sm-3 mr-auto">
                <h5>{{$alumno->ndolares}} $
                  <br>
                  <small style="font-size: 14px;">dolares</small>
                </h5>
              </div>
             
              <div class="col-sm-9 mr-auto" >
                <button style="font-size: 14px;" type="button" class="btn btn-success" data-toggle="modal"
                data-target="#depositoRetiro" data-whatever="deposito">
                +$
              </button>
              <button style="font-size: 14px;" type="button" class="btn btn-danger" data-toggle="modal"
              data-target="#depositoRetiro" data-whatever="retiro">
              -$
            </button>
            <a href="{{route('ndolares.show',['id' => $alumno->matricula])}}" style="font-size: 14px;" class="btn btn-primary" >
              detalles
          </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    
    </div>

    <div class="col-md-8">
      {!! Form::open(['route' => 'inscripcion.store', 'method'=>'POST']) !!}

      <div class="card card-user">
        <div class="card-header">
          <h5 class="card-title">información de alumno</h5>
        </div>
        <div class="card-body">
          <form>
            <div class="row">
              <div class="col-md-5 pr-1">
                <div class="form-group">
                  <label>Matricula (disabled)</label>
                  <input type="text" class="form-control" disabled="" placeholder="Company" value="{{$alumno->matricula}}">
                </div>
              </div>
              <div class="col-md-3 px-1">
                <div class="form-group">
                  <label>Usuario</label>
                  <input id="nombres" type="text" class="form-control" placeholder="Username" value="{{$alumno->nombres}}">
                </div>
              </div>
              <div class="col-md-4 pl-1">
                <div class="form-group">
                  <label for="exampleInputEmail1">CURP</label>
                  <input type="email" class="form-control" placeholder="{{$alumno->curp}}">
                </div>
              </div>
            </div>
            
             <div class="row">
              <div class="col-md-5 pr-1">
                <div class="form-group">
                  <label>Nombres</label>
                  <input type="text" class="form-control"  placeholder="Company" value="{{$alumno->nombres}}">
                </div>
              </div>
              <div class="col-md-3 px-1">
                <div class="form-group">
                  <label>Apellido paterno</label>
                  <input type="text" class="form-control" placeholder="apellido1" value="{{$alumno->apellido_paterno}}">
                </div>
              </div>
              <div class="col-md-4 pl-1">
                <div class="form-group">
                  <label for="exampleInputEmail1">Apellido paterno</label>
                  <input type="text" class="form-control" placeholder="Apellido paterno" value="{{$alumno->apellido_materno}}">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-5 pr-1">
                <div class="form-group">
                  <label for="exampleInputEmail1">Fecha de nacimiento</label>
                  <input type="date" class="form-control" placeholder="Fecha de nacimiento" value="{{$alumno->fecha_de_nacimiento}}">
                </div>
              </div>
              <div class="col-md-3 px-1">
                <div class="form-group">
                  <label>Municipio</label>
                  <input type="text" class="form-control" placeholder="Municipio" value="{{$alumno->municipio}}">
                </div>
              </div>
              <div class="col-md-4 pl-1">
                <div class="form-group">
                  <label for="exampleInputEmail1">Dirección</label>
                  <input type="text" class="form-control" placeholder="Dirección" value="{{$alumno->direccion}}">
                </div>
              </div>
            </div>




            <div class="row">
              <div class="update ml-auto mr-auto">
                <button type="submit" class="btn btn-primary btn-round">Actualizar perfil</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      {!! Form::close() !!}

    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Calificaciones</h4>
        </div>
        <div class="card-body">
          <!------------------- TABLA DE CALIFICACIONES------------------------------------->
          <div class="table-responsive">
            <table class="col-md-12" class="table-bordered">
                <thead >
                <th scope="row">UNIDADES CURRICULARES</th>
                <th>PERIODOS DE
                  EVALUACIÓN</th>
                <th>1er</th>
                <th>2°</th>
                <th>3er</th>
                <th>PROMEDIO FINAL</th>

                </thead>
              <tr>
                <th  rowspan="2">ESPAÑOL</th>
                <td>Nivel de desempeño</td>
                <td>100</td>
                <td>100</td>
                <td>100</td>
                <td>100</td>

              </tr>
              <tr>
                <td>Calificación</td>
                <td>100</td>
                <td>100</td>
                <td>100</td>
                <td>100</td>

              </tr>
              <tr>
                <th rowspan="2">Matemáticas</th>
                <td>Nivel de desempeño</td>
                <td>100</td>
                <td>100</td>
                <td>100</td>
                <td>100</td>

              </tr>
              <tr>
                <td>Calificación</td>
                <td>100</td>
                <td>100</td>
                <td>100</td>
                <td>100</td>

              </tr>

              <tr>
                <th rowspan="2">Inglés</th>
                <td>Nivel de desempeño</td>
                <td>100</td>
                <td>100</td>
                <td>100</td>
                <td>100</td>

              </tr>
              <tr>
                <td>Calificación</td>
                <td>100</td>
                <td>100</td>
                <td>100</td>
                <td>100</td>

              </tr>
              <tr>
                <th rowspan="2">Conocimiento del medio</th>
                <td>Nivel de desempeño</td>
                <td>100</td>
                <td>100</td>
                <td>100</td>
                <td>100</td>

              </tr>
              <tr>
                <td>Calificación</td>
                <td>100</td>
                <td>100</td>
                <td>100</td>
                <td>100</td>

              </tr>
              <tr>
                <th rowspan="2">PROMEDIO FINAL</th>
                <td>Nivel de desempeño</td>
                <td>100</td>
                <td>100</td>
                <td>100</td>
                <td>100</td>

              </tr>
              <tr>
                <td>Calificación</td>
                <td>100</td>
                <td>100</td>
                <td>100</td>
                <td>100</td>
              </tr>
            </table>
            <!------------------- FIN TABLA DE CALIFICACIONES------------------------------------->
            <table style="margin-top:1em !important;" class="col-md-12" class="table-bordered">

              
            
            <tr>
              <th>ARTES</th>
              <td>Nivel de desempeño</td>
              <td>100</td>
              <td>100</td>
              <td>100</td>
              <td>100</td>

            </tr>
            <tr>
              <th>EDUCACIÓN  SOCIOEMOCIONAL</th>
              <td>Nivel de desempeño</td>
              <td>100</td>
              <td>100</td>
              <td>100</td>
              <td>100</td>

            </tr>
            <tr>
              <th>EDUCACIÓN FÍSICA</th>
              <td>Nivel de desempeño</td>
              <td>100</td>
              <td>100</td>
              <td>100</td>
              <td>100</td>

            </tr>
        
            <tr>
              <th rowspan="2">PROMEDIO FINAL</th>
              <td>Nivel de desempeño</td>
              <td>100</td>
              <td>100</td>
              <td>100</td>
              <td>100</td>

            </tr>
            <tr>
              <td>Calificación</td>
              <td>100</td>
              <td>100</td>
              <td>100</td>
              <td>100</td>
            </tr>
          </table>
          <!-------____-------------------------------------------->
            <!------------------- FIN TABLA DE CALIFICACIONES------------------------------------->
            <table style="margin-top:1em !important;" class="col-md-12" class="table-bordered">

              
            
              <tr>
                <th>AUTONOMÍA CURRICULAR</th>
                <td>Nivel de desempeño</td>
                <td>100</td>
                <td>100</td>
                <td>100</td>
                <td>100</td>
          
              <tr>
                <th rowspan="2">PROMEDIO FINAL</th>
                <td>Nivel de desempeño</td>
                <td>100</td>
                <td>100</td>
                <td>100</td>
                <td>100</td>

              </tr>
              <tr>
                <td>Calificación</td>
                <td>100</td>
                <td>100</td>
                <td>100</td>
                <td>100</td>
              </tr>
            </table>
            <!-------____-------------------------------------------->

          </div>

        </div>
      </div>
    </div>

  </div>
</div>
</div>
@endsection