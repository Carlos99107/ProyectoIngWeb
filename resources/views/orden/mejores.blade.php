@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Mejores Platos</h1>
@stop

@section('content')
<form action="/filterplate" method="POST">
    @csrf
    <div class="form-group">
        <div class="input-group">
            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
            <div class="form-group">
            <label class="control-label" for="date">Fecha Inicial</label>
            <input class="form-control" id="fechaInicial" name="fechaInicial"  placeholder="AA/MM/DD" value="" type="date"/>
        </div>
            </div>
        <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
            <div class="form-group">
            <label class="control-label" for="date">Fecha Final</label>
            <input class="form-control" id="fechaFinal" name="fechaFinal" placeholder="AA/MM/DD" value="" type="date"/>
        </div>
            </div>
        </div>
    </div>
    <span class="input-group-btn"><button type="submit" class="btn btn-primary">Comparar</button></span>
    <table id="platos" class="table table-striped shadow-lg mt-4">

    <thead class="bg-primary text-white">
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Cantidad</th>
        </tr>
    </thead>
    <tbody>

        <tr>
            @if (isset($nombreplato->nombre))
                <td>{{$nombreplato->nombre}}</td>
                <td>{{$nombreplato->total_cantidad}}</td>
            @endif

        </tr>

    </tbody>
    </table>
</form>
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
    $('#').DataTable({
        "lenghtMenu":[[5,10,50,-1],[5,10,50,"All"]]
    });
} );
</script>

@stop
