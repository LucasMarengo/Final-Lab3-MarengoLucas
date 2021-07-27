@extends('index')

@section('body')
<h3 class="mt-3">Agregar Productos</h3>
<hr>
    @include('error')
    <form class="row g-3 col-6" action="{{ route('ProductosController@backAdd') }}" method="post">
        @csrf
        <div class="col-md-4">
            <label for="codigo" class="form-label">Codigo*</label>
            <input type="text" class="form-control" id="codigo" name="codigo" maxlength="6" minlength="6" required>
        </div>
        <div class="col-md-6">
            <label for="nombre" class="form-label">Nombre*</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="col-md-2">
            <label for="precio" class="form-label">Precio*</label>
            <input type="text" class="form-control" id="precio" name="precio" required>
        </div>
        <div class="col-md-6">
            <label for="proveedor" class="form-label">Proveedor*</label>
            <select class="form-control" id="proveedor_id" name="proveedor_id" required>
                @foreach($proveedores as $proveedor)
                <option value="{{ $proveedor->getId() }}"> {{ $proveedor->getNombre() }} </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label for="categoria" class="form-label">Categoria*</label>
            <select class="form-control" id="categoria_id" name="categoria_id" required>
                @foreach($categorias as $categoria)
                <option value="{{ $categoria->getId() }}"> {{ $categoria->getNombre() }} </option>
                @endforeach
            </select>
        </div>
        <div class="col-12">
            <label for="descripcion" class="form-label">Descripcion</label>
            <textarea type="text" class="form-control" id="descripcion" name="descripcion"></textarea>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Agregar</button>
        </div>
    </form>
@endsection
