@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Orden</h1>
@stop

@section('content')
<a href="orden/create" class="btn btn-primary mb-3">Crear</a>

<table id="ordenes" class="table table-striped shadow-lg mt-4">

<thead class="bg-primary text-white">
    <tr>
        <th scope="col">Persona a cargo</th>
        <th scope="col">Cliente</th>
        <th scope="col">Menú</th>
        <th scope="col"># Orden</th>
        <th scope="col">Cant.</th>
        <th scope="col">Pago</th>
        <th scope="col">Estado</th>
        <th scope="col">Fecha</th>
        <th scope="col">Acciones</th>
    </tr>
</thead>
<tbody>
    @foreach ($ordenes as $orden)
    <tr>
        <td>{{$orden->NameUser}}</td>
        <td>{{$orden->NameCliente}} {{$orden->apellido}}</td>
        <td>{{$orden->NamePlato}} | ${{$orden->precio}}</td>
        <td>{{$orden->numero_orden}}</td>
        <td>{{$orden->cantidad}}</td>
        <td>{{$orden->tipo_pago}}</td>
        <td>{{$orden->estado}}</td>
        <td>{{$orden->fecha}}</td>
        <td>
            <form action="{{ route ('orden.destroy',$orden->id_orden)}}" method="POST">
            <a href="/orden/{{$orden->id_orden}}/edit" class="btn btn-info">Editar</a>
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
    $('#ordenes').DataTable({
        "lenghtMenu":[[5,10,50,-1],[5,10,50,"All"]]
    });
} );
</script>

@stop
