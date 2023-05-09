<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    use HasFactory;

    protected $table = 'sic_carrera';
    protected $primaryKey = 'id_carrera';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
        'id_carrera',
        'nom_carrera',
        'image_url'
    ];
}
