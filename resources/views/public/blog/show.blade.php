<x-layouts.public>
    <article class="max-w-3xl mx-auto px-4 py-16 reveal">
        <h1 class="text-3xl font-bold text-brand-700 dark:text-white">{{ $post->title }}</h1>
        @if ($post->featured_image)
            <img src="{{ asset($post->featured_image) }}" alt="{{ $post->title }}" class="my-6 rounded-xl w-full card-3d">
        @else
            <img src="{{ config('site.placeholders.post') }}" alt="{{ $post->title }}" class="my-6 rounded-xl w-full card-3d">
        @endif
        <div class="prose max-w-none mt-6 text-ink-700 dark:text-ink-200">{!! nl2br(e($post->body)) !!}</div>
    </article>
</x-layouts.public>
