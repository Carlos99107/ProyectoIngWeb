@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear Factura</h1>
@stop

@section('content')
<form action="/factura" method="POST">
    @csrf
    <div class="mb-3">
        <label for="" class="form-label">Numero de Orden</label>
        <select name="id_orden" id="id_orden" class="block mt-1 w-full form-control" tabindex="3">
            @foreach ($orden as $ordenes)
                <option value="{{$ordenes->id_orden}}">#{{$ordenes->numero_orden}}</option>
            @endforeach
        </select>
    </div>
    <a href="/factura" class="btn btn-secondary" tabindex="8">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="9">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
