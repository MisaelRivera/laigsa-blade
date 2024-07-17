<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Client extends Model
{
    protected $table = 'clientes';
    public $timestamps = false;
    protected $guarded = [];
    use HasFactory;

    public function identificaciones_muestra ()
    {
        return $this->hasMany(SampleIdentification::class, 'id_cliente');
    }

    public function nombreIdentificacionesMuestra()
{
    return SampleIdentification::select('id', 'identificacion_muestra')
        ->where('obsoleta', 0)
        ->where('id_cliente', $this->id)
        ->get()
        ->map(function ($item) {
           return [
            'id' => $item['id'],
            'identificacion_muestra' => $item['identificacion_muestra']
           ];
        }); // Replace 'some_field' with the actual field name you want to retrieve
}


    public function ordenes ()
    {
        return $this->hasMany(Order::class, 'id_cliente');
    }

    public function filteredIdentificacionesMuestra () {
        return $this->identificaciones_muestra()->where('obsoleta', 0);
    }
}
