@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-4 gap-6">

    <div class="bg-white p-6 rounded shadow">
        <p class="text-gray-500 text-sm">Total Produk</p>
        <p class="text-3xl font-bold text-gray-800">{{ $totalProducts }}</p>
    </div>

    <div class="bg-white p-6 rounded shadow">
        <p class="text-gray-500 text-sm">Total Order</p>
        <p class="text-3xl font-bold text-gray-800">{{ $totalOrders }}</p>
    </div>

    <div class="bg-white p-6 rounded shadow">
        <p class="text-gray-500 text-sm">Total Customer</p>
        <p class="text-3xl font-bold text-gray-800">{{ $totalUsers }}</p>
    </div>

    <div class="bg-white p-6 rounded shadow">
        <p class="text-gray-500 text-sm">Total Pendapatan</p>
        <p class="text-3xl font-bold text-gray-800">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</p>
    </div>

</div>
@endsection
