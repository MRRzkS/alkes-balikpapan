<x-layouts.app>
    <div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-3xl font-bold text-brand-700 dark:text-white">Produk</h1>
                <p class="text-sm text-ink-500 dark:text-ink-400 mt-1">Kelola katalog produk yang tampil di situs publik.</p>
            </div>
            <a href="{{ route('admin.products.create') }}" class="press inline-flex items-center gap-2 bg-brand-600 hover:bg-brand-500 text-white px-4 py-2.5 rounded-xl text-sm font-semibold shadow-lg shadow-brand-600/30 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14M5 12h14"/></svg>
                Produk Baru
            </a>
        </div>

        @if (session('success'))
            <div class="glass rounded-xl border-emerald-300/40 dark:border-emerald-400/20 text-emerald-700 dark:text-emerald-300 px-4 py-3 mb-4 text-sm">{{ session('success') }}</div>
        @endif

        <div class="glass rounded-2xl overflow-hidden">
            <table class="w-full text-left text-sm">
                <thead class="text-ink-500 dark:text-ink-400 border-b border-white/10 dark:border-white/5">
                    <tr><th class="py-3 px-5">Nama</th><th>Kategori</th><th>Unggulan</th><th></th></tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr class="border-b border-white/5 dark:border-white/5 hover:bg-brand-500/5 transition">
                            <td class="py-3 px-5 font-medium text-ink-900 dark:text-white">{{ $product->name }}</td>
                            <td class="text-ink-600 dark:text-ink-300">{{ \App\Models\Product::CATEGORIES[$product->category] ?? $product->category }}</td>
                            <td>
                                @if ($product->is_featured)
                                    <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-xs font-medium bg-brand-500/15 text-brand-700 dark:text-brand-300">Unggulan</span>
                                @else
                                    <span class="text-ink-400 dark:text-ink-500">-</span>
                                @endif
                            </td>
                            <td class="text-right whitespace-nowrap px-5">
                                <a href="{{ route('admin.products.edit', $product) }}" class="text-brand-600 dark:text-brand-300 mr-3 hover:underline">Edit</a>
                                <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline" onsubmit="return confirm('Hapus produk ini?')">
                                    @csrf @method('DELETE')
                                    <button class="text-red-600 dark:text-red-400 hover:underline">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="py-8 text-center text-ink-400">Belum ada produk.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($products->hasPages())
            <div class="mt-6">{{ $products->links() }}</div>
        @endif
    </div>
</x-layouts.app>
