@extends('index')

@section('body')
    <div class="">
        <h3 class="mt-3">Listado de Productos <a class="btn btn-success" style="float: right"
                href="{{ route('ProductosController@add') }}">Agregar Producto</a></h3>
    </div>
    <form action="{{ route('ProductosController@productSearch') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control pull-left">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-info pull-right"><i class="fa fa-search"></i> Buscar</button>
            </div>
        </div>
    </form>
    <hr>
    <table class="table">
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Proveedor</th>
                <th>Categorias</th>
                <th>Descripción</th>
                <th>Ajustes</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($productos as $producto)

                <tr id="row-{{ $producto->id }}">
                    <td>{{ $producto->codigo }}</td>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->precio }}</td>
                    <td>{{ $producto->stock }}</td>
                    <td>{{ $producto->nombre_proveedor }}</td>
                    <td>{{ $producto->nombre_categoria }}</td>
                    <td>{{ $producto->descripcion }}</td>
                    <td style="width: 180px">
                        <a href="{{ route('ProductosController@edit', ['id' => $producto->id]) }}"
                            class="btn btn-primary"> Editar </a>
                        <a class="btn btn-danger"
                            onclick="deleteItem('{{ $producto->id }}','productos', '{{ $producto->nombre }}')">
                            Eliminar </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
