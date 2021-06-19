@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Menú</h1>
@stop

@section('content')
<a href="plato/create" class="btn btn-primary mb-3">Crear</a>

<table id="platos" class="table table-striped shadow-lg mt-4">

<thead class="bg-primary text-white">
    <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Descripción</th>
        <th scope="col">Precio</th>
        <th scope="col">Acciones</th>
    </tr>
</thead>
<tbody>
    @foreach ($platos as $plato)
    <tr>
        <td>{{$plato->nombre}}</td>
        <td>{{$plato->descripcion}}</td>
        <td>{{$plato->precio}}</td>
        <td>
            <form action="{{ route ('plato.destroy',$plato->id_plato)}}" method="POST">
            <a href="/plato/{{$plato->id_plato}}/edit" class="btn btn-info">Editar</a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Borrar</button>
            </form>
        </td>
    </tr>
    @endforeach
</tbody>
</table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link  href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@stop

@section('js')

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
<script>
$(document).ready(function() {
    $('#platos').DataTable({
        "lenghtMenu":[[5,10,50,-1],[5,10,50,"All"]]
    });
} );
</script>

@stop
