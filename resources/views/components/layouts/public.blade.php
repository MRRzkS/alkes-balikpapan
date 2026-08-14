<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
    <meta property="og:image" content="{{ asset('og-image.svg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta name="twitter:card" content="summary_large_image">

    {{-- Analytics (Google Analytics 4 + Meta Pixel) — only when IDs configured --}}
    @include('partials.analytics')

    <link rel="icon" href="{{ asset('favicon.svg') }}">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-white text-ink">

    {{-- Public navigation --}}
    <header class="sticky top-0 z-50 bg-white/90 backdrop-blur border-b border-gray-100" x-data="{ open: false }">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center gap-2 font-bold text-brand-700 text-lg">
                <span class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-brand-600 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14M5 12h14"/></svg>
                </span>
                Alkes Balikpapan
            </a>

            <div class="hidden md:flex items-center gap-8 text-sm font-medium text-muted">
                <a href="{{ route('home') }}" class="hover:text-brand-700 transition">Beranda</a>
                <a href="{{ route('home') }}#tentang" class="hover:text-brand-700 transition">Tentang</a>
                <a href="{{ route('products.index') }}" class="hover:text-brand-700 transition">Produk</a>
                <a href="{{ route('blog.index') }}" class="hover:text-brand-700 transition">Berita</a>
                <a href="{{ route('contact') }}" class="hover:text-brand-700 transition">Kontak</a>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ config('site.wa_link') }}"
                   target="_blank" rel="noopener"
                   class="inline-flex items-center gap-2 bg-wa hover:bg-emerald-600 text-white text-sm font-semibold px-4 py-2 rounded-full transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor"><path d="M.057 24l1.687-6.163a11.867 11.867 0 01-1.587-5.946C.16 5.335 5.495 0 12.05 0a11.82 11.82 0 018.413 3.488 11.82 11.82 0 013.48 8.414c-.003 6.557-5.338 11.892-11.893 11.892a11.9 11.9 0 01-5.688-1.448L.057 24zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884a9.831 9.831 0 001.523 5.264l-.999 3.648 3.965-1.039zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.262.489 1.694.626.712.226 1.36.194 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                    WhatsApp
                </a>

                {{-- Mobile menu toggle --}}
                <button type="button" class="md:hidden inline-flex items-center justify-center w-10 h-10 rounded-lg text-brand-700 hover:bg-brand-50 transition" @click="open = ! open" :aria-expanded="open" aria-label="Buka menu">
                    <svg x-show="! open" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 12h18M3 6h18M3 18h18"/></svg>
                    <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18M6 6l12 12"/></svg>
                </button>
            </div>
        </nav>

        {{-- Mobile dropdown panel --}}
        <div x-show="open" x-transition.opacity class="md:hidden border-t border-gray-100 bg-white" @click.outside="open = false">
            <nav class="max-w-7xl mx-auto px-4 py-3 flex flex-col text-sm font-medium text-muted">
                <a href="{{ route('home') }}" @click="open = false" class="py-2 hover:text-brand-700 transition">Beranda</a>
                <a href="{{ route('home') }}#tentang" @click="open = false" class="py-2 hover:text-brand-700 transition">Tentang</a>
                <a href="{{ route('products.index') }}" @click="open = false" class="py-2 hover:text-brand-700 transition">Produk</a>
                <a href="{{ route('blog.index') }}" @click="open = false" class="py-2 hover:text-brand-700 transition">Berita</a>
                <a href="{{ route('contact') }}" @click="open = false" class="py-2 hover:text-brand-700 transition">Kontak</a>
            </nav>
        </div>
    </header>

    <main>
        {{ $slot }}
    </main>

    <footer class="bg-brand-900 text-brand-100 mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid md:grid-cols-3 gap-8">
                <div>
                    <div class="font-bold text-white text-lg mb-3">Alkes Balikpapan</div>
                    <p class="text-sm text-brand-200">Distributor alat kesehatan terpercaya di Kalimantan Timur. Dipersembahkan oleh Wahana Surya.</p>
                </div>
                <div>
                    <div class="font-semibold text-white mb-3">Kontak</div>
                    <ul class="text-sm space-y-1 text-brand-200">
                        <li>WhatsApp: <a class="hover:text-white" href="{{ config('site.wa_link') }}">+62 831-5207-5506</a></li>
                        <li>Email: <a class="hover:text-white" href="mailto:halo@alkesbalikpapan.com">halo@alkesbalikpapan.com</a></li>
                        <li>Senin–Jumat, 08:30–17:00</li>
                    </ul>
                </div>
                <div>
                    <div class="font-semibold text-white mb-3">Alamat</div>
                    <p class="text-sm text-brand-200">Perumahan Palm Hills City Puri Alamanda Pa 6 no 11 Sepinggan, Balikpapan</p>
                </div>
            </div>
            <div class="border-t border-brand-800 mt-8 pt-6 text-xs text-brand-300">
                © {{ date('Y') }} Wahana Surya — Alkes Balikpapan. #DistributorAlkesBalikpapan #AlkesKaltim #TokoAlkesBalikpapan #KesehatanBalikpapan
            </div>
        </div>
    </footer>
</body>
</html>
