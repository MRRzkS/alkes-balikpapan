<x-layouts.app>
    <div class="max-w-3xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-brand-700 dark:text-white mb-6">{{ isset($post) ? 'Edit Artikel' : 'Artikel Baru' }}</h1>

        @if (session('success'))
            <div class="glass rounded-xl border-emerald-300/40 dark:border-emerald-400/20 text-emerald-700 dark:text-emerald-300 px-4 py-3 mb-4 text-sm">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ isset($post) ? route('admin.posts.update', $post) : route('admin.posts.store') }}" enctype="multipart/form-data" class="glass rounded-2xl p-6 space-y-5">
            @csrf
            @if (isset($post)) @method('PUT') @endif

            <div>
                <label class="block text-sm font-medium text-ink-700 dark:text-ink-200 mb-1.5">Judul</label>
                <input type="text" name="title" value="{{ old('title', $post->title ?? '') }}" class="w-full border border-gray-200 dark:border-white/10 bg-white/70 dark:bg-white/5 text-ink-900 dark:text-white rounded-xl px-4 py-2.5 text-sm focus:border-brand-500 focus:ring-4 focus:ring-brand-500/20 outline-none transition">
                @error('title') <p class="text-red-600 dark:text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-ink-700 dark:text-ink-200 mb-1.5">Slug (opsional, auto dari judul)</label>
                <input type="text" name="slug" value="{{ old('slug', $post->slug ?? '') }}" class="w-full border border-gray-200 dark:border-white/10 bg-white/70 dark:bg-white/5 text-ink-900 dark:text-white rounded-xl px-4 py-2.5 text-sm focus:border-brand-500 focus:ring-4 focus:ring-brand-500/20 outline-none transition">
                @error('slug') <p class="text-red-600 dark:text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-ink-700 dark:text-ink-200 mb-1.5">Ringkasan</label>
                <textarea name="excerpt" rows="2" class="w-full border border-gray-200 dark:border-white/10 bg-white/70 dark:bg-white/5 text-ink-900 dark:text-white rounded-xl px-4 py-2.5 text-sm focus:border-brand-500 focus:ring-4 focus:ring-brand-500/20 outline-none transition">{{ old('excerpt', $post->excerpt ?? '') }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-ink-700 dark:text-ink-200 mb-1.5">Isi</label>
                <textarea name="body" rows="10" class="w-full border border-gray-200 dark:border-white/10 bg-white/70 dark:bg-white/5 text-ink-900 dark:text-white rounded-xl px-4 py-2.5 text-sm focus:border-brand-500 focus:ring-4 focus:ring-brand-500/20 outline-none transition">{{ old('body', $post->body ?? '') }}</textarea>
                @error('body') <p class="text-red-600 dark:text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-ink-700 dark:text-ink-200 mb-1.5">Gambar unggulan</label>
                <input type="file" name="featured_image" class="w-full text-sm text-ink-600 dark:text-ink-300 file:mr-3 file:px-4 file:py-2 file:rounded-lg file:border-0 file:bg-brand-600 file:text-white file:font-medium file:cursor-pointer">
                @error('featured_image') <p class="text-red-600 dark:text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-ink-700 dark:text-ink-200 mb-1.5">Status</label>
                <select name="status" class="w-full border border-gray-200 dark:border-white/10 bg-white/70 dark:bg-white/5 text-ink-900 dark:text-white rounded-xl px-4 py-2.5 text-sm focus:border-brand-500 focus:ring-4 focus:ring-brand-500/20 outline-none transition">
                    <option value="draft" {{ (old('status', $post->status ?? 'draft') === 'draft') ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ (old('status', $post->status ?? '') === 'published') ? 'selected' : '' }}>Dipublikasi</option>
                </select>
            </div>

            <button type="submit" class="press w-full sm:w-auto bg-brand-600 hover:bg-brand-500 text-white px-6 py-3 rounded-xl font-semibold shadow-lg shadow-brand-600/30 hover:-translate-y-0.5 transition-transform duration-200">Simpan</button>
        </form>
    </div>
</x-layouts.app>
