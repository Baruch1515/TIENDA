<?php

namespace App\Models;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Model;

//TODO: el nombre del archivo esta en miniscula
class Categoria extends Model
{
    public function Producto()
    {
        return $this->belongsTo('App\Models\Producto');
    }

}
