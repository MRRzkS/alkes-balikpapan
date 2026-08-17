<x-layouts.public>
    <article class="max-w-3xl mx-auto px-4 py-20 reveal">
        <a href="{{ route('products.index') }}" class="press inline-flex items-center gap-1 text-brand-600 dark:text-brand-300 text-sm hover:underline">← Katalog</a>
        <span class="block text-xs text-brand-600 dark:text-brand-300 font-medium mt-4">{{ $categories[$product->category] ?? '' }}</span>
        <h1 class="text-4xl font-bold text-brand-700 dark:text-white mt-1">{{ $product->name }}</h1>

        <div class="relative mt-6">
            <div class="animate-float absolute -inset-4 rounded-[1.5rem] bg-brand-500/15 blur-2xl"></div>
            @if ($product->image)
                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="relative card-3d rounded-[1.5rem] w-full">
            @else
                <img src="{{ config('site.placeholders.product') }}" alt="{{ $product->name }}" class="relative card-3d rounded-[1.5rem] w-full">
            @endif
        </div>

        @if ($product->description)
            <div class="glass rounded-[1.25rem] p-7 mt-8 prose max-w-none text-ink-700 dark:text-ink-200">{{ nl2br(e($product->description)) }}</div>
        @endif

        <a href="{{ config('site.wa_link') }}" target="_blank" rel="noopener" class="press inline-flex items-center gap-2 mt-8 bg-wa hover:bg-emerald-500 text-white font-semibold px-6 py-3 rounded-full shadow-xl shadow-emerald-500/30 hover:-translate-y-0.5 transition-transform duration-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor"><path d="M.057 24l1.687-6.163a11.867 11.867 0 01-1.587-5.946C.16 5.335 5.495 0 12.05 0a11.82 11.82 0 018.413 3.488 11.82 11.82 0 013.48 8.414c-.003 6.557-5.338 11.892-11.893 11.892a11.9 11.9 0 01-5.688-1.448L.057 24z"/></svg>
            Tanya via WhatsApp
        </a>
    </article>
</x-layouts.public>
