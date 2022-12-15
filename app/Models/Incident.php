<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Incident extends Model
{
    use HasFactory;


    //JALAMOS LOS DATOS DE LA TABLA INCIDENTS
    protected $fillable = [
        'user_id',
        'nombre_usuario',	
        'tipo',
        'estado_carretera',
        'estado_trafico',
        'foto_url',
    ];

    //RELACION DE UNO A MUCHOS (INVERSA)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function location()
    {
        return $this->hasOne(Location::class);
    }

}
