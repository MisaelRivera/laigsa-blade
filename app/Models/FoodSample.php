<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodSample extends Model
{
    protected $table = 'muestras_alimentos';
    protected $fillable = [
        'tipo_muestra',
        'caracteristicas',
        'numero_muestra',
        'id_orden',
        'muestreador',
        'tipo_muestreo',
        'fecha_muestreo',
        'hora_muestreo',
        'parametros',
        'otros_parametros',
        'identificacion_muestra',
        'peso_meustra',
        'temperatura',
        'latitud',
        'longitud'
    ];
    public $timestamps = false;
    use HasFactory;

    public function orden ()
    {
        return $this->belongsTo(Order::class, 'id_orden');
    }

    public function identificacionMuestraRelacion ()
    {   
        return $this->hasOne(SampleIdentification::class, 'id', 'id_identificacion_muestra');
    }
}
