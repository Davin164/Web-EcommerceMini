@extends('layouts.admin')

@section('title', 'Edit Kategori')

@section('content')
<div class="bg-white rounded shadow p-6 max-w-lg">
    <h2 class="text-lg font-semibold mb-4">Edit Kategori</h2>

    <form action="{{ route('admin.categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Nama Kategori</label>
            <input type="text" name="name" value="{{ old('name', $category->name) }}"
                class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400">
            @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>
        <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Update</button>
        <a href="{{ route('admin.categories.index') }}" class="ml-2 text-gray-500 hover:underline">Batal</a>
    </form>
</div>
@endsection
