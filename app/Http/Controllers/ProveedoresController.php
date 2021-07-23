<?php

namespace App\Http\Controllers;

use App\Services\ProveedoresService;
use App\Repository\ProveedoresRepository;
use Illuminate\Http\Request;

class ProveedoresController extends Controller
{
    public function index(ProveedoresRepository $repository)
    {
        return view('proveedores.index', ['proveedores' => $repository->all()]);
    }

    public function add()
    {
        return view('proveedores.add');
    }

    public function backAdd(Request $request, ProveedoresService $service)
    {
        $this->validarRequest($request);
        $request->validate(['codigo'=> 'unique:proveedores,codigo']);
        $service->add($request->input('codigo'), $request->input('nombre'), $request->input('descripcion'));

        return view('exito_new');
    }

    public function edit(string $id, ProveedoresRepository $repository)
    {
        return view('proveedores.edit', ['proveedor' => $repository->findOrFail($id)]);
    }

    public function backEdit(string $id,Request $request, ProveedoresService $service)
    {
        $this->validarRequest($request);
        $service->edit($id,$request->input('codigo'), $request->input('nombre'), $request->input('descripcion'));

        return view('exito_edit');
    }


    public function delete($id,ProveedoresRepository $repository)
    {

         $repository->delete($id);
         return ['status' => true,'msg' =>'Proveedor Eliminado exitosamente'];
    }

    private function validarRequest(Request $request)
    {
        $request->validate([
            'codigo' => 'required',
            'nombre' => 'required'
        ]);
    }
}
