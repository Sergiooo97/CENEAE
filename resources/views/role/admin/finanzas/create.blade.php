@extends('layouts.app')
@section('title', 'CENEAE | finanzas')
<script src="{{ asset('js/app.js') }}"></script>
@section('content')
<div class="container">
    <div class="content">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header">
                        <h5>Ingresos de CENEAE</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('finanzas.ingreso')}}">
                            @csrf
                        <div class="form-group">
                                <label>Seleccionar concepto</label>
                                <select class="form-control" id="conceptoIngreso" name="conceptoIngreso">
                                    <option value="0">Seleccionar</option>
                                    <option value="colegiatura">Colegiaturas</option>
                                    <option value="cuotas">Cuotas, examen, copias</option>
                                    <option value="desayunos">Desayunos</option>
                                    <option value="internet">Internet</option>
                                    <option value="local">Renta de local</option>
                                    <option value="Taxi">Renta de taxi</option>
                                    <option value="presupuesto">Presupuesto</option>
                                    <option value="plantaAgua">Planta de agua</option>
                                    <option value="devolPrestamo">Devolución de prestamos</option>
                                </select>
                                <label>Ingrese cantidad</label>
                                <input class="form-control" id="cantidadIngreso" name="cantidadIngreso" type="number">
                                <label>Ingrese un comentario</label>
                                <textarea class="form-control" id="comentarioIngreso" name="comentarioIngreso" placeholder="" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <p>Total de ingresos de este mes</p>
                            <h5 class="text-success">$ {{ number_format($ingresos->total_ingreso) }}</h5>
                        </div>
                        <div class="form-group pull-right">
                            <button type="submit" class="btn btn-success">Enviar</button>
                        </div>
                    </div>
                </form>
                 </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header">
                        <h5>Salidas de CENEAE</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                        <form method="POST" action="{{ route('finanzas.salida')}}">
                                @csrf
                            <label>Seleccionar concepto</label>
                            <select class="form-control" id="conceptoSalida" name="conceptoSalida">
                                <option value="0">Seleccionar</option>
                                <option value="nomina">Nómina</option>
                                <option value="eventos">Eventos</option>
                                <option value="varios">Varios</option>
                                <option value="mantenimiento">Mantenimiento</option>
                                <option value="utilidades">Utilidades</option>
                                <option value="salarios">Salarios</option>
                                <option value="corriente_electrica">Corriente eléctrica</option>
                                <option value="entregado">Entregado</option>
                                <option value="insumo_planta">Insumo planta de agua</option>
                                <option value="gasto_planta">Gastos de planda de agua</option>

                            </select>
                            <label>Ingrese cantidad</label>
                            <input class="form-control" id="cantidadSalida" name="cantidadSalida" type="number">
                            <label>Ingrese un comentario</label>
                            <textarea class="form-control" id="comentarioSalida" name="comentarioSalida" placeholder="" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <p>Total de salidas de este mes</p>
                            <h5 class="text-danger ">$ {{ number_format($salidas->total_salida) }}</h5>
                        </div>
                        <div class="form-group pull-right">
                            <button type="submit" class="btn btn-danger" onclick="confirmAlert()">Enviar</button>
                        </div>
                    </form>
                    </div>
                 </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header">
                        <h5>Presupuesto mensual</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                        <form method="POST" action="{{ route('finanzas.salida')}}">
                                @csrf
                            
                            <label>Ingrese cantidad</label>
                            <input class="form-control" id="cantidadPresupuesto" name="cantidadPresupuesto" type="number">
                            <label>Ingrese un comentario</label>
                            <textarea class="form-control" id="comentarioPresupuesto" name="comentarioPresupuesto" placeholder="" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <p>Total de presupuesto mensual</p>
                            <h5 class="text-danger ">$ {{ number_format($salidas->total_salida) }}</h5>
                        </div>
                        <div class="form-group pull-right">
                            <button type="submit" class="btn btn-success" onclick="confirmAlert()">Enviar</button>
                        </div>
                    </form>
                    </div>
                 </div>
            </div>
        </div>
    </div>
</div>


@endsection