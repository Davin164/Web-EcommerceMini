@extends('layouts.admin')

@section('title', 'Kategori')

@section('content')
<div class="bg-white rounded shadow p-6">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-lg font-semibold">Daftar Kategori</h2>
        <a href="{{ route('admin.categories.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Tambah</a>
    </div>

    <table class="w-full text-left border">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-3 border">No</th>
                <th class="p-3 border">Nama</th>
                <th class="p-3 border">Slug</th>
                <th class="p-3 border">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $i => $category)
            <tr>
                <td class="p-3 border">{{ $i + 1 }}</td>
                <td class="p-3 border">{{ $category->name }}</td>
                <td class="p-3 border">{{ $category->slug }}</td>
                <td class="p-3 border space-x-2">
                    <a href="{{ route('admin.categories.edit', $category) }}" class="text-yellow-500 hover:underline">Edit</a>
                    <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="inline">
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
