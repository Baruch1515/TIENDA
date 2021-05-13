<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    public function Categoria(){
        return $this->belongsTo('App\Models\categoria');
    }
    public function Tipo(){
        return $this->belongsTo('App\Models\tipo');
    }
    //completa las conversaciones WHould o Whouldn´t
    protected $fillable = ['nombre','descripcion','foto','id_categoria','id_tipo'];
}
