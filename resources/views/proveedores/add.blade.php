@extends('index')

@section('body')
@yield('error')
    <form action="{{ route('ProveedoresController@backAdd') }}" method="post">
    @csrf
        <label for="">Codigo*</label>
        <input type="text" name="codigo" maxlength="6" minlength="6" required>
        <br>
        <label for="">Nombre*</label>
        <input type="text" name="nombre" required>
        <br>
        <label for="">Descripcion</label>
        <input type="text" name="descripcion">
        <br>
        <button type="submit">Agregar</button>
    </form>
@endsection
