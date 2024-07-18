@extends('layouts.app')

@section('content')
    <table class="border border-black">
        <thead>
            <tr>
                <th class="border border-black py-2 px-4 text-left">Folio</th>
                <th class="border border-black py-2 px-4 text-left">No.</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td class="border border-black py-2 px-4 text-left">
                        {{ $order->folio }}
                    </td>
                    <td class="border border-black py-2 px-4 text-left">{{ $order->numero_muestras }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection