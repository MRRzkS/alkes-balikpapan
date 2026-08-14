<x-layouts.app>
    <div class="max-w-7xl mx-auto py-10 px-4">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Produk</h1>
            <a href="{{ route('admin.products.create') }}" class="bg-brand-600 text-white px-4 py-2 rounded-lg text-sm font-semibold">+ Produk Baru</a>
        </div>
        @if (session('success')) <div class="bg-emerald-50 text-emerald-700 px-4 py-2 rounded-lg mb-4 text-sm">{{ session('success') }}</div> @endif
        <table class="w-full text-left text-sm">
            <thead class="text-muted border-b"><tr><th class="py-2">Nama</th><th>Kategori</th><th>Unggulan</th><th></th></tr></thead>
            <tbody>
                @forelse ($products as $product)
                    <tr class="border-b">
                        <td class="py-3">{{ $product->name }}</td>
                        <td>{{ \App\Models\Product::CATEGORIES[$product->category] ?? $product->category }}</td>
                        <td>{{ $product->is_featured ? 'Ya' : '-' }}</td>
                        <td class="text-right whitespace-nowrap">
                            <a href="{{ route('admin.products.edit', $product) }}" class="text-brand-700 mr-3">Edit</a>
                            <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline" onsubmit="return confirm('Hapus produk ini?')">
                                @csrf @method('DELETE')<button class="text-red-600">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="py-6 text-muted">Belum ada produk.</td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-6">{{ $products->links() }}</div>
    </div>
</x-layouts.app>
