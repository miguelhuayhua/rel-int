<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'sic_usuario';
    protected $primaryKey = 'id_usuario';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
        'id_usuario',
        'id_persona',
        'password',
        'usuario',
        'fecha_registro',
        'estado',
        'actualizado',
        'ultima_vez'
    ];
}
