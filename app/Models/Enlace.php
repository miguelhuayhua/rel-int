<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enlace extends Model
{
    use HasFactory;

    protected $table = 'enlace';
    protected $primaryKey = 'id_enlace';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
        'id_enlace',
        'orden',
        'url_enlace',
        'links_enlace',
        'nombre_enlace',
        'telefono',
        'fax',
        'fecha',
        'estado'
    ];
}
