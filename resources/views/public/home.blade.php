<x-layouts.public>
    {{-- JSON-LD: MedicalOrganization (local SEO) — valid anywhere in the document --}}
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "MedicalOrganization",
        "name": "Alkes Balikpapan",
        "alternateName": "Wahana Surya",
        "description": "Distributor alat kesehatan terpercaya di Balikpapan, Kalimantan Timur. Melayani rumah sakit, klinik, perusahaan tambang & migas, apotek, serta kebutuhan alkes rumah tangga.",
        "url": "{{ url('/') }}",
        "logo": "{{ asset('logo.svg') }}",
        "image": "{{ asset('og-image.svg') }}",
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

    {{-- Hero --}}
    <section class="gradient-hero">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24 grid md:grid-cols-2 gap-10 items-center reveal">
            <div class="text-center md:text-left">
                <h1 class="text-4xl md:text-5xl font-bold text-brand-700 dark:text-white">Alkes Balikpapan</h1>
                <p class="mt-4 text-lg md:text-xl text-ink-600 dark:text-ink-300 max-w-2xl">Solusi Pengadaan Alat Kesehatan Terpercaya di Kalimantan Timur</p>
                <div class="mt-8 flex flex-wrap justify-center md:justify-start gap-4">
                    <a href="{{ config('site.wa_link') }}" target="_blank" rel="noopener" class="bg-wa hover:bg-emerald-600 text-white font-semibold px-6 py-3 rounded-full hover:-translate-y-0.5 transition-transform duration-200">Konsultasi via WhatsApp</a>
                    <a href="#produk" class="border border-brand-200 dark:border-white/15 text-brand-700 dark:text-white font-semibold px-6 py-3 rounded-full hover:bg-brand-50 dark:hover:bg-white/10 transition">Lihat Produk</a>
                </div>
                <p class="mt-6 text-sm text-ink-400">Dipersembahkan oleh Wahana Surya</p>
            </div>
            <div class="order-first md:order-last">
                <img src="{{ config('site.placeholders.hero') }}" alt="Alat kesehatan medis" class="rounded-3xl shadow-2xl w-full h-64 md:h-80 object-cover card-3d">
            </div>
        </div>
    </section>

    {{-- Tentang --}}
    <section id="tentang" class="max-w-6xl mx-auto px-4 py-16 grid md:grid-cols-2 gap-10 items-center reveal">
        <img src="{{ config('site.placeholders.about') }}" alt="Tim Alkes Balikpapan" class="rounded-3xl shadow-xl w-full h-64 object-cover card-3d">
        <div class="glass rounded-3xl p-8">
            <h2 class="text-3xl font-bold text-brand-700 dark:text-white mb-4">Tentang Kami</h2>
            <p class="text-ink-600 dark:text-ink-300 leading-relaxed">Wahana Surya (Alkes Balikpapan) adalah penyedia alat kesehatan yang berpusat di Balikpapan, Kalimantan Timur. Kami hadir untuk memotong rantai distribusi yang panjang, memberikan akses cepat dan efisien terhadap alat kesehatan berkualitas bagi masyarakat dan instansi medis di seluruh Kalimantan.</p>
        </div>
    </section>

    {{-- Pasar --}}
    <section class="bg-brand-50 dark:bg-white/5 reveal">
        <div class="max-w-6xl mx-auto px-4 py-16">
            <h2 class="text-3xl font-bold text-brand-700 dark:text-white mb-8 text-center">Pasar yang Kami Layani</h2>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="glass rounded-2xl p-6 card-3d">
                    <h3 class="font-semibold text-lg text-brand-700 dark:text-white mb-2">B2B — Instansi & Perusahaan</h3>
                    <ul class="text-ink-600 dark:text-ink-300 space-y-1 text-sm list-disc list-inside">
                        <li>Rumah Sakit</li>
                        <li>Klinik Dokter</li>
                        <li>Perusahaan Tambang & Migas (K3)</li>
                        <li>Apotek</li>
                    </ul>
                </div>
                <div class="glass rounded-2xl p-6 card-3d">
                    <h3 class="font-semibold text-lg text-brand-700 dark:text-white mb-2">B2C — Kebutuhan Rumah & Homecare</h3>
                    <ul class="text-ink-600 dark:text-ink-300 space-y-1 text-sm list-disc list-inside">
                        <li>Alat pemantauan kesehatan di rumah</li>
                        <li>Alat bantu jalan</li>
                        <li>Perlengkapan homecare</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- Produk Unggulan --}}
    <section id="produk" class="max-w-7xl mx-auto px-4 py-16 reveal">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-3xl font-bold text-brand-700 dark:text-white">Produk Unggulan</h2>
            <a href="{{ route('products.index') }}" class="text-brand-700 dark:text-brand-300 font-medium text-sm hover:underline">Lihat semua →</a>
        </div>
        <div class="grid md:grid-cols-4 gap-6">
            @forelse ($featuredProducts as $product)
                <article class="glass rounded-xl overflow-hidden card-3d border border-transparent">
                    @if ($product->image)
                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="h-40 w-full object-cover">
                    @else
                        <img src="{{ config('site.placeholders.product') }}" alt="{{ $product->name }}" class="h-40 w-full object-cover">
                    @endif
                    <div class="p-4">
                        <span class="text-xs text-brand-600 dark:text-brand-300 font-medium">{{ \App\Models\Product::CATEGORIES[$product->category] ?? '' }}</span>
                        <h3 class="font-semibold mt-1 text-ink-900 dark:text-white">{{ $product->name }}</h3>
                    </div>
                </article>
            @empty
                <p class="text-muted">Belum ada produk unggulan.</p>
            @endforelse
        </div>
    </section>

    {{-- WhyUs --}}
    <section class="gradient-cta text-white reveal">
        <div class="max-w-6xl mx-auto px-4 py-16">
            <h2 class="text-3xl font-bold mb-8 text-center">Mengapa Memilih Kami</h2>
            <div class="grid md:grid-cols-2 gap-8">
                <div class="glass rounded-2xl p-6">
                    <div class="font-semibold text-lg mb-2">Distribusi Lokal</div>
                    <p class="text-white/80 text-sm">Stok dan basis pengiriman di Sepinggan, Balikpapan — lebih cepat menjangkau area Kalimantan Timur.</p>
                </div>
                <div class="glass rounded-2xl p-6">
                    <div class="font-semibold text-lg mb-2">Layanan Konsultasi</div>
                    <p class="text-white/80 text-sm">Respons cepat dan penawaran harga via WhatsApp untuk kebutuhan pengadaan Anda.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Blog terbaru --}}
    @if ($latestPosts->isNotEmpty())
    <section class="max-w-7xl mx-auto px-4 py-16 reveal">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-3xl font-bold text-brand-700 dark:text-white">Berita & Artikel Terbaru</h2>
            <a href="{{ route('blog.index') }}" class="text-brand-700 dark:text-brand-300 font-medium text-sm hover:underline">Semua berita →</a>
        </div>
        <div class="grid md:grid-cols-3 gap-6">
            @foreach ($latestPosts as $post)
                <article class="glass rounded-xl overflow-hidden card-3d border border-transparent">
                    @if ($post->featured_image)
                        <img src="{{ asset($post->featured_image) }}" alt="{{ $post->title }}" class="h-40 w-full object-cover">
                    @else
                        <img src="{{ config('site.placeholders.post') }}" alt="{{ $post->title }}" class="h-40 w-full object-cover">
                    @endif
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
    <section id="kontak" class="bg-brand-50 dark:bg-white/5 reveal">
        <div class="max-w-3xl mx-auto px-4 py-16 text-center">
            <h2 class="text-3xl font-bold text-brand-700 dark:text-white mb-4">Hubungi Kami</h2>
            <p class="text-ink-600 dark:text-ink-300 mb-6">Konsultasikan kebutuhan alat kesehatan Anda — respons cepat via WhatsApp.</p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ config('site.wa_link') }}" target="_blank" rel="noopener" class="bg-wa hover:bg-emerald-600 text-white font-semibold px-6 py-3 rounded-full hover:-translate-y-0.5 transition-transform duration-200">WhatsApp</a>
                <a href="mailto:halo@alkesbalikpapan.com" class="border border-brand-200 dark:border-white/15 text-brand-700 dark:text-white font-semibold px-6 py-3 rounded-full hover:bg-brand-50 dark:hover:bg-white/10 transition">Email</a>
            </div>
            <p class="mt-6 text-sm text-ink-400">Perumahan Palm Hills City Puri Alamanda Pa 6 no 11 Sepinggan, Balikpapan · Senin–Jumat 08:30–17:00</p>
        </div>
    </section>
</x-layouts.public>
