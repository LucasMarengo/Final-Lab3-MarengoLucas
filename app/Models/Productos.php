<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;

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
public function getStock(): ?int
{
    return $this->stock;
}
public function getProveedor(): string
{
    return $this->proveedor;
}
public function getCategoria(): int
{
    return $this->categoria;
}


}
