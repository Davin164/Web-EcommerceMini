@extends('layouts.admin')

@section('title', 'Tambah Produk')

@section('content')
<div class="bg-white rounded shadow p-6 max-w-2xl">
    <h2 class="text-lg font-semibold mb-4">Tambah Produk</h2>

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Nama Produk</label>
            <input type="text" name="name" value="{{ old('name') }}" class="w-full border rounded px-3 py-2">
            @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Kategori</label>
            <select name="category_id" class="w-full border rounded px-3 py-2">
                <option value="">-- Pilih Kategori --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Harga</label>
            <input type="number" name="price" value="{{ old('price') }}" class="w-full border rounded px-3 py-2">
            @error('price') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Stok</label>
            <input type="number" name="stock" value="{{ old('stock') }}" class="w-full border rounded px-3 py-2">
            @error('stock') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Deskripsi</label>
            <textarea name="description" rows="4" class="w-full border rounded px-3 py-2">{{ old('description') }}</textarea>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Gambar</label>
            <input type="file" name="image" class="w-full border rounded px-3 py-2">
            @error('image') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
        <a href="{{ route('admin.products.index') }}" class="ml-2 text-gray-500 hover:underline">Batal</a>
    </form>
</div>
@endsection
