<?php

namespace App\Services;

use App\Models\Categorias;
use App\Repository\CategoriasRepository;
use App\Services\ValidationService;

class CategoriasService extends ValidationService
{
    private $categoriasRepository;

    private function setAttr(Categorias $categoria, string $nombre, ?string $descripcion)
    {
        $categoria->setNombre($nombre);
        $categoria->setDescripcion($descripcion);
    }

    public function __construct(CategoriasRepository $categoriasRepository)
    {
        $this->categoriasRepository = $categoriasRepository;
    }

    public function add(string $nombre, ?string $descripcion)
    {

        $categoria = new Categorias();
        $this->setAttr($categoria, $nombre, $descripcion);
        $this->categoriasRepository->save($categoria);
    }

    public function edit(string $id, string $nombre, ?string $descripcion)
    {
        $categoria = $this->categoriasRepository->findOrFail($id);
        $this->setAttr($categoria, $nombre, $descripcion);
        $this->categoriasRepository->save($categoria);
    }
}
