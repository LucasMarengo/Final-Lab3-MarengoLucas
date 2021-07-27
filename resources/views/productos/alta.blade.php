@extends('index')

@section('body')
    <h3 class="mt-3"></h3>
    <hr>
    @include('error')
    <form class="row g-3 col-6" action="{{ route('ProductosController@backStock') }}" method="post">
        @csrf
        <div class="col-md-4">
            <label for="id" class="form-label">Producto*</label>
            <select name="id" class="form-control" id="id">
                <option>Seleccionar Producto</option>
                @foreach ($productos as $producto)
                    <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label for="stock" class="form-label">Stock*</label>
            <input type="number" class="form-control" id="stock" name="stock" required>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Dar de Alta</button>
        </div>
    </form>
@endsection
