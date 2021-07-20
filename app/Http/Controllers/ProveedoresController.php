<?php

namespace App\Http\Controllers;

use App\Services\ProveedoresService;
use Illuminate\Http\Request;

class ProveedoresController extends Controller
{
    public function list()
    {
        return view('proveedores.list');
    }

    public function add()
    {
        return view('proveedores.add');
    }
    public function backAdd(Request $request,ProveedoresService $service)
    {
        $request->validate([
            'codigo' => 'required',
            'nombre' => 'required'
        ]);
        $service->add($request->input('codigo'),$request->input('nombre'),$request->input('descripcion'));


    }


   
}
