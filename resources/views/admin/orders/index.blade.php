@extends('layouts.admin')

@section('title', 'Order')

@section('content')
<div class="bg-white rounded shadow p-6">
    <h2 class="text-lg font-semibold mb-4">Daftar Order</h2>
    <table class="w-full text-left border">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-3 border">ID</th>
                <th class="p-3 border">Customer</th>
                <th class="p-3 border">Total</th>
                <th class="p-3 border">Status</th>
                <th class="p-3 border">Pembayaran</th>
                <th class="p-3 border">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td class="p-3 border">#{{ $order->id }}</td>
                <td class="p-3 border">{{ $order->user->name }}</td>
                <td class="p-3 border">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                <td class="p-3 border">{{ ucfirst($order->status) }}</td>
                <td class="p-3 border">{{ ucfirst($order->payment_status) }}</td>
                <td class="p-3 border">
                    <a href="{{ route('admin.orders.show', $order) }}" class="text-blue-500 hover:underline">Detail</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
