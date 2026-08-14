<x-layouts.app>
    <div class="max-w-3xl mx-auto py-10 px-4">
        <h1 class="text-2xl font-bold mb-6">{{ isset($product) ? 'Edit Produk' : 'Produk Baru' }}</h1>
        @if (session('success')) <div class="bg-emerald-50 text-emerald-700 px-4 py-2 rounded-lg mb-4 text-sm">{{ session('success') }}</div> @endif
        <form method="POST" action="{{ isset($product) ? route('admin.products.update', $product) : route('admin.products.store') }}" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @if (isset($product)) @method('PUT') @endif
            <div>
                <label class="block text-sm font-medium mb-1">Nama</label>
                <input type="text" name="name" value="{{ old('name', $product->name ?? '') }}" class="w-full border rounded-lg px-3 py-2">
                @error('name') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Kategori</label>
                <select name="category" class="w-full border rounded-lg px-3 py-2">
                    @foreach (\App\Models\Product::CATEGORIES as $key => $label)
                        <option value="{{ $key }}" {{ (old('category', $product->category ?? '') === $key) ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @error('category') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Deskripsi</label>
                <textarea name="description" rows="4" class="w-full border rounded-lg px-3 py-2">{{ old('description', $product->description ?? '') }}</textarea>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Gambar</label>
                <input type="file" name="image" class="w-full">
                @error('image') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <label class="flex items-center gap-2 text-sm">
                <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $product->is_featured ?? false) ? 'checked' : '' }}>
                Tampilkan sebagai unggulan
            </label>
            <button type="submit" class="bg-brand-600 text-white px-5 py-2 rounded-lg font-semibold">Simpan</button>
        </form>
    </div>
</x-layouts.app>
