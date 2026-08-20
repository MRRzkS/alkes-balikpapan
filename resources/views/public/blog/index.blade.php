<x-layouts.public>
    <section class="max-w-7xl mx-auto px-4 py-20 reveal">
        <h1 class="text-4xl font-bold text-brand-700 dark:text-white mb-2">Berita & Artikel</h1>
        <p class="text-ink-600 dark:text-ink-300 mb-10">Update seputar alat kesehatan dan tips pengadaan.</p>
        <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-6">
            @forelse ($posts as $post)
                <article class="glass rounded-2xl overflow-hidden card-3d">
                    <div class="overflow-hidden">
                        @if ($post->featured_image)
                            <img src="{{ asset($post->featured_image) }}" alt="{{ $post->title }}" class="h-44 w-full object-cover hover:scale-105 transition-transform duration-500">
                        @else
                            <img src="{{ config('site.placeholders.post') }}" alt="{{ $post->title }}" class="h-44 w-full object-cover hover:scale-105 transition-transform duration-500">
                        @endif
                    </div>
                    <div class="p-5">
                        <h2 class="font-semibold text-lg text-ink-900 dark:text-white">{{ $post->title }}</h2>
                        @if ($post->excerpt)
                            <p class="text-ink-600 dark:text-ink-300 mt-2 text-sm">{{ $post->excerpt }}</p>
                        @endif
                        <a href="{{ route('blog.show', $post) }}" class="press inline-flex items-center gap-1 mt-3 text-brand-600 dark:text-brand-300 font-medium text-sm hover:underline">Baca →</a>
                    </div>
                </article>
            @empty
                <p class="text-ink-400">Belum ada artikel.</p>
            @endforelse
        </div>
    </section>
</x-layouts.public>
