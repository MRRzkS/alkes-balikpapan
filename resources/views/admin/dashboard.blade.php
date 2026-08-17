<x-layouts.app>
    <div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-brand-700 dark:text-white mb-2">Dashboard</h1>
        <p class="text-ink-500 dark:text-ink-400 text-sm mb-8">Ringkasan aktivitas panel admin.</p>

        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5">
            <div class="glass rounded-2xl p-6 card-3d">
                <div class="flex items-center justify-between mb-3">
                    <div class="inline-flex items-center justify-center w-11 h-11 rounded-xl bg-brand-500/15 text-brand-600 dark:text-brand-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                    </div>
                </div>
                <div class="text-3xl font-bold text-brand-700 dark:text-white">{{ $postsCount }}</div>
                <div class="text-sm text-ink-500 dark:text-ink-400 mt-1">Artikel dipublikasi</div>
            </div>

            <div class="glass rounded-2xl p-6 card-3d">
                <div class="flex items-center justify-between mb-3">
                    <div class="inline-flex items-center justify-center w-11 h-11 rounded-xl bg-brand-500/15 text-brand-600 dark:text-brand-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 7L12 3 4 7m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                    </div>
                </div>
                <div class="text-3xl font-bold text-brand-700 dark:text-white">{{ $productsCount }}</div>
                <div class="text-sm text-ink-500 dark:text-ink-400 mt-1">Produk</div>
            </div>

            <div class="glass rounded-2xl p-6 card-3d">
                <div class="flex items-center justify-between mb-3">
                    <div class="inline-flex items-center justify-center w-11 h-11 rounded-xl bg-brand-500/15 text-brand-600 dark:text-brand-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                    </div>
                </div>
                <div class="text-3xl font-bold text-brand-700 dark:text-white">{{ $inquiriesCount }}</div>
                <div class="text-sm text-ink-500 dark:text-ink-400 mt-1">Total inquiry</div>
            </div>

            <div class="glass rounded-2xl p-6 card-3d border-red-500/20">
                <div class="flex items-center justify-between mb-3">
                    <div class="inline-flex items-center justify-center w-11 h-11 rounded-xl bg-red-500/15 text-red-600 dark:text-red-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 8A6 6 0 006 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 01-3.46 0"/></svg>
                    </div>
                </div>
                <div class="text-3xl font-bold text-red-600 dark:text-red-400">{{ $unreadCount }}</div>
                <div class="text-sm text-ink-500 dark:text-ink-400 mt-1">Inquiry belum dibaca</div>
            </div>
        </div>

        <div class="mt-8 glass rounded-2xl p-6">
            <h2 class="font-semibold text-brand-700 dark:text-white mb-4">Aksi Cepat</h2>
            <div class="flex flex-wrap gap-3">
                <a href="{{ route('admin.inquiries.index') }}" class="press inline-flex items-center gap-2 text-sm font-medium px-4 py-2.5 rounded-xl bg-brand-600 text-white hover:bg-brand-500 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                    Lihat inbox inquiry →
                </a>
                <a href="{{ route('admin.posts.index') }}" class="press inline-flex items-center gap-2 text-sm font-medium px-4 py-2.5 rounded-xl glass text-brand-700 dark:text-white hover:-translate-y-0.5 transition">
                    Kelola artikel →
                </a>
                <a href="{{ route('admin.products.index') }}" class="press inline-flex items-center gap-2 text-sm font-medium px-4 py-2.5 rounded-xl glass text-brand-700 dark:text-white hover:-translate-y-0.5 transition">
                    Kelola produk →
                </a>
            </div>
        </div>
    </div>
</x-layouts.app>
