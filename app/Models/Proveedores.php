<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedores extends Model
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
    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }
    public function setCodigo(string $codigo)
    {
        $this->codigo = $codigo;
    }
    public function setNombre(string $nombre)
    {
        $this->nombre = $nombre;
    }
    public function setDescripcion(?string $descripcion)
    {
        $this->descripcion = $descripcion;
    }

}
