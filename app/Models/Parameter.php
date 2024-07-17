<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    protected $table = 'parametros';
    protected $fillable = [
        'parametro', 'metodo', 'lcp', 'unidades', 'abreviacion', 'arrange', 'subcontratado',
        'compuesto', 'ema', 'cna', 'ssa', 'observaciones', 'unidades_adicionales', 'fecha_resultado_final',
        'parametro_campo', 'incertidumbre', 'lcs', 'calculo_compuesto', 'prueba_presuntiva', 
        'prueba_confirmativa', 'lcp_texto', 'lcs_texto',
    ];
    protected $casts = [
        'subcontratado' => 'boolean',
        'compuesto' => 'boolean',
        'ema' => 'boolean',
        'cna' => 'boolean',
        'ssa' => 'boolean',
        'observaciones' => 'boolean',
        'unidades_adicionales' => 'boolean',
        'supervisar' => 'boolean',
        'fecha_resultado_final' => 'boolean',
        'parametro_campo' => 'boolean',
        'incertidumbre' => 'boolean',
    ];


    public $timestamps = false; 
    use HasFactory;

    public function analistas () 
    {
        return $this->belongsToMany(User::class, 'parametros_analistas', 'id_parametro', 'id_usuario');
    }

    public function supervisores () 
    {
        return $this->belongsToMany(User::class, 'parametros_supervisores', 'id_parametro', 'id_usuario');
    }

    public function rules ()
    {
        return $this->belongsToMany(Rule::class, 'normas_parametros', 'id_parametro', 'id_norma');
    }

    public function samples ()
    {
        return $this->belongsToMany(Samples::class, 'muestras_parametros', 'id_parametro', 'id_muestra');
    }

}
