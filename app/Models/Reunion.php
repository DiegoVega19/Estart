<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reunion extends Model
{
    use HasFactory;
    protected $table = "reunions";

    protected $fillable = [
        'nombreReunion',
        'horaInicio',
        'horaFinal',
    ];

    public function empleados()
    {
        return $this->belongsToMany(Empleado::class,'reunion_empleados');
    }
}
