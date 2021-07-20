<?php

namespace App\Services;

class ProveedoresService
{
public function add(string $codigo, string $nombre, ?string $descripcion)
{
    dd([$codigo,$nombre,$descripcion]);
}

}


?>