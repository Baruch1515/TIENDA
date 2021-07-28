<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bodega extends Model
{
    use HasFactory;


    public function productos() 
    {
      return $this->belongsToMany(Producto::class, 'productos_bodega', 'id_bodega', 'id_producto')->withPivot(['stock']);
    }
    /*
    public function Productos(){
    return $this->belongsToMany(productos_bodega::class);
}
*/
    
}
