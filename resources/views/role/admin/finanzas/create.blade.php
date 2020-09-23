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
                            <h5 class="text-success">$ 22,000.00</h5>
                        </div>
                        <div class="form-group pull-right">
                            <button class="btn btn-success">Enviar</button>
                        </div>
                    </div>
                 </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header">
                        <h5>Salidas de CENEAE</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Seleccionar concepto</label>
                            <select class="form-control" id="conceptoIngreso" name="conceptoIngreso">
                                <option value="0">Seleccionar</option>
                                <option value="colegiatura">Nómina</option>
                                <option value="cuotas">Eventos</option>
                                <option value="desayunos">Varios</option>
                                <option value="internet">Mantenimiento</option>
                                <option value="local">Utilidades</option>
                                <option value="Taxi">Salarios</option>
                                <option value="presupuesto">Corriente eléctrica</option>
                                <option value="plantaAgua">Entregado</option>
                                <option value="devolPrestamo">Insumo planta de agua</option>
                                <option value="devolPrestamo">Gastos de planda de agua</option>

                            </select>
                            <label>Ingrese cantidad</label>
                            <input class="form-control" id="cantidadIngreso" name="cantidadIngreso" type="number">
                            <label>Ingrese un comentario</label>
                            <textarea class="form-control" id="comentarioIngreso" name="comentarioIngreso" placeholder="" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <p>Total de salidas de este mes</p>
                            <h5 class="text-danger">$ 8,000.00</h5>
                        </div>
                        <div class="form-group pull-right">
                            <button class="btn btn-danger" onclick="confirmAlert()">Enviar</button>
                        </div>
                    </div>
                 </div>
            </div>
        </div>
    </div>
</div>


@endsection