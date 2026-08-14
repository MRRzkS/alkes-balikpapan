<x-layouts.public>
    <section class="max-w-7xl mx-auto px-4 py-16">
        <h1 class="text-3xl font-bold text-brand-700 mb-8">Berita & Artikel</h1>
        <div class="grid md:grid-cols-3 gap-6">
            @forelse ($posts as $post)
                <article class="border rounded-xl overflow-hidden">
                    @if ($post->featured_image)
                        <img src="{{ asset($post->featured_image) }}" alt="{{ $post->title }}" class="h-44 w-full object-cover">
                    @endif
                    <div class="p-5">
                        <h2 class="font-semibold text-lg">{{ $post->title }}</h2>
                        @if ($post->excerpt)
                            <p class="text-muted mt-2 text-sm">{{ $post->excerpt }}</p>
                        @endif
                    </div>
                </article>
            @empty
                <p class="text-muted">Belum ada artikel.</p>
            @endforelse
        </div>
    </section>
</x-layouts.public>
