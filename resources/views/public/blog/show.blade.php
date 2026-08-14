<x-layouts.public>
    <article class="max-w-3xl mx-auto px-4 py-16">
        <h1 class="text-3xl font-bold text-brand-700">{{ $post->title }}</h1>
        @if ($post->featured_image)
            <img src="{{ asset($post->featured_image) }}" alt="{{ $post->title }}" class="my-6 rounded-xl w-full">
        @else
            <img src="{{ config('site.placeholders.post') }}" alt="{{ $post->title }}" class="my-6 rounded-xl w-full">
        @endif
        <div class="prose max-w-none mt-6">{!! nl2br(e($post->body)) !!}</div>
    </article>
</x-layouts.public>
