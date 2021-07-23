<?php

namespace App\Services;

use App\Models\Proveedores;
use App\Repository\ProveedoresRepository;
use App\Services\ValidationService;

class ProveedoresService extends ValidationService
{
    private $proveedoresRepository;

    private function setAttr(Proveedores $proveedor,string $codigo, string $nombre, ?string $descripcion)
    {
        $proveedor->setCodigo($codigo);
        $proveedor->setNombre($nombre);
        $proveedor->setDescripcion($descripcion);
    }

    public function __construct(ProveedoresRepository $proveedoresRepository)
    {
        $this->proveedoresRepository = $proveedoresRepository;
    }

    public function add(string $codigo, string $nombre, ?string $descripcion)
    {
        $this->validarLargoCodigo($codigo);
        $proveedor = new Proveedores();
        $this->setAttr($proveedor,$codigo, $nombre, $descripcion);
        $this->proveedoresRepository->save($proveedor);
    }

    public function edit(string $id,string $codigo, string $nombre, ?string $descripcion)
    {
        $this->validarLargoCodigo($codigo);
        $proveedor = $this->proveedoresRepository->findOrFail($id);
        $this->setAttr($proveedor,$codigo, $nombre, $descripcion);
        $this->proveedoresRepository->save($proveedor);
    }

}
