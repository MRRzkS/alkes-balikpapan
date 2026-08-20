<x-layouts.public>
    <section class="max-w-7xl mx-auto px-4 py-20 reveal">
        <h1 class="text-4xl font-bold text-brand-700 dark:text-white mb-2">Katalog Produk</h1>
        <p class="text-ink-600 dark:text-ink-300 mb-8">Jelajahi alat kesehatan kami berdasarkan kategori.</p>

        <div class="flex flex-wrap gap-2 mb-10">
            <a href="{{ route('products.index') }}" class="press px-4 py-2 rounded-full text-sm font-medium {{ !$activeCategory ? 'text-white bg-brand-600 border-transparent' : 'glass text-ink-600 dark:text-ink-300' }}">Semua</a>
            @foreach ($categories as $key => $label)
                <a href="{{ route('products.index', ['category' => $key]) }}" class="press px-4 py-2 rounded-full text-sm font-medium {{ $activeCategory === $key ? 'text-white bg-brand-600 border-transparent' : 'glass text-ink-600 dark:text-ink-300' }}">{{ $label }}</a>
            @endforeach
        </div>

        @forelse ($products as $product)
            <article class="glass rounded-2xl overflow-hidden card-3d mb-6">
                <div class="grid sm:grid-cols-3 items-center">
                    <div class="overflow-hidden sm:h-full">
                        @if ($product->image)
                            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="h-48 sm:h-full w-full object-cover hover:scale-105 transition-transform duration-500">
                        @else
                            <img src="{{ config('site.placeholders.product') }}" alt="{{ $product->name }}" class="h-48 sm:h-full w-full object-cover hover:scale-105 transition-transform duration-500">
                        @endif
                    </div>
                    <div class="sm:col-span-2 p-6">
                        <span class="text-xs text-brand-600 dark:text-brand-300 font-medium">{{ $categories[$product->category] ?? '' }}</span>
                        <h2 class="font-semibold text-xl mt-1 text-ink-900 dark:text-white">{{ $product->name }}</h2>
                        @if ($product->description)
                            <p class="text-ink-600 dark:text-ink-300 mt-3 text-sm line-clamp-3">{{ $product->description }}</p>
                        @endif
                        <a href="{{ route('products.show', $product) }}" class="press inline-flex items-center gap-1 mt-4 text-brand-600 dark:text-brand-300 font-medium text-sm hover:underline">Detail →</a>
                    </div>
                </div>
            </article>
        @empty
            <p class="text-ink-400">Belum ada produk pada kategori ini.</p>
        @endforelse

        @if ($products->hasPages())
            <div class="mt-8">{{ $products->links() }}</div>
        @endif
    </section>
</x-layouts.public>
