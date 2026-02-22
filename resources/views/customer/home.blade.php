@extends('layouts.app')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Produk Terbaru</h1>
</div>

<div class="grid grid-cols-2 md:grid-cols-4 gap-6">
    @foreach($products as $product)
    <div class="bg-white rounded shadow p-4">
        @if($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" class="w-full h-40 object-cover rounded mb-3">
        @else
            <div class="w-full h-40 bg-gray-200 rounded mb-3 flex items-center justify-center text-gray-400">No Image</div>
        @endif
        <h3 class="font-semibold text-gray-800">{{ $product->name }}</h3>
        <p class="text-blue-600 font-bold">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
        <a href="{{ route('products.show', $product->slug) }}" class="mt-2 block text-center bg-blue-600 text-white py-1 rounded hover:bg-blue-700">Lihat</a>
    </div>
    @endforeach
</div>
@endsection
