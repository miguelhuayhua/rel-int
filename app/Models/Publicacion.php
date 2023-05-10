<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    use HasFactory;
    protected $table = 'publicaciones';
    protected $primaryKey = 'id_publicaciones';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
        'id_publicaciones',
        'titulo',
        'descripcion',
        'correlativo',
        'subtitulo',
        'url',
        'links',
        'tipo_publicaciones',
        'fecha',
        'estado'
    ];
}
