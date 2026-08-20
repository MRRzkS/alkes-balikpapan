<x-layouts.public>
    <article class="max-w-3xl mx-auto px-4 py-20 reveal">
        <a href="{{ route('blog.index') }}" class="press inline-flex items-center gap-1 text-brand-600 dark:text-brand-300 text-sm hover:underline">← Semua berita</a>
        <h1 class="text-4xl font-bold text-brand-700 dark:text-white mt-4">{{ $post->title }}</h1>

        <div class="relative mt-6">
            <div class="animate-float absolute -inset-4 rounded-[1.5rem] bg-brand-500/15 blur-2xl"></div>
            @if ($post->featured_image)
                <img src="{{ asset($post->featured_image) }}" alt="{{ $post->title }}" class="relative card-3d rounded-[1.5rem] w-full">
            @else
                <img src="{{ config('site.placeholders.post') }}" alt="{{ $post->title }}" class="relative card-3d rounded-[1.5rem] w-full">
            @endif
        </div>

        <div class="glass rounded-[1.25rem] p-7 mt-8 prose max-w-none text-ink-700 dark:text-ink-200">{!! nl2br(e($post->body)) !!}</div>
    </article>
</x-layouts.public>
