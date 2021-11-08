<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Simbolo extends Model
{
    use HasFactory;

    public function informes()
    {
        return $this->belongsToMany('App\Informe');
    }
}
