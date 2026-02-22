@extends('layouts.app')

@section('content')
<div class="bg-white rounded shadow p-6">
    <div class="flex flex-col md:flex-row gap-8">
        <div class="md:w-1/2">
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" class="w-full rounded">
            @else
                <div class="w-full h-64 bg-gray-200 rounded flex items-center justify-center text-gray-400">No Image</div>
            @endif
        </div>
        <div class="md:w-1/2">
            <h1 class="text-2xl font-bold mb-2">{{ $product->name }}</h1>
            <p class="text-gray-500 mb-2">{{ $product->category->name }}</p>
            <p class="text-3xl font-bold text-blue-600 mb-4">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
            <p class="text-gray-600 mb-4">{{ $product->description }}</p>
            <p class="text-sm text-gray-500 mb-4">Stok: {{ $product->stock }}</p>

            @if($product->stock > 0)
            <form action="{{ route('cart.store') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">+ Tambah ke Keranjang</button>
            </form>
            @else
                <p class="text-red-500 font-semibold">Stok Habis</p>
            @endif
        </div>
    </div>
</div>
@endsection
