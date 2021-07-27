<?php

namespace App\Repository;

use App\Models\Productos;
use Illuminate\Support\Facades\DB;

class ProductosRepository
{
  public function save(Productos $productos)
  {
    $productos->save();
  }
  public function all()
  {
    return DB::table('productos')
      ->select('productos.*', 'proveedores.nombre as nombre_proveedor', 'categorias.nombre as nombre_categoria')
      ->leftJoin('proveedores', 'productos.proveedor_id', '=', 'proveedores.id')
      ->leftJoin('categorias', 'productos.categoria_id', '=', 'categorias.id')
      ->get();
  }
  public function search($search)
  {
    return DB::table('productos')
      ->select('productos.*', 'proveedores.nombre as nombre_proveedor', 'categorias.nombre as nombre_categoria')
      ->leftJoin('proveedores', 'productos.proveedor_id', '=', 'proveedores.id')
      ->leftJoin('categorias', 'productos.categoria_id', '=', 'categorias.id')
      ->where('productos.nombre', 'LIKE', '%' . $search . '%')
      ->orWhere('productos.descripcion', 'LIKE', '%' . $search . '%')
      ->get();
  }
  public function viewStock()
  {
    return DB::table('productos')
      ->select('productos.*', 'proveedores.nombre as nombre_proveedor', 'categorias.nombre as nombre_categoria')
      ->leftJoin('proveedores', 'productos.proveedor_id', '=', 'proveedores.id')
      ->leftJoin('categorias', 'productos.categoria_id', '=', 'categorias.id')
      ->where('stock', '<=' ,5)
      ->orderBy('stock', 'ASC')
      ->get();
  }
  public function addStock($id, $stock)
  {
    return DB::table('productos')
      ->where('id', $id)
      ->update(['stock' => $stock]);
  }


  public function findOrFail($id)
  {
    return Productos::findOrFail($id);
  }
  public function delete($id)
  {
    $productos = Productos::findOrFail($id);
    $productos->delete();
  }
}
