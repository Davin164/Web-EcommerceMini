@extends('layouts.admin')

@section('title', 'Edit Produk')

@section('content')
<div class="bg-white rounded shadow p-6 max-w-2xl">
    <h2 class="text-lg font-semibold mb-4">Edit Produk</h2>

    <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Nama Produk</label>
            <input type="text" name="name" value="{{ old('name', $product->name) }}" class="w-full border rounded px-3 py-2">
            @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Kategori</label>
            <select name="category_id" class="w-full border rounded px-3 py-2">
                <option value="">-- Pilih Kategori --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Harga</label>
            <input type="number" name="price" value="{{ old('price', $product->price) }}" class="w-full border rounded px-3 py-2">
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Stok</label>
            <input type="number" name="stock" value="{{ old('stock', $product->stock) }}" class="w-full border rounded px-3 py-2">
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Deskripsi</label>
            <textarea name="description" rows="4" class="w-full border rounded px-3 py-2">{{ old('description', $product->description) }}</textarea>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Gambar</label>
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" class="w-24 h-24 object-cover rounded mb-2">
            @endif
            <input type="file" name="image" class="w-full border rounded px-3 py-2">
        </div>
        <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Update</button>
        <a href="{{ route('admin.products.index') }}" class="ml-2 text-gray-500 hover:underline">Batal</a>
    </form>
</div>
@endsection
