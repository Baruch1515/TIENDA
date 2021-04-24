<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\create;


class categoria extends Model
{
    public function creates(){
        return $this->belongsTo('App\Models\create');
    }
}
