<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;
    public function getId()
    {
        return $this->id;
    }
    public function getCodigo(): string
    {
        return $this->codigo;
    }
    public function getNombre(): string
    {
        return $this->nombre;
    }
    public function getDescripcion(): string
    {
        return $this->descripcion;
    }
    public function getPrecio(): float
    {
        return $this->precio;
    }
    public function getStock(): ?int
    {
        return $this->stock;
    }
    public function getProveedor(): int
    {
        return $this->proveedor_id;
    }
    public function getCategoria(): int
    {
        return $this->categoria_id;
    }
    public function setCodigo(string $codigo)
    {
        $this->codigo = $codigo;
    }
    public function setNombre(string $nombre)
    {
        $this->nombre = $nombre;
    }
    public function setDescripcion(string $descripcion)
    {
        $this->descripcion = $descripcion;
    }
    public function setPrecio(float $precio)
    {
        $this->precio = $precio;
    }
    public function setStock(?int $stock)
    {
        $this->stock = $stock;
    }
    public function setProveedor(int $proveedor_id)
    {
        $this->proveedor_id = $proveedor_id;
    }
    public function setCategoria(int $categoria_id)
    {
        $this->categoria_id = $categoria_id;
    }

    public function proveedores()
    {
        return $this->hasMany(Proveedores::class,'proveedor_id');
    }
    public function categorias()
    {
        return $this->hasMany(Categorias::class, 'categoria_id');
    }

}
