<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaterSample extends Model
{
    protected $table = 'muestras_aguas';
    protected $fillable = [
        'tipo_muestra',
        'id_identificacion_muestra',
        'caracteristicas',
        'numero_muestra',
        'id_orden',
        'muestreador',
        'pH',
        'tratada_biologicamente',
        'cloro',
        'valor_cloro',
        'ph_cromo_hexavalente',
        'tipo_muestreo',
        'conductividad',
        'fecha_muestreo',
        'hora_muestreo',
        'fecha_final_muestreo',
        'hora_final_muestreo',
        'fecha_composicion',
        'hora_composicion',
        'flujo_1 ',
        'flujo_2 ',
        'flujo_3 ',
        'flujo_4 ',
        'flujo_5 ',
        'flujo_6 ',
        'parametros',
        'otros_parametros',
        'preservacion_correcta'
    ];

    protected $casts = [
        'hora_muestreo' => 'datetime:H:i', // Casts time to Carbon instance,
        'hora_final_muestreo' => 'datetime:H:i', // Casts time to Carbon instance,
        'hora_composicion' => 'datetime:H:i', // Casts time to Carbon instance,
        'tratada_biologicamente' => 'boolean',
        'siralab' => 'boolean',
        'otros_parametros' => 'boolean'
    ];

    protected function tipoMuestreo (): Attribute {
        return Attribute::make(
            get: function (string $value) {
               return str_replace('_', ' ', $value);
            }
        );
    }

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
