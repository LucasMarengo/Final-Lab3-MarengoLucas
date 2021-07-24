@extends('index')

@section('body')
    <div class="">
        <h3 class="mt-3">Listado de proveedores <a class="btn btn-success " style="float: right"
                href="{{ route('ProveedoresController@add') }}">Agregar Proveedor</a></h3>
    </div>
    <hr>
    <table id="datatablesSimple">
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Ajustes</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($proveedores as $proveedor)
                <tr id="row-{{ $proveedor->getId() }}">
                    <td>{{ $proveedor->getCodigo() }}</td>
                    <td>{{ $proveedor->getNombre() }}</td>
                    <td>{{ $proveedor->getDescripcion() }}</td>
                    <td style="width: 180px">
                        <a href="{{ route('ProveedoresController@edit', ['id' => $proveedor->getId()]) }}"
                            class="btn btn-primary"> Editar </a>
                        <a class="btn btn-danger" onclick="deleteItem('{{ $proveedor->getId() }}','proveedores', '{{ $proveedor->getNombre() }}')"> Eliminar </a>
                    </td>
                </tr>
            @endforeach
        </tbody>$
    </table>
@endsection
