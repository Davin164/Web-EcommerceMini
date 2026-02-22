<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">

    <nav class="bg-white shadow">
        <div class="max-w-6xl mx-auto px-4 py-3 flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-xl font-bold text-blue-600">{{ config('app.name') }}</a>
            <div class="flex items-center space-x-4">
                <a href="{{ route('products.index') }}" class="text-gray-600 hover:text-blue-600">Produk</a>
                <a href="{{ route('cart.index') }}" class="text-gray-600 hover:text-blue-600">Keranjang</a>
                <a href="{{ route('orders.index') }}" class="text-gray-600 hover:text-blue-600">Pesanan</a>
                <form method="POST" action="/logout" class="inline">
                    @csrf
                    <button type="submit" class="text-gray-600 hover:text-red-600">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto px-4 py-6">
        @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">{{ session('error') }}</div>
        @endif
        @yield('content')
    </main>

</body>
</html>
