<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galerias extends Model
{
    use HasFactory;

    protected $table = 'galeria';
    protected $primaryKey = 'id_galeria';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
        'id_carrera',
        'nombre_galeria',
        'url_galeria',
        'fecha_galeria',
        'estado_galeria'
    ];
}
