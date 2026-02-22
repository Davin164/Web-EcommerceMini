@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-6">Riwayat Pesanan</h1>

@if($orders->isEmpty())
    <p class="text-gray-500">Belum ada pesanan.</p>
@else
<div class="bg-white rounded shadow p-6">
    <table class="w-full">
        <thead>
            <tr class="border-b">
                <th class="text-left py-2">ID</th>
                <th class="text-left py-2">Total</th>
                <th class="text-left py-2">Status</th>
                <th class="text-left py-2">Pembayaran</th>
                <th class="text-left py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr class="border-b">
                <td class="py-3">#{{ $order->id }}</td>
                <td class="py-3">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                <td class="py-3">{{ ucfirst($order->status) }}</td>
                <td class="py-3">{{ ucfirst($order->payment_status) }}</td>
                <td class="py-3">
                    <a href="{{ route('orders.show', $order) }}" class="text-blue-500 hover:underline">Detail</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif
@endsection
