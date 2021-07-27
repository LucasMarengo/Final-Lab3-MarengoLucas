<?php

namespace App\Http\Controllers;

use App\Services\ProductosService;
use App\Repository\ProductosRepository;
use App\Repository\ProveedoresRepository;
use App\Repository\CategoriasRepository;

use Illuminate\Http\Request;

class ProductosController extends Controller
{
    public function index(ProductosRepository $repository)
    {
        return view('productos.index', ['productos' => $repository->all()]);
    }

    public function add(ProveedoresRepository $proveedores_repository, CategoriasRepository $categorias_repository)
    {
        return view('productos.add', ['proveedores' => $proveedores_repository->all(), 'categorias' => $categorias_repository->all()]);
    }

    public function backAdd(Request $request, ProductosService $service)
    {
        $this->validarRequest($request);
        $request->validate(['codigo' => 'unique:productos,codigo']);
        $service->add(
            $request->input('codigo'),
            $request->input('nombre'),
            $request->input('descripcion'),
            $request->input('precio'),
            $request->input('proveedor_id'),
            $request->input('categoria_id'),
        );
        return view('exito_new');
    }

    public function edit(string $id, ProductosRepository $repository, ProveedoresRepository $proveedores_repository, CategoriasRepository $categorias_repository)
    {
        return view('productos.edit', ['producto' => $repository->findOrFail($id), 'proveedores' => $proveedores_repository->all(), 'categorias' => $categorias_repository->all()]);
    }

    public function backEdit(string $id, Request $request, ProductosService $service)
    {

        $this->validarRequest($request);
        $service->edit(
            $id,
            $request->input('codigo'),
            $request->input('nombre'),
            $request->input('descripcion'),
            $request->input('precio'),
            $request->input('proveedor_id'),
            $request->input('categoria_id'),
        );

        return view('exito_edit');
    }


    public function addStock(ProductosRepository $repository)
    {
        return view('productos.alta', ['productos' => $repository->all()]);
    }
    public function backStock(Request $request, ProductosService $service)
    {
        $request->validate([
            'id' => 'required|numeric',
            'stock' => 'required|numeric'
        ]);
        $service->addStock(
            $request->input('id'),
            $request->input('stock')
        );

        return view('exito_alta');
    }

    public function viewStock(ProductosRepository $repository)
    {
        return view('productos.index', ['productos' => $repository->viewStock()]);
    }
    public function delete($id, ProductosRepository $repository)
    {

        $repository->delete($id);
        return ['status' => true, 'msg' => 'Producto Eliminado exitosamente'];
    }

    public function productSearch(Request $request, ProductosRepository $repository)
    {
        return view('productos.index', ['productos' => $repository->search($request->input('search'))]);
    }



    private function validarRequest(Request $request)
    {
        $request->validate([
            'codigo' => 'required',
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required|numeric',
            'proveedor_id' => 'required|numeric',
            'categoria_id' => 'required|numeric'
        ]);
    }
}
