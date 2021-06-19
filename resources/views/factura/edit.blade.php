@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Factura</h1>
@stop

@section('content')
<form action="/orden/{{$orden->id_orden}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="" class="form-label">Persona a cargo</label>
        <select name="id_user" id="id_user" class="block mt-1 w-full form-control" >
            @foreach ( $user as $usuarios )
                @if ($usuarios->id == $orden->id_user)
                    <option selected value="{{$usuarios->id}}">{{$usuarios->name}}</option>
                @else
                    <option value="{{$usuarios->id}}">{{$usuarios->name}}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Cliente</label>
        <select name="id_cliente" id="id_cliente" class="block mt-1 w-full form-control" >
            @foreach ( $cliente as $clientes )
                <option value="{{$clientes->id_cliente}}">{{$clientes->nombre}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Menú</label>
        <select name="id_plato" id="id_plato" class="block mt-1 w-full form-control" >
            @foreach ( $plato as $platardos )
                <option value="{{$platardos->id_plato}}">{{$platardos->nombre}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Número de orden</label>
        <input id="numero_orden" name="numero_orden" type="text" class="form-control" value="{{$orden->numero_orden}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Cantidad</label>
        <input id="cantidad" name="cantidad" type="number" class="form-control" value="{{$orden->cantidad}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Tipo de pago</label>
        <select name="tipo_pago" id="tipo_pago" class="block mt-1 w-full form-control" value="{{$orden->tipo_pago}}">
            <option value="Efectivo">Efectivo</option>
            <option value="Tarjeta">Tarjeta</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Estado</label>
        <select name="estado" id="estado" class="block mt-1 w-full form-control" value="{{$orden->estado}}">
            <option value="Pendiente">Pendiente</option>
            <option value="Proceso">Proceso</option>
            <option value="Finalizado">Finalizado</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Fecha</label>
        <input id="fecha" name="fecha" type="date" class="form-control" value="{{$orden->fecha}}">
    </div>
    <a href="/factura" class="btn btn-secondary" >Cancelar</a>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
