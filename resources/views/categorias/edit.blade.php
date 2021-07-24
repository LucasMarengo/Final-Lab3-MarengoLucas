@extends('index')

@section('body')
<h3 class="mt-3">Editar Categoria</h3>
<hr>
    @include('error')
    <form class="row g-3 col-6" action="{{ route('CategoriasController@backEdit',['id' => $categoria->getId()]) }}" method="post">
        @csrf
        <div class="col-md-6">
            <label for="nombre" class="form-label">Nombre*</label>
            <input type="text" class="form-control" value="{{ $categoria->getNombre() }}" id="nombre" name="nombre" required>
        </div>
        <div class="col-12">
            <label for="descripcion" class="form-label">Descripcion</label>
            <textarea type="text" class="form-control" id="descripcion" name="descripcion">{{ $categoria->getDescripcion() }}</textarea>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Editar</button>
        </div>

    </form>
@endsection
