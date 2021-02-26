<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExternalData extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'Satisfaccion',
        'Solucion',
        'TiempoCalculado',
        'SatisfaccionCalculado',
        'SolucionCalculada',
        'Tiempo',
        'Total',
        'TotalRedondeado',

    ];
}
