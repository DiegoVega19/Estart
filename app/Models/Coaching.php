<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coaching extends Model
{
    use HasFactory;
    protected $table = "coachings";

    protected $fillable = [
        'nombre',
        'horaInicio',
        'horaFinal',
    ];

    public function empleados()
    {
        return $this->belongsToMany(Empleado::class,'coaching_empleados');
    }

}
