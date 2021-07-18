<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Tipo extends Model
{
    public function Producto()
    {
        return $this->belongsTo('App\Models\Producto');
    }
    protected $table = 'tipo';

}
