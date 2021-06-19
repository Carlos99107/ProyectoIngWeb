@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Usuario</h1>
@stop

@section('content')
<form action="/user/{{$user->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="" class="form-label">Nombre</label>
        <input id="name" name="name" type="text" class="form-control" value="{{$user->name}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Contraseña</label>
        <input id="password" name="password" type="password" class="form-control" value="{{$user->password}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Correo</label>
        <input id="email" name="email" type="text" class="form-control" value="{{$user->email}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Rol</label>
        <select name="id_rol" id="id_rol" class="block mt-1 w-full form-control" >
            @foreach ( $rol as $rolardos )
                <option value="{{$rolardos->id_rol}}">{{$rolardos->nombre}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Cédula</label>
        <input id="cedula" name="cedula" type="text" class="form-control" value="{{$user->cedula}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Teléfono</label>
        <input id="telefono" name="telefono" type="text" class="form-control" value="{{$user->telefono}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Dirección</label>
        <input id="direccion" name="direccion" type="text" class="form-control" value="{{$user->direccion}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Username</label>
        <input id="username" name="username" type="text" class="form-control" value="{{$user->username}}">
    </div>
    <a href="/user" class="btn btn-secondary" >Cancelar</a>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
