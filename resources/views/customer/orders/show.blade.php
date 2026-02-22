@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-6">Detail Pesanan #{{ $order->id }}</h1>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="bg-white rounded shadow p-6">
        <h2 class="font-semibold mb-3">Alamat Pengiriman</h2>
        <p>{{ $order->address->recipient }}</p>
        <p>{{ $order->address->phone }}</p>
        <p>{{ $order->address->full_address }}</p>
        <p>{{ $order->address->city }}, {{ $order->address->province }} {{ $order->address->postal_code }}</p>
    </div>

    <div class="bg-white rounded shadow p-6">
        <h2 class="font-semibold mb-3">Info Pesanan</h2>
        <p>Status: <span class="font-bold">{{ ucfirst($order->status) }}</span></p>
        <p>Pembayaran: <span class="font-bold">{{ ucfirst($order->payment_status) }}</span></p>
        <p>Total: <span class="font-bold text-blue-600">Rp {{ number_format($order->total_price, 0, ',', '.') }}</span></p>
    </div>
</div>

<div class="bg-white rounded shadow p-6 mt-6">
    <h2 class="font-semibold mb-3">Item Pesanan</h2>
    <table class="w-full">
        <thead>
            <tr class="border-b">
                <th class="text-left py-2">Produk</th>
                <th class="text-left py-2">Harga</th>
                <th class="text-left py-2">Qty</th>
                <th class="text-left py-2">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->orderItems as $item)
            <tr class="border-b">
                <td class="py-3">{{ $item->product->name }}</td>
                <td class="py-3">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                <td class="py-3">{{ $item->quantity }}</td>
                <td class="py-3">Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="mt-4">
    <a href="{{ route('orders.index') }}" class="text-blue-500 hover:underline">← Kembali ke Pesanan</a>
</div>
@endsection
