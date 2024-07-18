<?php

namespace App\Http\Controllers;

use App\Models\FoodSample;
use App\Models\Order;
use App\Models\WaterSample;
use Illuminate\Http\Request;

use function Laravel\Prompts\select;

class OrdersController extends Controller
{
    //
    public function index ()
    {
        $orders = Order::leftJoin('siralab', 'ordenes.id', '=', 'siralab.id_orden')
            ->join('clientes', 'ordenes.id_cliente', '=', 'clientes.id')
            ->select('ordenes.*', 'siralab.id as siralabI', 'siralab.cadena_custodia', 'siralab.hoja_campo', 'siralab.croquis', 'clientes.cliente')
            ->offset(1)
            ->limit(40)
            ->get();
        foreach ($orders as $order) {
            if ($order->aguas_alimentos === 'Aguas') {
                $order->samples = WaterSample::leftJoin('identificacion_muestras', 'muestras_aguas.id_identificacion_muestra', '=', 'identificacion_muestras.id')
                    ->where('id_orden', $order->id)
                    ->get();
            } else {
                $order->samples = FoodSample::where('id_orden', $order->id)
                    ->get();
            }
        }
        
        return view('orders/index', ['orders' => $orders]);
    }
}
