<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conductor extends Model
{
    use HasFactory;
    protected $fillable = ['conductors_nombre', 'conductors_apellido', 'conductors_identificacion', 'conductors_direccion', 'conductors_telefono', 'ciudads_id', 'supervisors_id', 'pais_id'];

}