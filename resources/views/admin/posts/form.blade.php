<x-layouts.app>
    <div class="max-w-3xl mx-auto py-10 px-4">
        <h1 class="text-2xl font-bold mb-6">{{ isset($post) ? 'Edit Artikel' : 'Artikel Baru' }}</h1>

        @if (session('success'))
            <div class="bg-emerald-50 text-emerald-700 px-4 py-2 rounded-lg mb-4 text-sm">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ isset($post) ? route('admin.posts.update', $post) : route('admin.posts.store') }}" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @if (isset($post))
                @method('PUT')
            @endif

            <div>
                <label class="block text-sm font-medium mb-1">Judul</label>
                <input type="text" name="title" value="{{ old('title', $post->title ?? '') }}" class="w-full border rounded-lg px-3 py-2">
                @error('title') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Slug (opsional, auto dari judul)</label>
                <input type="text" name="slug" value="{{ old('slug', $post->slug ?? '') }}" class="w-full border rounded-lg px-3 py-2">
                @error('slug') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Ringkasan</label>
                <textarea name="excerpt" rows="2" class="w-full border rounded-lg px-3 py-2">{{ old('excerpt', $post->excerpt ?? '') }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Isi</label>
                <textarea name="body" rows="10" class="w-full border rounded-lg px-3 py-2">{{ old('body', $post->body ?? '') }}</textarea>
                @error('body') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Gambar unggulan</label>
                <input type="file" name="featured_image" class="w-full">
                @error('featured_image') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Status</label>
                <select name="status" class="w-full border rounded-lg px-3 py-2">
                    <option value="draft" {{ (old('status', $post->status ?? 'draft') === 'draft') ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ (old('status', $post->status ?? '') === 'published') ? 'selected' : '' }}>Dipublikasi</option>
                </select>
            </div>

            <button type="submit" class="bg-brand-600 text-white px-5 py-2 rounded-lg font-semibold">Simpan</button>
        </form>
    </div>
</x-layouts.app>
