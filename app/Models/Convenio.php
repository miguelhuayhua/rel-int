<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Convenio extends Model
{
    use HasFactory;

    protected $table = 'sic_convenio';
    protected $primaryKey = 'id_convenios';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
        'id_convenios',
        'id_tipo_convenio',
        'nombre_convenio',
        'objetivo_convenio',
        'img_convenio',
        'pdf_convenio',
        'fecha_firma',
        'tiempo_duracion',
        'direccion',
        'entidad',
        'telefono',
        'email',
        'fecha_finalizacion',
        'fecha_publicacion',
        'correlativo'
    ];
    public $attributes = [
        'estado' => 'Activo',
    ];
}
