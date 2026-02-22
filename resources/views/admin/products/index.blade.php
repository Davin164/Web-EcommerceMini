@extends('layouts.admin')

@section('title', 'Produk')

@section('content')
<div class="bg-white rounded shadow p-6">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-lg font-semibold">Daftar Produk</h2>
        <a href="{{ route('admin.products.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Tambah</a>
    </div>

    <table class="w-full text-left border">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-3 border">No</th>
                <th class="p-3 border">Gambar</th>
                <th class="p-3 border">Nama</th>
                <th class="p-3 border">Kategori</th>
                <th class="p-3 border">Harga</th>
                <th class="p-3 border">Stok</th>
                <th class="p-3 border">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $i => $product)
            <tr>
                <td class="p-3 border">{{ $i + 1 }}</td>
                <td class="p-3 border">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" class="w-16 h-16 object-cover rounded">
                    @else
                        <span class="text-gray-400">No Image</span>
                    @endif
                </td>
                <td class="p-3 border">{{ $product->name }}</td>
                <td class="p-3 border">{{ $product->category->name }}</td>
                <td class="p-3 border">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                <td class="p-3 border">{{ $product->stock }}</td>
                <td class="p-3 border space-x-2">
                    <a href="{{ route('admin.products.edit', $product) }}" class="text-yellow-500 hover:underline">Edit</a>
                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin hapus?')" class="text-red-500 hover:underline">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
