
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Factura</h1>
@stop

@section('content')
<a href="factura/create" class="btn btn-primary mb-3">Crear</a>

<table id="facturas" class="table table-striped shadow-lg mt-4">

<thead class="bg-primary text-white">
    <tr>
        <th scope="col">Personal</th>
        <th scope="col">Cliente</th>
        <th scope="col">Cédula</th>
        <th scope="col">Menú</th>
        <th scope="col"># Orden</th>
        <th scope="col">Cant.</th>
        <th scope="col">Fecha</th>
        <th scope="col">Subtotal</th>
        <th scope="col">IVA</th>
        <th scope="col">Total</th>
       <th scope="col">Acciones</th>
    </tr>
</thead>
<tbody>
    @foreach ($facturas as $factura)
    <tr>
        <td>{{$factura->NameUser}}</td>
        <td>{{$factura->NameCliente}} {{$factura->apellido}}</td>
        <td>{{$factura->cedula}}</td>
        <td>{{$factura->PlatoName}} ${{$factura->precio}}</td>
        <td>#{{$factura->numero_orden}}</td>
        <td>{{$factura->cantidad}}</td>
        <td>{{$factura->fecha}}</td>
        <td>${{$factura->subtotal}}</td>
        <td>${{$factura->iva}}</td>
        <td>${{$factura->total}}</td>
        <td>
            <form action="{{ route ('factura.destroy',$factura->id_factura)}}" method="POST">
            <!--<a href="/factura/{{$factura->id_factura}}/edit" class="btn btn-info">Editar</a>-->
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
    $('#facturas').DataTable({
        "lenghtMenu":[[5,10,50,-1],[5,10,50,"All"]]
    });
} );
</script>

@stop
