<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sample extends Model
{
    protected $table = 'muestras';
    protected $fillable = [
        'tipo_muestra',
        'id_identificacion_muestra',
        'caracteristicas',
        'numero_muestra',
        'id_orden',
        'muestreador',
        'pH',
        'tratada_biologicamente',
        'incertidumbres',
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
        'incrementar_parametros',
        'preservacion_correcta'
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
