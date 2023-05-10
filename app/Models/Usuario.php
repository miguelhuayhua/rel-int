<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

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
        'actualizado'
    ];
}
