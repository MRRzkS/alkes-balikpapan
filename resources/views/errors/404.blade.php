{{-- A 404 means the app is healthy, so the full public layout is safe here and the
     visitor keeps the nav to find their way back. --}}
<x-layouts.public>
    <section class="max-w-3xl mx-auto px-4 py-28 text-center reveal is-visible">
        <p class="text-7xl md:text-8xl font-bold bg-gradient-to-r from-brand-500 to-brand-700 dark:from-brand-300 dark:to-brand-500 bg-clip-text text-transparent">404</p>
        <h1 class="mt-4 text-3xl md:text-4xl font-bold text-brand-700 dark:text-white">Halaman tidak ditemukan</h1>
        <p class="mt-4 text-ink-600 dark:text-ink-300">
            Halaman yang Anda cari mungkin sudah dipindahkan atau tidak pernah ada.
            Silakan kembali ke beranda atau lihat katalog produk kami.
        </p>

        <div class="mt-10 flex flex-wrap justify-center gap-4">
            <a href="{{ route('home') }}" class="press bg-brand-600 hover:bg-brand-500 text-white font-semibold px-6 py-3 rounded-full shadow-lg shadow-brand-600/30 hover:-translate-y-0.5 transition-transform duration-200">Kembali ke Beranda</a>
            <a href="{{ route('products.index') }}" class="press glass text-brand-700 dark:text-white font-semibold px-6 py-3 rounded-full hover:-translate-y-0.5 transition-transform duration-200">Lihat Katalog Produk</a>
            <a href="{{ config('site.wa_link') }}" target="_blank" rel="noopener" class="press bg-wa hover:bg-emerald-500 text-white font-semibold px-6 py-3 rounded-full shadow-lg shadow-emerald-500/25 hover:-translate-y-0.5 transition-transform duration-200">Tanya via WhatsApp</a>
        </div>
    </section>
</x-layouts.public>
