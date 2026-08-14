<x-layouts.public>
    <section class="max-w-7xl mx-auto px-4 py-16">
        <h1 class="text-3xl font-bold text-brand-700 mb-8">Katalog Produk</h1>

        <div class="flex flex-wrap gap-2 mb-8">
            <a href="{{ route('products.index') }}" class="px-3 py-1.5 rounded-full text-sm border {{ !$activeCategory ? 'bg-brand-600 text-white' : 'text-muted' }}">Semua</a>
            @foreach ($categories as $key => $label)
                <a href="{{ route('products.index', ['category' => $key]) }}" class="px-3 py-1.5 rounded-full text-sm border {{ $activeCategory === $key ? 'bg-brand-600 text-white' : 'text-muted' }}">{{ $label }}</a>
            @endforeach
        </div>

        <div class="grid md:grid-cols-3 gap-6">
            @forelse ($products as $product)
                <article class="border rounded-xl overflow-hidden">
                    @if ($product->image)
                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="h-44 w-full object-cover">
                    @endif
                    <div class="p-5">
                        <span class="text-xs text-brand-600 font-medium">{{ $categories[$product->category] ?? '' }}</span>
                        <h2 class="font-semibold text-lg mt-1">{{ $product->name }}</h2>
                        @if ($product->description)
                            <p class="text-muted mt-2 text-sm line-clamp-3">{{ $product->description }}</p>
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
