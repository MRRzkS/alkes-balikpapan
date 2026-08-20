<x-layouts.public>
    {{-- JSON-LD: MedicalOrganization (local SEO) --}}
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "MedicalOrganization",
        "name": "Alkes Balikpapan",
        "alternateName": "Wahana Surya",
        "description": "Distributor alat kesehatan terpercaya di Balikpapan, Kalimantan Timur. Melayani rumah sakit, klinik, perusahaan tambang & migas, apotek, serta kebutuhan alkes rumah tangga.",
        "url": "{{ url('/') }}",
        "logo": "{{ asset('logo.png') }}",
        "image": "{{ asset('og-image.png') }}",
        "telephone": "+62 831-5207-5506",
        "email": "halo@alkesbalikpapan.com",
        "address": {
            "@@type": "PostalAddress",
            "streetAddress": "Perumahan Palm Hills City Puri Alamanda Pa 6 no 11 Sepinggan",
            "addressLocality": "Balikpapan",
            "addressRegion": "Kalimantan Timur",
            "addressCountry": "ID"
        },
        "openingHoursSpecification": {
            "@@type": "OpeningHoursSpecification",
            "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
            "opens": "08:30",
            "closes": "17:00"
        },
        "areaServed": "Kalimantan Timur"
    }
    </script>

    {{-- Hero: cinematic gradient + glass stat cards + floating image --}}
    <section class="gradient-hero relative overflow-hidden">
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 md:py-28 grid md:grid-cols-2 gap-12 items-center reveal">
            <div class="text-center md:text-left">
                <span class="inline-block mb-5 px-4 py-1.5 rounded-full text-xs font-semibold glass text-brand-700 dark:text-brand-200">Distributor Alat Kesehatan · Kalimantan Timur</span>
                <h1 class="text-4xl md:text-6xl font-bold text-ink-900 dark:text-white leading-[1.08] tracking-tight">Alkes <span class="bg-gradient-to-r from-brand-600 to-brand-800 dark:from-brand-300 dark:to-brand-500 bg-clip-text text-transparent">Balikpapan</span></h1>
                <p class="mt-5 text-lg md:text-xl text-ink-600 dark:text-white/80 max-w-xl mx-auto md:mx-0">Solusi Pengadaan Alat Kesehatan Terpercaya di Kalimantan Timur</p>
                <div class="mt-9 flex flex-wrap justify-center md:justify-start gap-4">
                    <a href="{{ config('site.wa_link') }}" target="_blank" rel="noopener" class="press bg-wa hover:bg-emerald-500 text-white font-semibold px-7 py-3.5 rounded-full shadow-xl shadow-emerald-500/30 hover:-translate-y-0.5 transition-transform duration-200">Konsultasi via WhatsApp</a>
                    <a href="#produk" class="press glass text-brand-700 dark:text-white font-semibold px-7 py-3.5 rounded-full hover:-translate-y-0.5 transition-transform duration-200">Lihat Produk</a>
                </div>
                <div class="mt-10 flex flex-wrap justify-center md:justify-start gap-5">
                    <div class="glass rounded-2xl px-6 py-3.5 text-left">
                        <div class="text-2xl font-bold text-brand-700 dark:text-white">24<span class="text-base font-semibold">j</span></div>
                        <div class="text-xs text-ink-500 dark:text-white/70">Respon WhatsApp</div>
                    </div>
                    <div class="glass rounded-2xl px-6 py-3.5 text-left">
                        <div class="text-2xl font-bold text-brand-700 dark:text-white">Kaltim</div>
                        <div class="text-xs text-ink-500 dark:text-white/70">Area layanan</div>
                    </div>
                    <div class="glass rounded-2xl px-6 py-3.5 text-left">
                        <div class="text-2xl font-bold text-brand-700 dark:text-white">B2B+B2C</div>
                        <div class="text-xs text-ink-500 dark:text-white/70">Segmen layanan</div>
                    </div>
                </div>
            </div>
            <div class="order-first md:order-last relative">
                <div class="animate-float absolute -inset-6 rounded-[2rem] bg-brand-400/20 blur-2xl"></div>
                <img src="{{ config('site.placeholders.hero') }}" alt="Alat kesehatan medis" class="relative card-3d rounded-[1.5rem] w-full h-72 md:h-96 object-cover">
            </div>
        </div>
    </section>

    {{-- Tentang --}}
    <section id="tentang" class="max-w-6xl mx-auto px-4 py-20 reveal">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div class="relative">
                <div class="animate-float absolute -inset-4 rounded-3xl bg-brand-500/15 blur-2xl"></div>
                <img src="{{ config('site.placeholders.about') }}" alt="Tim Alkes Balikpapan" class="relative card-3d rounded-[1.5rem] w-full h-72 object-cover">
            </div>
            <div class="glass rounded-[1.5rem] p-8 md:p-10">
                <h2 class="text-3xl md:text-4xl font-bold text-brand-700 dark:text-white mb-4">Tentang Kami</h2>
                <p class="text-ink-600 dark:text-ink-300 leading-relaxed text-lg">Wahana Surya (Alkes Balikpapan) adalah penyedia alat kesehatan yang berpusat di Balikpapan, Kalimantan Timur. Kami hadir untuk memotong rantai distribusi yang panjang, memberikan akses cepat dan efisien terhadap alat kesehatan berkualitas bagi masyarakat dan instansi medis di seluruh Kalimantan.</p>
            </div>
        </div>
    </section>

    {{-- Pasar --}}
    <section class="py-20 reveal">
        <div class="max-w-6xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-brand-700 dark:text-white">Pasar yang Kami Layani</h2>
                <p class="mt-3 text-ink-600 dark:text-ink-300">Dari rumah sakit hingga kebutuhan homecare — satu mitra distribusi.</p>
            </div>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="glass rounded-[1.25rem] p-8 card-3d">
                    <div class="inline-flex items-center justify-center w-12 h-12 rounded-xl bg-brand-600/15 text-brand-600 dark:text-brand-300 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 21h18M5 21V7l8-4v18M19 21V11l-6-4"/><path d="M9 9v.01M9 12v.01M9 15v.01M9 18v.01"/></svg>
                    </div>
                    <h3 class="font-semibold text-xl text-brand-700 dark:text-white mb-2">B2B — Instansi & Perusahaan</h3>
                    <ul class="text-ink-600 dark:text-ink-300 space-y-1.5 text-sm">
                        <li>Rumah Sakit</li>
                        <li>Klinik Dokter</li>
                        <li>Perusahaan Tambang & Migas (K3)</li>
                        <li>Apotek</li>
                    </ul>
                </div>
                <div class="glass rounded-[1.25rem] p-8 card-3d">
                    <div class="inline-flex items-center justify-center w-12 h-12 rounded-xl bg-brand-600/15 text-brand-600 dark:text-brand-300 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 12h18M3 18h18M3 6h18"/><path d="M12 2v4"/></svg>
                    </div>
                    <h3 class="font-semibold text-xl text-brand-700 dark:text-white mb-2">B2C — Kebutuhan Rumah & Homecare</h3>
                    <ul class="text-ink-600 dark:text-ink-300 space-y-1.5 text-sm">
                        <li>Alat pemantauan kesehatan di rumah</li>
                        <li>Alat bantu jalan</li>
                        <li>Perlengkapan homecare</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- Produk Unggulan --}}
    <section id="produk" class="max-w-7xl mx-auto px-4 py-20 reveal">
        <div class="flex items-end justify-between mb-10">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-brand-700 dark:text-white">Produk Unggulan</h2>
                <p class="mt-2 text-ink-600 dark:text-ink-300">Pilihan alat kesehatan yang sering diminta klien kami.</p>
            </div>
            <a href="{{ route('products.index') }}" class="press hidden sm:inline-flex items-center gap-1 text-brand-600 dark:text-brand-300 font-medium text-sm hover:underline">Lihat semua →</a>
        </div>
        <div class="grid sm:grid-cols-2 md:grid-cols-4 gap-6">
            @forelse ($featuredProducts as $product)
                <article class="glass rounded-2xl overflow-hidden card-3d">
                    <div class="overflow-hidden">
                        @if ($product->image)
                            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="h-44 w-full object-cover hover:scale-105 transition-transform duration-500">
                        @else
                            <img src="{{ config('site.placeholders.product') }}" alt="{{ $product->name }}" class="h-44 w-full object-cover hover:scale-105 transition-transform duration-500">
                        @endif
                    </div>
                    <div class="p-5">
                        <span class="text-xs text-brand-600 dark:text-brand-300 font-medium">{{ \App\Models\Product::CATEGORIES[$product->category] ?? '' }}</span>
                        <h3 class="font-semibold mt-1 text-ink-900 dark:text-white">{{ $product->name }}</h3>
                    </div>
                </article>
            @empty
                <p class="text-ink-400">Belum ada produk unggulan.</p>
            @endforelse
        </div>
    </section>

    {{-- WhyUs --}}
    <section class="gradient-cta text-white py-20 reveal relative overflow-hidden">
        <div class="animate-pulse-glow pointer-events-none absolute top-0 left-1/4 w-72 h-72 rounded-full bg-brand-400/30 blur-3xl"></div>
        <div class="relative max-w-6xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold">Mengapa Memilih Kami</h2>
                <p class="mt-3 text-white/75">Distribusi lokal, respons cepat, dan harga transparan.</p>
            </div>
            <div class="grid md:grid-cols-3 gap-6">
                <div class="glass rounded-[1.25rem] p-7 card-3d">
                    <div class="inline-flex items-center justify-center w-12 h-12 rounded-xl bg-white/15 text-white mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
                    </div>
                    <div class="font-semibold text-lg mb-2">Distribusi Lokal</div>
                    <p class="text-white/75 text-sm">Stok dan basis pengiriman di Sepinggan, Balikpapan — lebih cepat menjangkau area Kalimantan Timur.</p>
                </div>
                <div class="glass rounded-[1.25rem] p-7 card-3d">
                    <div class="inline-flex items-center justify-center w-12 h-12 rounded-xl bg-white/15 text-white mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M8 2v4M16 2v4M3 10h18M5 6h14a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2z"/></svg>
                    </div>
                    <div class="font-semibold text-lg mb-2">Layanan Konsultasi</div>
                    <p class="text-white/75 text-sm">Respons cepat dan penawaran harga via WhatsApp untuk kebutuhan pengadaan Anda.</p>
                </div>
                <div class="glass rounded-[1.25rem] p-7 card-3d">
                    <div class="inline-flex items-center justify-center w-12 h-12 rounded-xl bg-white/15 text-white mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
                    </div>
                    <div class="font-semibold text-lg mb-2">Berkualitas</div>
                    <p class="text-white/75 text-sm">Alat kesehatan terkurasi dari supplier terpercaya, sesuai standar kebutuhan medis & K3.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Blog terbaru --}}
    @if ($latestPosts->isNotEmpty())
    <section class="max-w-7xl mx-auto px-4 py-20 reveal">
        <div class="flex items-end justify-between mb-10">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-brand-700 dark:text-white">Berita & Artikel Terbaru</h2>
                <p class="mt-2 text-ink-600 dark:text-ink-300">Update seputar alat kesehatan dantips pengadaan.</p>
            </div>
            <a href="{{ route('blog.index') }}" class="press hidden sm:inline-flex items-center gap-1 text-brand-600 dark:text-brand-300 font-medium text-sm hover:underline">Semua berita →</a>
        </div>
        <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach ($latestPosts as $post)
                <article class="glass rounded-2xl overflow-hidden card-3d">
                    <div class="overflow-hidden">
                        @if ($post->featured_image)
                            <img src="{{ asset($post->featured_image) }}" alt="{{ $post->title }}" class="h-44 w-full object-cover hover:scale-105 transition-transform duration-500">
                        @else
                            <img src="{{ config('site.placeholders.post') }}" alt="{{ $post->title }}" class="h-44 w-full object-cover hover:scale-105 transition-transform duration-500">
                        @endif
                    </div>
                    <div class="p-5">
                        <h3 class="font-semibold text-ink-900 dark:text-white">{{ $post->title }}</h3>
                        @if ($post->excerpt)
                            <p class="text-ink-600 dark:text-ink-300 text-sm mt-2">{{ $post->excerpt }}</p>
                        @endif
                    </div>
                </article>
            @endforeach
        </div>
    </section>
    @endif

    {{-- Kontak singkat --}}
    <section id="kontak" class="py-20 reveal">
        <div class="glass rounded-[1.5rem] max-w-3xl mx-auto px-4 py-16 text-center relative overflow-hidden">
            <div class="animate-pulse-glow pointer-events-none absolute -top-10 left-1/2 -translate-x-1/2 w-64 h-64 rounded-full bg-brand-400/20 blur-3xl"></div>
            <div class="relative">
                <h2 class="text-3xl md:text-4xl font-bold text-brand-700 dark:text-white mb-4">Hubungi Kami</h2>
                <p class="text-ink-600 dark:text-ink-300 mb-7">Konsultasikan kebutuhan alat kesehatan Anda — respons cepat via WhatsApp.</p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="{{ config('site.wa_link') }}" target="_blank" rel="noopener" class="press bg-wa hover:bg-emerald-500 text-white font-semibold px-7 py-3.5 rounded-full shadow-xl shadow-emerald-500/30 hover:-translate-y-0.5 transition-transform duration-200">WhatsApp</a>
                    <a href="mailto:halo@alkesbalikpapan.com" class="press glass text-brand-700 dark:text-white font-semibold px-7 py-3.5 rounded-full hover:-translate-y-0.5 transition-transform duration-200">Email</a>
                </div>
                <p class="mt-7 text-sm text-ink-400">Perumahan Palm Hills City Puri Alamanda Pa 6 no 11 Sepinggan, Balikpapan · Senin–Jumat 08:30–17:00</p>
            </div>
        </div>
    </section>
</x-layouts.public>
