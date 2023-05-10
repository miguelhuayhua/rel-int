<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $table = 'sic_persona';
    protected $primaryKey = 'id_persona';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
        'id_persona',
        'nombre',
        'paterno',
        'materno',
        'ci',
        'telefono',
        'email',
        'cargo',
        'img'
    ];
}
