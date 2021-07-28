<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Producto extends Model
{
    public function Categoria()
    {
        return $this->belongsTo('App\Models\categoria');
    }
    public function Tipo()
    {
        return $this->belongsTo('App\Models\tipo');
    }
    protected $fillable = ['nombre', 'descripcion', 'foto', 'id_categoria', 'id_tipo'];
    public function bodegas() 
    {
      return $this->belongsToMany(Bodega::class, 'productos_bodegas', 'id_producto', 'id_bodega')->withPivot(['stock']);
    }
   
}
