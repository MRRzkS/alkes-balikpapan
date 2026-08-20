<!DOCTYPE html>
<html lang="id" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Admin' }} — Alkes Balikpapan</title>
    <script>
        (function () {
            try {
                var t = localStorage.getItem('theme');
                if (t !== 'light' && t !== 'dark') t = 'dark';
                document.documentElement.classList.toggle('dark', t === 'dark');
            } catch (e) {}
        })();
    </script>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-ink-900 dark:text-ink-100 transition-colors duration-500 relative overflow-x-hidden">

    {{-- Ambient blobs (shared with public layout for visual consistency) --}}
    <div class="pointer-events-none fixed inset-0 -z-10 overflow-hidden" aria-hidden="true">
        <div class="animate-float absolute -top-32 -right-24 w-[28rem] h-[28rem] rounded-full bg-brand-400/15 blur-[100px]"></div>
        <div class="animate-float absolute bottom-0 -left-24 w-[24rem] h-[24rem] rounded-full bg-brand-600/10 blur-[90px]" style="animation-delay: -4s;"></div>
    </div>

    <div class="flex min-h-screen">
        {{-- Sidebar --}}
        <aside class="glass w-64 shrink-0 hidden md:flex flex-col" x-data="{ open: false }">
            <div class="p-5">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2 font-bold text-brand-700 dark:text-white text-lg press">
                    <span class="inline-flex items-center justify-center w-9 h-9 rounded-xl bg-gradient-to-br from-brand-500 to-brand-700 text-white shadow-lg shadow-brand-600/30">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14M5 12h14"/></svg>
                    </span>
                    Alkes Balikpapan
                </a>
                <p class="text-xs text-ink-400 dark:text-ink-500 mt-1 pl-11">Panel Admin</p>
            </div>
            <nav class="px-3 space-y-1 text-sm flex-1">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-ink-600 dark:text-ink-300 hover:bg-brand-500/10 transition {{ request()->routeIs('admin.dashboard') ? 'bg-brand-600 text-white hover:bg-brand-600' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
                    Dashboard
                </a>
                <a href="{{ route('admin.posts.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-ink-600 dark:text-ink-300 hover:bg-brand-500/10 transition {{ request()->routeIs('admin.posts.*') ? 'bg-brand-600 text-white hover:bg-brand-600' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                    Artikel
                </a>
                <a href="{{ route('admin.products.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-ink-600 dark:text-ink-300 hover:bg-brand-500/10 transition {{ request()->routeIs('admin.products.*') ? 'bg-brand-600 text-white hover:bg-brand-600' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 7L12 3 4 7m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                    Produk
                </a>
                <a href="{{ route('admin.inquiries.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-ink-600 dark:text-ink-300 hover:bg-brand-500/10 transition {{ request()->routeIs('admin.inquiries.*') ? 'bg-brand-600 text-white hover:bg-brand-600' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                    Inquiry
                </a>
                <a href="{{ route('home') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-ink-600 dark:text-ink-300 hover:bg-brand-500/10 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                    Lihat situs →
                </a>
            </nav>
            <div class="p-3 border-t border-white/10 dark:border-white/5">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="press flex items-center gap-3 w-full px-3 py-2.5 rounded-xl text-red-600 dark:text-red-400 hover:bg-red-500/10 transition text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                        Keluar
                    </button>
                </form>
            </div>
        </aside>

        {{-- Main --}}
        <main class="flex-1 min-w-0">
            {{-- Mobile top bar --}}
            <div class="md:hidden glass border-b border-white/10 dark:border-white/5 px-4 h-14 flex items-center justify-between sticky top-0 z-40" x-data="{ open: false }">
                <a href="{{ route('admin.dashboard') }}" class="font-bold text-brand-700 dark:text-white">Admin</a>
                <button type="button" class="press w-10 h-10 rounded-lg text-brand-700 dark:text-ink-100" @click="open = !open" aria-label="Menu">
                    <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 12h18M3 6h18M3 18h18"/></svg>
                    <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18M6 6l12 12"/></svg>
                </button>
                <div x-show="open" x-transition.opacity class="absolute top-14 left-0 right-0 glass border-t border-white/10 dark:border-white/5 p-3 flex flex-col text-sm" @click.outside="open = false">
                    <a href="{{ route('admin.dashboard') }}" class="py-2 px-3 rounded-lg hover:bg-brand-500/10 text-ink-600 dark:text-ink-300">Dashboard</a>
                    <a href="{{ route('admin.posts.index') }}" class="py-2 px-3 rounded-lg hover:bg-brand-500/10 text-ink-600 dark:text-ink-300">Artikel</a>
                    <a href="{{ route('admin.products.index') }}" class="py-2 px-3 rounded-lg hover:bg-brand-500/10 text-ink-600 dark:text-ink-300">Produk</a>
                    <a href="{{ route('admin.inquiries.index') }}" class="py-2 px-3 rounded-lg hover:bg-brand-500/10 text-ink-600 dark:text-ink-300">Inquiry</a>
                    <a href="{{ route('home') }}" class="py-2 px-3 rounded-lg hover:bg-brand-500/10 text-ink-600 dark:text-ink-300">Lihat situs →</a>
                    <form method="POST" action="{{ route('logout') }}" class="py-2">@csrf<button class="text-red-600 dark:text-red-400 text-sm">Keluar</button></form>
                </div>
            </div>
            {{ $slot }}
        </main>
    </div>
</body>
</html>
