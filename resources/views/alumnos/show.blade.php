@extends('layouts.app')

@section('title', "info | {$alumno->nombres}")

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
      <form id="form" action="{{route('ndolares.store')}}" method="POST">
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
            <input name="id_alumno" type="text" class="form-control" id="id_alumno" value="{{$alumno->id}}" hidden >

            <input name="actual" type="text" class="form-control" id="actual" hidden >

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
        <button id="enviar" type="submit" class="btn btn-primary" onclick="confirmAlert()">Enviar</button>
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
          <img src="{{asset('img/ntcd.jpg')}}" width="" alt="...">
        </div>
       
        <div class="card-body">
          <div class="author">
            <a href="#">
           
                  
              
              <img class="avatar border-gray" src="{{asset('img/yo.jpg')}}" alt="...">
              <h5 class="title">{{ $alumno->nombres }}&nbsp;{{ $alumno->apellido_paterno }}&nbsp;{{ $alumno->apellido_materno }} </h5>
            </a>
           
            <p class="description slider-label">
              @ {{$alumno->matricula}}
            </p>
          </div>
          <p  class="description text-center slider-label">
            "{{$alumno->grado}}°{{$alumno->grupo}}"
           
          </p>
          <p class="description text-center slider-label">
            "De grande quiero ser {{$alumno->quiero_ser}}"
           
          </p>
          <input id="ndolar-d" value="{{$alumno->ndolares}}" hidden/>
        </br>
       
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
             
              <div  class="col-sm-9 mr-auto" >
                <button style="font-size: 23px; padding: 10px;" type="button" class="btn btn-success" data-toggle="modal"
                data-target="#depositoRetiro" data-whatever="deposito" >
                +$
              </button>
              <button id="retiro" style="font-size: 23px; padding: 10px;" type="button" class="btn btn-danger" data-toggle="modal"
              data-target="#depositoRetiro" data-whatever="retiro">
              -$
            </button>
            <a data-role="button" id="detalles" href="{{route('ndolares.show',['id' => $alumno->id , 'nombres' => $alumno->nombres])}}" style="font-size: 23px; padding: 10px;" class="btn btn-primary" hidden > <i style="padding: 0px;" class="nc-icon nc-alert-circle-i"></i></a>
            <button id="boton" class="enlace btn btn-primary" role="link" onclick="window.location='{{route('ndolares.show',['id' => $alumno->id, 'nombres' => $alumno->nombres])}}'" style="font-size: 23px; padding: 10px;"><i style="padding: 0px;" class="nc-icon nc-alert-circle-i"></i></button>

            <script>
             
                  if(document.getElementById('ndolar-d').value <=0){
                    document.getElementById('boton').disabled=true;
                    document.getElementById('retiro').disabled=true;

                  }
              </script>

          </div>
            </div>
          </div>
        </div>
      </div>
    
    </div>

    <div class="col-md-8"> 
      <div class="card card-user">
        <div class="card-header btn-volver-container">
          <h5 class="card-title">información de alumno<a class="topic btn btn-info form-inline pull-right" href="{{ URL::previous() }}">
                                                     <i class="nc-icon nc-minimal-left"></i> Volver atrás</a>
          </h5>
          
        </div>
        <div class="card-body">
         
            <div class="row">
              <div class="col-md-5 pr-1">
                <div class="form-group">
                  <label>Matricula (disabled)</label>
                  <input name="matricula" type="text" class="form-control" disabled="" placeholder="Company" value="{{$alumno->matricula}}">
                </div>
              </div>
              <div class="col-md-3 px-1">
                <div class="form-group">
                  <label>Usuario</label>
                  <input disabled="" id="nombres" type="text" class="form-control" placeholder="Username" value="{{$alumno->nombres}}">
                </div>
              </div>
              <div class="col-md-4 pl-1">
                <div class="form-group">
                  <label for="exampleInputEmail1">CURP</label>
                  <input disabled="" name="curp" type="email" class="form-control" placeholder="{{$alumno->curp}}">
                </div>
              </div>
            </div>
            
             <div class="row">
              <div class="col-md-5 pr-1">
                <div class="form-group">
                  <label>Nombres</label>
                  <input disabled="" name="nombres" type="text" class="form-control"  placeholder="Company" value="{{$alumno->nombres}}">
                </div>
              </div>
              <div class="col-md-3 px-1">
                <div class="form-group">
                  <label>Apellido paterno</label>
                  <input disabled="" name="apellido_paterno" type="text" class="form-control" placeholder="apellido1" value="{{$alumno->apellido_paterno}}">
                </div>
              </div>
              <div class="col-md-4 pl-1">
                <div class="form-group">
                  <label for="exampleInputEmail1">Apellido paterno</label>
                  <input disabled="" name="apellido_materno" type="text" class="form-control" placeholder="Apellido paterno" value="{{$alumno->apellido_materno}}">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-5 pr-1">
                <div class="form-group">
                  <label for="exampleInputEmail1">Fecha de nacimiento</label>
                  <input disabled="" name="fecha_de_nacimiento" type="date" class="form-control" placeholder="Fecha de nacimiento" value="{{$alumno->fecha_de_nacimiento}}">
                </div>
              </div>
              <div class="col-md-3 px-1">
                <div class="form-group">
                  <label>Municipio</label>
                  <input disabled="" name="municipio" type="text" class="form-control" placeholder="Municipio" value="{{$alumno->municipio}}">
                </div>
              </div>
              <div class="col-md-4 pl-1">
                <div class="form-group">
                  <label for="exampleInputEmail1">Dirección</label>
                  <input disabled="" name="direccion" type="text" class="form-control" placeholder="Dirección" value="{{$alumno->direccion}}">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-5 pr-1">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nombres de tutor</label>
                  <input disabled="" name="nombres_tutor" type="text" class="form-control" placeholder="Nombres de tutor" value="{{$alumno->nombres_tutor}}">
                </div>
              </div>
              <div class="col-md-3 px-1">
                <div class="form-group">
                  <label>Apellido paterno de tutor</label>
                  <input disabled="" name="apellido_paterno_tutor" type="text" class="form-control" placeholder="Apellido paterno de tutor" value="{{$alumno->apellido_paterno_tutor}}">
                </div>
              </div>
              <div class="col-md-4 pl-1">
                <div class="form-group">
                  <label for="exampleInputEmail1">Apellido materno de tutor</label>
                  <input disabled=""  name="apellido_materno_tutor" type="text" class="form-control" placeholder="Apellido paterno de tutor" value="{{$alumno->apellido_materno_tutor}}">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-5 pr-1">
                <div class="form-group">
                  <label for="exampleInputEmail1">Teléfono del tutor</label>
                  <input disabled="" name="telefono_tutor" type="number" class="form-control" placeholder="Teléfono del tutor" value="{{$alumno->telefono_tutor}}">
                </div>
              </div>
              <div class="col-md-3 px-1">
                <div class="form-group">
                  <label>E-mail de tutor</label>
                  <input disabled="" type="email" class="form-control" placeholder="correo del tutor" value="sergio.16070021@itsmotul.edu.mx">
                </div>
              </div>
              <div class="col-md-4 pl-1">
                <div class="form-group">
                  <label for="exampleInputEmail1">Dirección del tutor</label>
                  <input disabled="" name="direccion_tutor" type="text" class="form-control" placeholder="Dirección de tutor" value="{{$alumno->direccion_tutor}}">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="update ml-auto mr-auto">
                <a href="{{route('alumnos.edit', $alumno->id)}}"  class="btn btn-primary btn-round">Actualizar datos</a>
              </div>
            </div>
          
        </div>
      </div>
    </div>
  </div>
  <a href="{{route('calificacion.show', ['id'=> $alumno->id])}}" class="btn btn-info"><i class="nc-icon nc-hat-3"></i> Calificaciones</a>
  <a href="{{route('calificacion.show', ['id'=> $alumno->id])}}" class="btn btn-info"><i class="nc-icon nc-bullet-list-67"></i> Asistencia</a>

</div>
</div>
@include('sweetalert::alert')
<script src="{{asset('js/jquery-3.1.0.min.js')}}"></script>

@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

<script>

/*
  
      
  $('#btn-submit').on('click',function(e){
    e.preventDefault();
    var form = $(this).parents('form');
    swal({
        title: "Are you sure?",
        text: "You will not be able to recover this imaginary file!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: false
    }, function(isConfirm){
        if (isConfirm) 
        document.getElementById("form").submit();
    });
});


function confirmAlert() {
 var accion =  document.getElementById("accion").value;
  
event.preventDefault();
 let form = event.target;
        Swal.fire({
              title: '¿Realizar el '+ accion + ' para {{$alumno->nombres}}?',
              text: "Estás a tiempo de cancelar!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si!'
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
   } */
</script>
@endsection