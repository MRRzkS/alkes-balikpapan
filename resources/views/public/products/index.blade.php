<x-layouts.public>
    <section class="max-w-7xl mx-auto px-4 py-16 reveal">
        <h1 class="text-3xl font-bold text-brand-700 dark:text-white mb-8">Katalog Produk</h1>

        <div class="flex flex-wrap gap-2 mb-8">
            <a href="{{ route('products.index') }}" class="px-3 py-1.5 rounded-full text-sm border {{ !$activeCategory ? 'bg-brand-600 text-white' : 'text-muted dark:text-ink-300' }}">Semua</a>
            @foreach ($categories as $key => $label)
                <a href="{{ route('products.index', ['category' => $key]) }}" class="px-3 py-1.5 rounded-full text-sm border {{ $activeCategory === $key ? 'bg-brand-600 text-white' : 'text-muted dark:text-ink-300' }}">{{ $label }}</a>
            @endforeach
        </div>

        <div class="grid md:grid-cols-3 gap-6">
            @forelse ($products as $product)
                <article class="glass rounded-xl overflow-hidden card-3d border border-transparent">
                    @if ($product->image)
                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="h-44 w-full object-cover">
                    @else
                        <img src="{{ config('site.placeholders.product') }}" alt="{{ $product->name }}" class="h-44 w-full object-cover">
                    @endif
                    <div class="p-5">
                        <span class="text-xs text-brand-600 dark:text-brand-300 font-medium">{{ $categories[$product->category] ?? '' }}</span>
                        <h2 class="font-semibold text-lg mt-1 text-ink-900 dark:text-white">{{ $product->name }}</h2>
                        @if ($product->description)
                            <p class="text-ink-600 dark:text-ink-300 mt-2 text-sm line-clamp-3">{{ $product->description }}</p>
                        @endif
                    </div>
                </article>
            @empty
                <p class="text-muted">Belum ada produk pada kategori ini.</p>
            @endforelse
        </div>

        <div class="mt-8">{{ $products->links() }}</div>
    </section>
</x-layouts.public>
