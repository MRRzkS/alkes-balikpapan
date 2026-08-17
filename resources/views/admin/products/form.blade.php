<x-layouts.app>
    <div class="max-w-3xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-brand-700 dark:text-white mb-6">{{ isset($product) ? 'Edit Produk' : 'Produk Baru' }}</h1>

        @if (session('success'))
            <div class="glass rounded-xl border-emerald-300/40 dark:border-emerald-400/20 text-emerald-700 dark:text-emerald-300 px-4 py-3 mb-4 text-sm">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ isset($product) ? route('admin.products.update', $product) : route('admin.products.store') }}" enctype="multipart/form-data" class="glass rounded-2xl p-6 space-y-5">
            @csrf
            @if (isset($product)) @method('PUT') @endif

            <div>
                <label class="block text-sm font-medium text-ink-700 dark:text-ink-200 mb-1.5">Nama</label>
                <input type="text" name="name" value="{{ old('name', $product->name ?? '') }}" class="w-full border border-gray-200 dark:border-white/10 bg-white/70 dark:bg-white/5 text-ink-900 dark:text-white rounded-xl px-4 py-2.5 text-sm focus:border-brand-500 focus:ring-4 focus:ring-brand-500/20 outline-none transition">
                @error('name') <p class="text-red-600 dark:text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-ink-700 dark:text-ink-200 mb-1.5">Kategori</label>
                <select name="category" class="w-full border border-gray-200 dark:border-white/10 bg-white/70 dark:bg-white/5 text-ink-900 dark:text-white rounded-xl px-4 py-2.5 text-sm focus:border-brand-500 focus:ring-4 focus:ring-brand-500/20 outline-none transition">
                    @foreach (\App\Models\Product::CATEGORIES as $key => $label)
                        <option value="{{ $key }}" {{ (old('category', $product->category ?? '') === $key) ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @error('category') <p class="text-red-600 dark:text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-ink-700 dark:text-ink-200 mb-1.5">Deskripsi</label>
                <textarea name="description" rows="4" class="w-full border border-gray-200 dark:border-white/10 bg-white/70 dark:bg-white/5 text-ink-900 dark:text-white rounded-xl px-4 py-2.5 text-sm focus:border-brand-500 focus:ring-4 focus:ring-brand-500/20 outline-none transition">{{ old('description', $product->description ?? '') }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-ink-700 dark:text-ink-200 mb-1.5">Gambar</label>
                <input type="file" name="image" class="w-full text-sm text-ink-600 dark:text-ink-300 file:mr-3 file:px-4 file:py-2 file:rounded-lg file:border-0 file:bg-brand-600 file:text-white file:font-medium file:cursor-pointer">
                @error('image') <p class="text-red-600 dark:text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <label class="flex items-center gap-2.5 text-sm text-ink-700 dark:text-ink-200 cursor-pointer">
                <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $product->is_featured ?? false) ? 'checked' : '' }} class="w-4 h-4 rounded border-gray-300 text-brand-600 focus:ring-brand-500">
                Tampilkan sebagai unggulan
            </label>

            <button type="submit" class="press w-full sm:w-auto bg-brand-600 hover:bg-brand-500 text-white px-6 py-3 rounded-xl font-semibold shadow-lg shadow-brand-600/30 hover:-translate-y-0.5 transition-transform duration-200">Simpan</button>
        </form>
    </div>
</x-layouts.app>
