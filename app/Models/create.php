<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class create extends Model
{
    public function categoria(){
        return $this->belongsTo('App\Models\categoria');
    }
    public function tipo(){
        return $this->belongsTo('App\Models\tipo');
    }
}
