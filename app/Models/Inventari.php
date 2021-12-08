<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventari extends Model
{
    use HasFactory;
    
    public function entradas()
    {
        return $this->hasMany('App\Entrada');
    }
    public function existentes()
    {
        return $this->hasMany('App\Existente');
    }
    public function salidas()
    {
        return $this->hasMany('App\Salida');
    }
}
