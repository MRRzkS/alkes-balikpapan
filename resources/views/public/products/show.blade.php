<x-layouts.public>
    <article class="max-w-3xl mx-auto px-4 py-16">
        <a href="{{ route('products.index') }}" class="text-brand-700 text-sm">← Katalog</a>
        <span class="block text-xs text-brand-600 font-medium mt-4">{{ $categories[$product->category] ?? '' }}</span>
        <h1 class="text-3xl font-bold text-brand-700 mt-1">{{ $product->name }}</h1>
        @if ($product->image)
            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="my-6 rounded-xl w-full">
        @else
            <img src="{{ config('site.placeholders.product') }}" alt="{{ $product->name }}" class="my-6 rounded-xl w-full">
        @endif
        @if ($product->description)
            <div class="prose max-w-none mt-4">{{ nl2br(e($product->description)) }}</div>
        @endif
        <a href="{{ config('site.wa_link') }}" target="_blank" rel="noopener" class="inline-block mt-8 bg-wa text-white px-5 py-2.5 rounded-full font-semibold">Tanya via WhatsApp</a>
    </article>
</x-layouts.public>
