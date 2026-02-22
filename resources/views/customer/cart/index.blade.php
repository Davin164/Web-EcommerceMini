@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-6">Keranjang Belanja</h1>

@if($carts->isEmpty())
    <p class="text-gray-500">Keranjang masih kosong.</p>
@else
<div class="bg-white rounded shadow p-6">
    <table class="w-full">
        <thead>
            <tr class="border-b">
                <th class="text-left py-2">Produk</th>
                <th class="text-left py-2">Harga</th>
                <th class="text-left py-2">Qty</th>
                <th class="text-left py-2">Subtotal</th>
                <th class="text-left py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($carts as $cart)
            <tr class="border-b">
                <td class="py-3">{{ $cart->product->name }}</td>
                <td class="py-3">Rp {{ number_format($cart->product->price, 0, ',', '.') }}</td>
                <td class="py-3">{{ $cart->quantity }}</td>
                <td class="py-3">Rp {{ number_format($cart->product->price * $cart->quantity, 0, ',', '.') }}</td>
                <td class="py-3">
                    <form action="{{ route('cart.destroy', $cart) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4 text-right">
        <p class="text-xl font-bold">Total: Rp {{ number_format($carts->sum(fn($c) => $c->product->price * $c->quantity), 0, ',', '.') }}</p>
        <a href="{{ route('checkout.index') }}" class="mt-2 inline-block bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Checkout</a>
    </div>
</div>
@endif
@endsection
