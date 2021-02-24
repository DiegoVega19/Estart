<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    protected $table = "empleados";

    protected $fillable = [
        'municipio_id',
        'cargo_id',
        'nombre',
        'apellido',
        'RUC',
        'sexo',
        'edad',
    ];

    public function reunions()
    {
        return $this->belongsToMany(Reunion::class,'reunion_empleados');
    }
    public function coachings()
    {
        return $this->belongsToMany(Coaching::class,'coaching_empleados');
    }
}
