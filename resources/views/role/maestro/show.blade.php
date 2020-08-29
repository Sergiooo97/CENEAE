@extends('layouts.app')
@section('title', 'Docentes | CENEAE')
@section('content')
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
                                <h5 class="title">{{ $docentes->nombres }}&nbsp;{{ $docentes->apellido_paterno }}&nbsp;{{ $docentes->apellido_materno }}</h5>
                            </a>

                            <p class="description slider-label">
                                @ {{$docentes->matricula}}
                            </p>
                        </div>
                        <p class="description text-center slider-label">
                            "mstro. Educación"

                        </p>
                        <p class="description text-center slider-label">

                        </p>

                    </div>
                    <div class="card-footer">
                        <hr>
                        <div class="button-container">
                            <div class="row">
                                <div class="col-sm-3 mr-auto">
                                    <br>
                                    </h5>
                                </div>

                                <div class="col-sm-9 mr-auto">


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-8">
                <div class="card card-user">
                    <div class="card-header btn-volver-container">
                        <h5 class="card-title">información de alumno</h5>

                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-5 pr-1">
                                <div class="form-group">
                                    <label>Matricula (disabled)</label>
                                    <input name="matricula" type="text" class="form-control" disabled=""
                                        placeholder="Company" value="{{$docentes->matricula}}">
                                </div>
                            </div>
                            <div class="col-md-3 px-1">
                                <div class="form-group">
                                    <label>Usuario</label>
                                    <input disabled="" id="nombres" type="text" class="form-control"
                                        placeholder="Username" value="{{$docentes->nombres}}">
                                </div>
                            </div>
                            <div class="col-md-4 pl-1">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">CURP</label>
                                    <input disabled="" name="curp" type="email" class="form-control"
                                        placeholder="{{$docentes->curp}}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5 pr-1">
                                <div class="form-group">
                                    <label>Nombres</label>
                                    <input disabled="" name="nombres" type="text" class="form-control"
                                        placeholder="Company" value="{{$docentes->nombres}}">
                                </div>
                            </div>
                            <div class="col-md-3 px-1">
                                <div class="form-group">
                                    <label>Apellido paterno</label>
                                    <input disabled="" name="apellido_paterno" type="text" class="form-control"
                                        placeholder="apellido1" value="{{$docentes->apellido_paterno}}">
                                </div>
                            </div>
                            <div class="col-md-4 pl-1">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Apellido paterno</label>
                                    <input disabled="" name="apellido_materno" type="text" class="form-control"
                                        placeholder="Apellido paterno" value="{{$docentes->apellido_materno}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 pr-1">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Fecha de nacimiento</label>
                                    <input disabled="" name="fecha_de_nacimiento" type="date" class="form-control"
                                        placeholder="Fecha de nacimiento" value="{{$docentes->fecha_de_nacimiento}}">
                                </div>
                            </div>
                            <div class="col-md-3 px-1">
                                <div class="form-group">
                                    <label>Municipio</label>
                                    <input disabled="" name="municipio" type="text" class="form-control"
                                        placeholder="Municipio" value="{{$docentes->municipio}}">
                                </div>
                            </div>
                            <div class="col-md-4 pl-1">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Dirección</label>
                                    <input disabled="" name="direccion" type="text" class="form-control"
                                        placeholder="Dirección" value="{{$docentes->direccion}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 pr-1">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Teléfono</label>
                                    <input disabled="" name="telefono_tutor" type="number" class="form-control"
                                        placeholder="Teléfono del tutor" value="{{$docentes->telefono}}">
                                </div>
                            </div>
                            <div class="col-md-7 px-1">
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input disabled="" type="email" class="form-control" placeholder="correo del tutor"
                                        value="{{$docentes->correo}}">
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="update ml-auto mr-auto">
                                <a href="#"
                                    class="btn btn-primary btn-round">Actualizar datos</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        @endsection