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


}

