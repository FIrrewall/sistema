<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informe extends Model
{
    use HasFactory;
    public function simbolos(){
        return $this->belongsToMany('App\Simbolo'); // Muchos a muchos
    }

    public function planos()
    {
        return $this->hasMany('App\Plano');
    }

    public function zonificacions()
    {
        return $this->hasMany('App\Zonificacion');
    }

    public function usuariosAlarmas()
    {
        return $this->hasMany('App\UsuariosAlarma');
    }

    public function trabajosRealizados()
    {
        return $this->hasMany('App\TrabajosRealizado');
    }

    public function numeros()
    {
        return $this->hasMany('App\Models\Numero', 'informe_id', 'id');
    }

    public function inventarioCctvs()
    {
        return $this->hasMany('App\Models\InventarioCctv', 'informe_id', 'id');
    }

    public function inventarioAlarmas()
    {
        return $this->hasMany('App\InventarioAlarma');
    }

    public function hdds()
    {
        return $this->hasMany('App\Models\Hdd', 'informe_id', 'id');
    }

    public function cctvs()
    {
        return $this->hasMany('App\Cctv');
    }
}
