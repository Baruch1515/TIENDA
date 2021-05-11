<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;


class categoria extends Model


{
    public function Producto(){
        return $this->belongsTo('App\Models\Producto');
    }
  
}
