<?php

namespace App\Repository;

use App\Models\Proveedores;

class ProveedoresRepository
{
    public function save(Proveedores $proveedor)
    {
        $proveedor->save();
    }
    public function all()
    {
        return Proveedores::all();
    }
    public function findOrFail($id)
    {
      return Proveedores::findOrFail($id);
    }
    public function delete($id)
    {
      $proveedor = Proveedores::findOrFail($id);
      $proveedor->delete();
    }
}
