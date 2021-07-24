<?php

namespace App\Http\Controllers;

use App\Services\CategoriasService;
use App\Repository\CategoriasRepository;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    public function index(CategoriasRepository $repository)
    {
        return view('categorias.index', ['categorias' => $repository->all()]);
    }

    public function add()
    {
        return view('categorias.add');
    }

    public function backAdd(Request $request, CategoriasService $service)
    {
        $this->validarRequest($request);
        $service->add($request->input('nombre'), $request->input('descripcion'));

        return view('exito_new');
    }

    public function edit(string $id, CategoriasRepository $repository)
    {
        return view('categorias.edit', ['categoria' => $repository->findOrFail($id)]);
    }

    public function backEdit(string $id,Request $request, CategoriasService $service)
    {
        $this->validarRequest($request);
        $service->edit($id,$request->input('nombre'), $request->input('descripcion'));

        return view('exito_edit');
    }


    public function delete($id,CategoriasRepository $repository)
    {
         $repository->delete($id);
         return ['status' => true,'msg' =>'Categoria Eliminado exitosamente'];
    }

    private function validarRequest(Request $request)
    {
        $request->validate([
            'nombre' => 'required'
        ]);
    }
}
