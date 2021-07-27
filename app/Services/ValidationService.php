<?php

namespace App\Services;
use Illuminate\Validation\ValidationException;

class ValidationService 
{
private const LONGITUD_COD = 6;

public function validarLargoCodigo(string $codigo){
if (strlen($codigo) !== self::LONGITUD_COD) {
    throw ValidationException::withMessages([
        'codigo' => 'El codigo debe tener una longitud de ' . self::LONGITUD_COD
    ]);
}
}
public function validarPrecio(float $precio){
    if($precio <= 0){
        throw ValidationException::withMessages([
            'precio' => 'El precio debe ser mayor o igual a 0'
        ]);   
    }
}
public function validarStock(int $stock){
    if($stock < 1){
        throw ValidationException::withMessages([
            'stock' => 'El stock debe ser mayor a 0'
        ]);   
    }  
}


}

