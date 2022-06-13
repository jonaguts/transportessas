<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;
    protected $fillable = ['vehiculos_placa', 'vehiculos_modelo', 'vehiculos_color', 'conductors_id'];
}
