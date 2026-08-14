<x-layouts.public>
    <section class="max-w-7xl mx-auto px-4 py-16 reveal">
        <h1 class="text-3xl font-bold text-brand-700 dark:text-white mb-8">Berita & Artikel</h1>
        <div class="grid md:grid-cols-3 gap-6">
            @forelse ($posts as $post)
                <article class="glass rounded-xl overflow-hidden card-3d border border-transparent">
                    @if ($post->featured_image)
                        <img src="{{ asset($post->featured_image) }}" alt="{{ $post->title }}" class="h-44 w-full object-cover">
                    @else
                        <img src="{{ config('site.placeholders.post') }}" alt="{{ $post->title }}" class="h-44 w-full object-cover">
                    @endif
                    <div class="p-5">
                        <h2 class="font-semibold text-lg text-ink-900 dark:text-white">{{ $post->title }}</h2>
                        @if ($post->excerpt)
                            <p class="text-ink-600 dark:text-ink-300 mt-2 text-sm">{{ $post->excerpt }}</p>
                        @endif
                    </div>
                </article>
            @empty
                <p class="text-muted">Belum ada artikel.</p>
            @endforelse
        </div>
    </section>
</x-layouts.public>
