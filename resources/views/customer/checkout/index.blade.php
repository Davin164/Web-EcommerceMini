@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-6">Checkout</h1>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="bg-white rounded shadow p-6">
        <h2 class="text-lg font-semibold mb-4">Alamat Pengiriman</h2>
        <form action="{{ route('checkout.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="block text-sm font-medium mb-1">Nama Penerima</label>
                <input type="text" name="recipient" class="w-full border rounded px-3 py-2" value="{{ old('recipient', auth()->user()->name) }}">
                @error('recipient') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>
            <div class="mb-3">
                <label class="block text-sm font-medium mb-1">No. HP</label>
                <input type="text" name="phone" class="w-full border rounded px-3 py-2" value="{{ old('phone') }}">
                @error('phone') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>
            <div class="mb-3">
                <label class="block text-sm font-medium mb-1">Alamat Lengkap</label>
                <textarea name="full_address" rows="3" class="w-full border rounded px-3 py-2">{{ old('full_address') }}</textarea>
                @error('full_address') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>
            <div class="mb-3">
                <label class="block text-sm font-medium mb-1">Kota</label>
                <input type="text" name="city" class="w-full border rounded px-3 py-2" value="{{ old('city') }}">
            </div>
            <div class="mb-3">
                <label class="block text-sm font-medium mb-1">Provinsi</label>
                <input type="text" name="province" class="w-full border rounded px-3 py-2" value="{{ old('province') }}">
            </div>
            <div class="mb-3">
                <label class="block text-sm font-medium mb-1">Kode Pos</label>
                <input type="text" name="postal_code" class="w-full border rounded px-3 py-2" value="{{ old('postal_code') }}">
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">Buat Pesanan</button>
        </form>
    </div>

    <div class="bg-white rounded shadow p-6">
        <h2 class="text-lg font-semibold mb-4">Ringkasan Pesanan</h2>
        @foreach($carts as $cart)
        <div class="flex justify-between border-b py-2">
            <span>{{ $cart->product->name }} x{{ $cart->quantity }}</span>
            <span>Rp {{ number_format($cart->product->price * $cart->quantity, 0, ',', '.') }}</span>
        </div>
        @endforeach
        <div class="flex justify-between mt-4 font-bold text-lg">
            <span>Total</span>
            <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
        </div>
    </div>
</div>
@endsection
