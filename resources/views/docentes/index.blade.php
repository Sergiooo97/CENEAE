@extends('layouts.app')

@section('title', 'Docentes | CENEAE')

@section('content')
<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="registro-maestro-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
          </div>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
        <button type="button" class="btn btn-success">Registrar</button>
      </div>
    </div>
  </div>
</div>

<div class="notificationsss bounce ">
  <div class="container  ">
    <div class="row">
      <div class="col-md-12">
        <div class="card bounceInleft">
          <div class="card-header">
            <h4 class="card-title">Docentes del CENEAE</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <!-------------------------------------------empieza tabla ---------------------------------->

              <table class="table ">
                <thead class=" text-primary">
                  <th>
                    Clave
                  </th>
                  <th>
                    Nombres
                  </th>
                  <th>
                    CURP
                  </th>
                  <th>
                    Dirección
                  </th>
                  <th>
                    RFC
                  </th>
                  <th>
                    Teléfono
                  </th>

                  <th>

                  </th>
                </thead>
                <tbody>
                  @foreach ($docentes as $docente)


                  <tr>
                    <td>
                      {{$docente->matricula}}
                    </td>
                    <td>
                      {{$docente->nombres}}
                    </td>
                    <td>
                      {{$docente->rfc}}
                    </td>
                    <td>
                      {{$docente->direccion}}
                    </td>
                    <td>
                      {{$docente->telefono}}
                    </td>
                    <td>
                      (999) 329-2434
                    </td>

                    <td>
                      <button class="btn btn-primary">Detalles</button>
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
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#registro-maestro-modal">
          Registrar Maestro
        </button>
      </div>
    </div>

    @endsection