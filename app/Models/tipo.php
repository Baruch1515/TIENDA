<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    use HasFactory;
    public function Producto(){
        return $this->belongsTo('App\Models\Producto');
    }
    protected $table = 'tipo';

}
