<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Admin' }} — Alkes Balikpapan</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-50 text-ink">
    <div class="flex min-h-screen">
        <aside class="w-60 bg-brand-900 text-brand-100 hidden md:block">
            <div class="p-5 font-bold text-white text-lg">Alkes Balikpapan</div>
            <nav class="px-3 space-y-1 text-sm">
                <a href="{{ route('admin.dashboard') }}" class="block px-3 py-2 rounded-lg hover:bg-brand-800">Dashboard</a>
                <a href="{{ route('admin.posts.index') }}" class="block px-3 py-2 rounded-lg hover:bg-brand-800">Artikel</a>
                <a href="{{ route('admin.products.index') }}" class="block px-3 py-2 rounded-lg hover:bg-brand-800">Produk</a>
                <a href="{{ route('admin.inquiries.index') }}" class="block px-3 py-2 rounded-lg hover:bg-brand-800">Inquiry</a>
                <a href="{{ route('home') }}" class="block px-3 py-2 rounded-lg hover:bg-brand-800">Lihat situs →</a>
                <form method="POST" action="{{ route('logout') }}" class="pt-3">
                    @csrf
                    <button class="text-brand-300 text-left">Keluar</button>
                </form>
            </nav>
        </aside>

        <main class="flex-1">
            {{ $slot }}
        </main>
    </div>
</body>
</html>
