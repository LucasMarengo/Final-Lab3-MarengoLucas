@extends('index')

@section('body')
<h3 class="mt-3">Agregar Proveedor</h3>
<hr>
    @include('error')

    <form class="row g-3 col-6" action="{{ route('ProveedoresController@backAdd') }}" method="post">
        @csrf
        <div class="col-md-6">
            <label for="codigo" class="form-label">Codigo*</label>
            <input type="text" class="form-control" id="codigo" name="codigo" maxlength="6" minlength="6" required>
        </div>
        <div class="col-md-6">
            <label for="nombre" class="form-label">Nombre*</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
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
