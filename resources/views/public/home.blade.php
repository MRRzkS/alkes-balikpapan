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
    <section class="bg-gradient-to-b from-brand-50 to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24 grid md:grid-cols-2 gap-10 items-center">
            <div class="text-center md:text-left">
                <h1 class="text-4xl md:text-5xl font-bold text-brand-700">Alkes Balikpapan</h1>
                <p class="mt-4 text-lg md:text-xl text-muted max-w-2xl">Solusi Pengadaan Alat Kesehatan Terpercaya di Kalimantan Timur</p>
                <div class="mt-8 flex flex-wrap justify-center md:justify-start gap-4">
                    <a href="{{ config('site.wa_link') }}" target="_blank" rel="noopener" class="bg-wa hover:bg-emerald-600 text-white font-semibold px-6 py-3 rounded-full">Konsultasi via WhatsApp</a>
                    <a href="#produk" class="border border-brand-200 text-brand-700 font-semibold px-6 py-3 rounded-full hover:bg-brand-50">Lihat Produk</a>
                </div>
                <p class="mt-6 text-sm text-gray-400">Dipersembahkan oleh Wahana Surya</p>
            </div>
            <div class="order-first md:order-last">
                <img src="{{ config('site.placeholders.hero') }}" alt="Alat kesehatan medis" class="rounded-2xl shadow-lg w-full h-64 md:h-80 object-cover">
            </div>
        </div>
    </section>

    {{-- Tentang --}}
    <section id="tentang" class="max-w-6xl mx-auto px-4 py-16 grid md:grid-cols-2 gap-10 items-center">
        <img src="{{ config('site.placeholders.about') }}" alt="Tim Alkes Balikpapan" class="rounded-2xl shadow-md w-full h-64 object-cover">
        <div>
            <h2 class="text-3xl font-bold text-brand-700 mb-4">Tentang Kami</h2>
            <p class="text-muted leading-relaxed">Wahana Surya (Alkes Balikpapan) adalah penyedia alat kesehatan yang berpusat di Balikpapan, Kalimantan Timur. Kami hadir untuk memotong rantai distribusi yang panjang, memberikan akses cepat dan efisien terhadap alat kesehatan berkualitas bagi masyarakat dan instansi medis di seluruh Kalimantan.</p>
        </div>
    </section>

    {{-- Pasar --}}
    <section class="bg-brand-50">
        <div class="max-w-6xl mx-auto px-4 py-16">
            <h2 class="text-3xl font-bold text-brand-700 mb-8 text-center">Pasar yang Kami Layani</h2>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="bg-white rounded-2xl p-6 shadow-sm">
                    <h3 class="font-semibold text-lg text-brand-700 mb-2">B2B — Instansi & Perusahaan</h3>
                    <ul class="text-muted space-y-1 text-sm list-disc list-inside">
                        <li>Rumah Sakit</li>
                        <li>Klinik Dokter</li>
                        <li>Perusahaan Tambang & Migas (K3)</li>
                        <li>Apotek</li>
                    </ul>
                </div>
                <div class="bg-white rounded-2xl p-6 shadow-sm">
                    <h3 class="font-semibold text-lg text-brand-700 mb-2">B2C — Kebutuhan Rumah & Homecare</h3>
                    <ul class="text-muted space-y-1 text-sm list-disc list-inside">
                        <li>Alat pemantauan kesehatan di rumah</li>
                        <li>Alat bantu jalan</li>
                        <li>Perlengkapan homecare</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- Produk Unggulan --}}
    <section id="produk" class="max-w-7xl mx-auto px-4 py-16">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-3xl font-bold text-brand-700">Produk Unggulan</h2>
            <a href="{{ route('products.index') }}" class="text-brand-700 font-medium text-sm">Lihat semua →</a>
        </div>
        <div class="grid md:grid-cols-4 gap-6">
            @forelse ($featuredProducts as $product)
                <article class="border rounded-xl overflow-hidden hover:shadow-md transition">
                    @if ($product->image)
                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="h-40 w-full object-cover">
                    @else
                        <img src="{{ config('site.placeholders.product') }}" alt="{{ $product->name }}" class="h-40 w-full object-cover">
                    @endif
                    <div class="p-4">
                        <span class="text-xs text-brand-600 font-medium">{{ \App\Models\Product::CATEGORIES[$product->category] ?? '' }}</span>
                        <h3 class="font-semibold mt-1">{{ $product->name }}</h3>
                    </div>
                </article>
            @empty
                <p class="text-muted">Belum ada produk unggulan.</p>
            @endforelse
        </div>
    </section>

    {{-- WhyUs --}}
    <section class="bg-brand-900 text-white">
        <div class="max-w-6xl mx-auto px-4 py-16">
            <h2 class="text-3xl font-bold mb-8 text-center">Mengapa Memilih Kami</h2>
            <div class="grid md:grid-cols-2 gap-8">
                <div>
                    <div class="font-semibold text-lg mb-2">Distribusi Lokal</div>
                    <p class="text-brand-200 text-sm">Stok dan basis pengiriman di Sepinggan, Balikpapan — lebih cepat menjangkau area Kalimantan Timur.</p>
                </div>
                <div>
                    <div class="font-semibold text-lg mb-2">Layanan Konsultasi</div>
                    <p class="text-brand-200 text-sm">Respons cepat dan penawaran harga via WhatsApp untuk kebutuhan pengadaan Anda.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Blog terbaru --}}
    @if ($latestPosts->isNotEmpty())
    <section class="max-w-7xl mx-auto px-4 py-16">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-3xl font-bold text-brand-700">Berita & Artikel Terbaru</h2>
            <a href="{{ route('blog.index') }}" class="text-brand-700 font-medium text-sm">Semua berita →</a>
        </div>
        <div class="grid md:grid-cols-3 gap-6">
            @foreach ($latestPosts as $post)
                <article class="border rounded-xl overflow-hidden">
                    @if ($post->featured_image)
                        <img src="{{ asset($post->featured_image) }}" alt="{{ $post->title }}" class="h-40 w-full object-cover">
                    @else
                        <img src="{{ config('site.placeholders.post') }}" alt="{{ $post->title }}" class="h-40 w-full object-cover">
                    @endif
                    <div class="p-5">
                        <h3 class="font-semibold">{{ $post->title }}</h3>
                        @if ($post->excerpt)
                            <p class="text-muted text-sm mt-2">{{ $post->excerpt }}</p>
                        @endif
                    </div>
                </article>
            @endforeach
        </div>
    </section>
    @endif

    {{-- Kontak singkat --}}
    <section id="kontak" class="bg-brand-50">
        <div class="max-w-3xl mx-auto px-4 py-16 text-center">
            <h2 class="text-3xl font-bold text-brand-700 mb-4">Hubungi Kami</h2>
            <p class="text-muted mb-6">Konsultasikan kebutuhan alat kesehatan Anda — respons cepat via WhatsApp.</p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ config('site.wa_link') }}" target="_blank" rel="noopener" class="bg-wa hover:bg-emerald-600 text-white font-semibold px-6 py-3 rounded-full">WhatsApp</a>
                <a href="mailto:halo@alkesbalikpapan.com" class="border border-brand-200 text-brand-700 font-semibold px-6 py-3 rounded-full hover:bg-white">Email</a>
            </div>
            <p class="mt-6 text-sm text-gray-500">Perumahan Palm Hills City Puri Alamanda Pa 6 no 11 Sepinggan, Balikpapan · Senin–Jumat 08:30–17:00</p>
        </div>
    </section>
</x-layouts.public>
