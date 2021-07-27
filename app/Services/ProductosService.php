<?php

namespace App\Services;

use App\Models\Productos;
use App\Repository\ProductosRepository;
use App\Services\ValidationService;

class ProductosService extends ValidationService
{
    private $productosRepository;

    private function setAttr(Productos $producto,string $codigo, string $nombre, string $descripcion, float $precio, int $proveedor_id,int $categoria_id)
    {
        $producto->setCodigo($codigo);
        $producto->setNombre($nombre);
        $producto->setDescripcion($descripcion);
        $producto->setPrecio($precio);
        $producto->setProveedor($proveedor_id);
        $producto->setCategoria($categoria_id);
        $producto->setStock(0);
    }

    public function __construct(ProductosRepository $productosRepository)
    {
        $this->productosRepository = $productosRepository;
    }

    public function add(string $codigo, string $nombre, string $descripcion, float $precio, int $proveedor_id,int $categoria_id)
    {
        $this->validarLargoCodigo($codigo);
        $producto = new Productos();
        $this->setAttr($producto,$codigo, $nombre, $descripcion,$precio,$proveedor_id,$categoria_id);
        $this->productosRepository->save($producto);
    }

    public function edit(int $id,string $codigo, string $nombre, string $descripcion, float $precio, int $proveedor_id,int $categoria_id)
    {
        $this->validarLargoCodigo($codigo);
        $producto = $this->productosRepository->findOrFail($id);
        $this->setAttr($producto,$codigo, $nombre, $descripcion,$precio,$proveedor_id,$categoria_id);
        $this->productosRepository->save($producto);
    }
    public function addStock(int $id,int $stock)
    {

       $producto = $this->productosRepository->findOrFail($id);
        $this->validarStock($stock);
        $stock = $stock + $producto->getStock();
        $this->productosRepository->addStock($id,$stock);
    }

}
