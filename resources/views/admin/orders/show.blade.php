@extends('layouts.admin')

@section('title', 'Detail Order')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
    <div class="bg-white rounded shadow p-6">
        <h2 class="font-semibold mb-3">Info Customer</h2>
        <p>Nama: {{ $order->user->name }}</p>
        <p>Email: {{ $order->user->email }}</p>
    </div>
    <div class="bg-white rounded shadow p-6">
        <h2 class="font-semibold mb-3">Alamat Pengiriman</h2>
        <p>{{ $order->address->recipient }} - {{ $order->address->phone }}</p>
        <p>{{ $order->address->full_address }}</p>
        <p>{{ $order->address->city }}, {{ $order->address->province }}</p>
    </div>
</div>

<div class="bg-white rounded shadow p-6 mb-6">
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
                <td class="py-2">{{ $item->product->name }}</td>
                <td class="py-2">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                <td class="py-2">{{ $item->quantity }}</td>
                <td class="py-2">Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <p class="text-right font-bold mt-4">Total: Rp {{ number_format($order->total_price, 0, ',', '.') }}</p>
</div>

<div class="bg-white rounded shadow p-6">
    <h2 class="font-semibold mb-3">Update Status</h2>
    <form action="{{ route('admin.orders.update', $order) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="flex gap-4">
            <div>
                <label class="block text-sm font-medium mb-1">Status Order</label>
                <select name="status" class="border rounded px-3 py-2">
                    @foreach(['pending', 'processing', 'shipped', 'delivered', 'cancelled'] as $status)
                        <option value="{{ $status }}" {{ $order->status == $status ? 'selected' : '' }}>{{ ucfirst($status) }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Status Pembayaran</label>
                <select name="payment_status" class="border rounded px-3 py-2">
                    <option value="unpaid" {{ $order->payment_status == 'unpaid' ? 'selected' : '' }}>Unpaid</option>
                    <option value="paid" {{ $order->payment_status == 'paid' ? 'selected' : '' }}>Paid</option>
                </select>
            </div>
            <div class="flex items-end">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update</button>
            </div>
        </div>
    </form>
</div>
@endsection
