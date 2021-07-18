<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//TODO: el nombre del archivo esta en miniscula
class Empresa extends Model
{
    protected $table = 'empresa';
    public $timestamps = false;
}
