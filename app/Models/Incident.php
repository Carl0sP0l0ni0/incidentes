<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    use HasFactory;

    //JALAMOS LOS DATOS DE LA TABLA INCIDENTS
    protected $fillable = [
        'user_id',
        'tipo',
        'estado_carretera',
        'estado_trafico',
        'foto_url',
    ];
}
