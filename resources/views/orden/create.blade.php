@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear Orden</h1>
@stop

@section('content')
<form action="/orden" method="POST">
    @csrf
    <div class="mb-3">
        <label for="" class="form-label">Persona a cargo</label>
        <select name="id_user" id="id_user" class="block mt-1 w-full form-control" tabindex="1">
            @foreach ( $user as $usuarios )
                <option value="{{$usuarios->id}}">{{$usuarios->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Cliente</label>
        <select name="id_cliente" id="id_cliente" class="block mt-1 w-full form-control" tabindex="2">
            @foreach ($cliente as $clientes)
                <option value="{{$clientes->id_cliente}}">{{$clientes->nombre}} {{$clientes->apellido}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Menú</label>
        <select name="id_plato" id="id_plato" class="block mt-1 w-full form-control" tabindex="3">
            @foreach ( $plato as $platardos )
                <option value="{{$platardos->id_plato}}">{{$platardos->nombre}} | ${{$platardos->precio}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Numero de Orden</label>
        <input id="numero_orden" name="numero_orden" type="number" class="form-control" tabindex="4" required>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Cantidad</label>
        <input id="cantidad" name="cantidad" type="number" class="form-control" tabindex="5" required>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Tipo de Pago</label>
        <select name="tipo_pago" id="tipo_pago" class="block mt-1 w-full form-control" tabindex="6">
            <option value="Efectivo">Efectivo</option>
            <option value="Tarjeta">Tarjeta</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Estado</label>
        <select name="estado" id="estado" class="block mt-1 w-full form-control" tabindex="7">
            <option value="Pendiente">Pendiente</option>
            <option value="Proceso">Proceso</option>
            <option value="Finalizado">Finalizado</option>
        </select>
    </div>
    <a href="/orden" class="btn btn-secondary" tabindex="8">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="9">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
