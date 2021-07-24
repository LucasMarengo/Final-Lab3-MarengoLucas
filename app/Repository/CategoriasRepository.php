<?php

namespace App\Repository;

use App\Models\Categorias;

class CategoriasRepository
{
    public function save(Categorias $categorias)
    {
        $categorias->save();
    }
    public function all()
    {
        return Categorias::all();
    }
    public function findOrFail($id)
    {
      return Categorias::findOrFail($id);
    }
    public function delete($id)
    {
      $categorias = Categorias::findOrFail($id);
      $categorias->delete();
    }
}
