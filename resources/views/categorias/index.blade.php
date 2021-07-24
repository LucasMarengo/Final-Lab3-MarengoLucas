@extends('index')

@section('body')
    <div class="">
        <h3 class="mt-3">Listado de Categorias <a class="btn btn-success " style="float: right"
                href="{{ route('CategoriasController@add') }}">Agregar Categoria</a></h3>
    </div>
    <hr>
    <table id="datatablesSimple">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Ajustes</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categorias as $categoria)
                <tr id="row-{{ $categoria->getId() }}">
                    <td>{{ $categoria->getNombre() }}</td>
                    <td>{{ $categoria->getDescripcion() }}</td>
                    <td style="width: 180px">
                        <a href="{{ route('CategoriasController@edit', ['id' => $categoria->getId()]) }}"
                            class="btn btn-primary"> Editar </a>
                        <a class="btn btn-danger"
                            onclick="deleteItem('{{ $categoria->getId() }}','categorias','{{ $categoria->getNombre() }}')">
                            Eliminar </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
