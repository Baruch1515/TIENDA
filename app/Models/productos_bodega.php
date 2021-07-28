<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productos_bodega extends Model
{

    public function bodegas() 
    {
      return $this->belongsToMany(Bodega::class, 'productos_bodegas');
    }
    use HasFactory;
    protected $fillable = ['stock'];
    protected $guarded = ['stock'];
  
}



 





       



