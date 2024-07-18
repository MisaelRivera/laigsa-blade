<?php

use App\Models\FoodSample;
use App\Models\LearningExperience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Order;
use App\Models\WaterSample;

Route::get('/orders', function (Request $request) {
    $page = 1;
    //if ($request->has('page')) $page = $request->query('page');
    $orders = Order::leftJoin('siralab', 'ordenes.id', '=', 'siralab.id_orden')
        ->join('clientes', 'ordenes.id_cliente', '=', 'clientes.id')
        ->select('ordenes.*', 'siralab.id as siralabId', 'siralab.hoja_campo', 'siralab.cadena_custodia', 'siralab.croquis', 'clientes.cliente')
        ->offset($page)
        ->limit(10)
        ->get();
    foreach ($orders as $order) {
        if ($order->aguas_alimentos === 'Aguas') {
            $order->samples = WaterSample::leftJoin('identificacion_muestras', 'muestras_aguas.id_identificacion_muestra', '=', 'identificacion_muestras.id')
                ->select('muestras_aguas.*', 'identificacion_muestras.identificacion_muestra')
                ->where('id_orden', $order->id)
                ->get();
        } else {
            $order->samples = FoodSample::where('id_orden', $order->id)
                ->get();
        }
    }
    return response()->json($orders);
})->middleware('cors');

Route::get('/learning_experiences', [LearningExperience::class, 'index']);
Route::post('/learning_experiences', [LearningExperience::class, 'store']);
