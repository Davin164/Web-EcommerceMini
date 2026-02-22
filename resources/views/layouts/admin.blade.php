<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    <div class="flex min-h-screen">
        {{-- Sidebar --}}
        <aside class="w-64 bg-gray-800 text-white flex flex-col">
            <div class="p-4 text-xl font-bold border-b border-gray-700">
                Admin Panel
            </div>
            <nav class="flex-1 p-4 space-y-2">
                <a href="/admin/dashboard" class="block px-4 py-2 rounded hover:bg-gray-700">Dashboard</a>
                <a href="/admin/categories" class="block px-4 py-2 rounded hover:bg-gray-700">Kategori</a>
                <a href="/admin/products" class="block px-4 py-2 rounded hover:bg-gray-700">Produk</a>
                <a href="/admin/orders" class="block px-4 py-2 rounded hover:bg-gray-700">Order</a>
            </nav>
            <div class="p-4 border-t border-gray-700">
                <form method="POST" action="/logout">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2 rounded hover:bg-gray-700">
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        {{-- Main Content --}}
        <div class="flex-1 flex flex-col">
            <header class="bg-white shadow px-6 py-4">
                <h1 class="text-lg font-semibold text-gray-700">@yield('title', 'Dashboard')</h1>
            </header>
            <main class="p-6">
                @if(session('success'))
                    <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">{{ session('success') }}</div>
                @endif
                @if(session('error'))
                    <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">{{ session('error') }}</div>
                @endif
                @yield('content')
            </main>
        </div>
    </div>

</body>
</html>
