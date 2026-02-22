@extends('layouts.admin')

@section('title', 'Tambah Kategori')

@section('content')
<div class="bg-white rounded shadow p-6 max-w-lg">
    <h2 class="text-lg font-semibold mb-4">Tambah Kategori</h2>

    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Nama Kategori</label>
            <input type="text" name="name" value="{{ old('name') }}"
                class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400">
            @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
        <a href="{{ route('admin.categories.index') }}" class="ml-2 text-gray-500 hover:underline">Batal</a>
    </form>
</div>
@endsection
