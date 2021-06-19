@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Clientes</h1>
@stop

@section('content')
<a href="cliente/create" class="btn btn-primary mb-3">Crear</a>

<table id="clientes" class="table table-striped shadow-lg mt-4">

<thead class="bg-primary text-white">
    <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Apellido</th>
        <th scope="col">Dirección</th>
        <th scope="col">Cédula</th>
        <th scope="col">Correo</th>
        <th scope="col">Teléfono</th>
        <th scope="col">Acciones</th>
    </tr>
</thead>
<tbody>
    @foreach ($clientes as $cliente)
    <tr>
        <td>{{$cliente->nombre}}</td>
        <td>{{$cliente->apellido}}</td>
        <td>{{$cliente->direccion}}</td>
        <td>{{$cliente->cedula}}</td>
        <td>{{$cliente->correo}}</td>
        <td>{{$cliente->telefono}}</td>
        <td>
            <form action="{{ route ('cliente.destroy',$cliente->id_cliente)}}" method="POST">
            <a href="/cliente/{{$cliente->id_cliente}}/edit" class="btn btn-info">Editar</a>
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
    $('#clientes').DataTable({
        "lenghtMenu":[[5,10,50,-1],[5,10,50,"All"]]
    });
} );
</script>

@stop
