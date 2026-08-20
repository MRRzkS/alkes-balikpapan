<!DOCTYPE html>
<html lang="id" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Set theme before paint to prevent flash (FOUC). Default dark; user choice wins. --}}
    <script>
        (function () {
            try {
                var t = localStorage.getItem('theme');
                if (t !== 'light' && t !== 'dark') t = 'dark';
                document.documentElement.classList.toggle('dark', t === 'dark');
            } catch (e) {}
        })();
    </script>

    {{-- Default SEO; pages override via @section('meta') --}}
    @section('meta')
        <title>{{ $metaTitle ?? config('app.name', 'Alkes Balikpapan') }}</title>
        <meta name="description" content="{{ $metaDescription ?? 'Distributor alat kesehatan terpercaya di Balikpapan, Kalimantan Timur. Melayani rumah sakit, klinik, tambang & migas, serta kebutuhan alkes rumah tangga.' }}">
    @show

    <meta name="keywords" content="distributor alkes balikpapan, supplier alat medis kaltim, pengadaan alkes kalimantan, alkes K3 tambang balikpapan, toko alat kesehatan terdekat balikpapan, beli kursi roda balikpapan, alat cek darah balikpapan, alkes sepinggan">

    {{-- Open Graph defaults --}}
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Alkes Balikpapan">
    <meta property="og:title" content="{{ $metaTitle ?? 'Alkes Balikpapan — Distributor Alat Kesehatan Terpercaya di Kalimantan Timur' }}">
    <meta property="og:description" content="{{ $metaDescription ?? 'Solusi pengadaan alat kesehatan terpercaya di Kalimantan Timur. Distribusi lokal dari Sepinggan, Balikpapan.' }}">
    <meta property="og:image" content="{{ asset('og-image.png') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:locale" content="id_ID">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:image" content="{{ asset('og-image.png') }}">

    {{-- Canonical drops the query string, so ?category= filters do not read as duplicate content --}}
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- Analytics (Google Analytics 4 + Meta Pixel) — only when IDs configured --}}
    @include('partials.analytics')

    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
    <link rel="icon" href="{{ asset('favicon-32.png') }}" sizes="32x32" type="image/png">
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-ink-900 dark:text-ink-100 transition-colors duration-500 relative overflow-x-hidden">

    {{-- Ambient light blobs (Cinema spec): fixed, non-interactive, behind everything --}}
    <div class="pointer-events-none fixed inset-0 -z-10 overflow-hidden" aria-hidden="true">
        <div class="animate-float absolute -top-32 -right-24 w-[28rem] h-[28rem] rounded-full bg-brand-400/20 blur-[100px]"></div>
        <div class="animate-float absolute top-1/3 -left-24 w-[24rem] h-[24rem] rounded-full bg-brand-600/15 blur-[90px]" style="animation-delay: -4s;"></div>
        <div class="animate-pulse-glow absolute bottom-0 left-1/2 -translate-x-1/2 w-[40rem] h-[20rem] rounded-full bg-brand-500/10 blur-[120px]"></div>
    </div>

    {{-- Public navigation --}}
    <header data-site-header class="sticky top-0 z-50 glass border-b border-white/10 dark:border-white/5" x-data="{ open: false }">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center gap-2 font-bold text-brand-700 dark:text-white text-lg press">
                <span class="inline-flex items-center justify-center w-9 h-9 rounded-xl bg-gradient-to-br from-brand-500 to-brand-700 text-white shadow-lg shadow-brand-600/30">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14M5 12h14"/></svg>
                </span>
                Alkes Balikpapan
            </a>

            <div class="hidden md:flex items-center gap-8 text-sm font-medium text-ink-600 dark:text-ink-300">
                <a href="{{ route('home') }}" class="hover:text-brand-600 dark:hover:text-white transition">Beranda</a>
                <a href="{{ route('home') }}#tentang" class="hover:text-brand-600 dark:hover:text-white transition">Tentang</a>
                <a href="{{ route('products.index') }}" class="hover:text-brand-600 dark:hover:text-white transition">Produk</a>
                <a href="{{ route('blog.index') }}" class="hover:text-brand-600 dark:hover:text-white transition">Berita</a>
                <a href="{{ route('contact') }}" class="hover:text-brand-600 dark:hover:text-white transition">Kontak</a>
            </div>

            <div class="flex items-center gap-3">
                {{-- Dark/light toggle (default dark; choice persisted) --}}
                <button type="button" data-theme-toggle onclick="toggleTheme()" aria-pressed="true" aria-label="Ganti tema gelap/terang"
                        class="press inline-flex items-center justify-center w-10 h-10 rounded-full glass text-brand-700 dark:text-ink-100 hover:scale-105 transition-transform">
                    {{-- sun (shown in dark mode) --}}
                    <svg class="theme-sun w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M6.34 17.66l-1.41 1.41M19.07 4.93l-1.41 1.41"/></svg>
                    {{-- moon (shown in light mode) --}}
                    <svg class="theme-moon w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>
                </button>

                <a href="{{ config('site.wa_link') }}"
                   target="_blank" rel="noopener"
                   class="press inline-flex items-center gap-2 bg-wa hover:bg-emerald-500 text-white text-sm font-semibold px-4 py-2 rounded-full shadow-lg shadow-emerald-500/25 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor"><path d="M.057 24l1.687-6.163a11.867 11.867 0 01-1.587-5.946C.16 5.335 5.495 0 12.05 0a11.82 11.82 0 018.413 3.488 11.82 11.82 0 013.48 8.414c-.003 6.557-5.338 11.892-11.893 11.892a11.9 11.9 0 01-5.688-1.448L.057 24zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884a9.831 9.831 0 001.523 5.264l-.999 3.648 3.965-1.039zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.262.489 1.694.626.712.226 1.36.194 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                    WhatsApp
                </a>

                {{-- Mobile menu toggle --}}
                <button type="button" class="md:hidden press inline-flex items-center justify-center w-10 h-10 rounded-lg text-brand-700 dark:text-ink-100 hover:bg-brand-50 dark:hover:bg-white/10 transition" @click="open = ! open" :aria-expanded="open" aria-label="Buka menu">
                    <svg x-show="! open" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 12h18M3 6h18M3 18h18"/></svg>
                    <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18M6 6l12 12"/></svg>
                </button>
            </div>
        </nav>

        {{-- Mobile dropdown panel --}}
        <div x-show="open" x-transition.opacity class="md:hidden border-t border-white/10 dark:border-white/5 glass" @click.outside="open = false">
            <nav class="max-w-7xl mx-auto px-4 py-3 flex flex-col text-sm font-medium text-ink-600 dark:text-ink-300">
                <a href="{{ route('home') }}" @click="open = false" class="py-2 hover:text-brand-600 dark:hover:text-white transition">Beranda</a>
                <a href="{{ route('home') }}#tentang" @click="open = false" class="py-2 hover:text-brand-600 dark:hover:text-white transition">Tentang</a>
                <a href="{{ route('products.index') }}" @click="open = false" class="py-2 hover:text-brand-600 dark:hover:text-white transition">Produk</a>
                <a href="{{ route('blog.index') }}" @click="open = false" class="py-2 hover:text-brand-600 dark:hover:text-white transition">Berita</a>
                <a href="{{ route('contact') }}" @click="open = false" class="py-2 hover:text-brand-600 dark:hover:text-white transition">Kontak</a>
            </nav>
        </div>
    </header>

    <main class="relative">
        {{ $slot }}
    </main>

    <footer class="gradient-cta text-white mt-20 relative overflow-hidden">
        {{-- footer ambient glow --}}
        <div class="pointer-events-none absolute -top-16 right-0 w-72 h-72 rounded-full bg-brand-400/20 blur-3xl"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid md:grid-cols-3 gap-8">
                <div>
                    <div class="font-bold text-white text-lg mb-3">Alkes Balikpapan</div>
                    <p class="text-sm text-white/75">Distributor alat kesehatan terpercaya di Kalimantan Timur. Dipersembahkan oleh Wahana Surya.</p>
                </div>
                <div>
                    <div class="font-semibold text-white mb-3">Kontak</div>
                    <ul class="text-sm space-y-1 text-white/75">
                        <li>WhatsApp: <a class="hover:text-white transition" href="{{ config('site.wa_link') }}">+62 831-5207-5506</a></li>
                        <li>Email: <a class="hover:text-white transition" href="mailto:halo@alkesbalikpapan.com">halo@alkesbalikpapan.com</a></li>
                        <li>Senin–Jumat, 08:30–17:00</li>
                    </ul>
                </div>
                <div>
                    <div class="font-semibold text-white mb-3">Alamat</div>
                    <p class="text-sm text-white/75">Perumahan Palm Hills City Puri Alamanda Pa 6 no 11 Sepinggan, Balikpapan</p>
                </div>
            </div>
            <div class="border-t border-white/10 mt-8 pt-6 text-xs text-white/60">
                © {{ date('Y') }} Wahana Surya — Alkes Balikpapan. #DistributorAlkesBalikpapan #AlkesKaltim #TokoAlkesBalikpapan #KesehatanBalikpapan
            </div>
        </div>
    </footer>
</body>
</html>
