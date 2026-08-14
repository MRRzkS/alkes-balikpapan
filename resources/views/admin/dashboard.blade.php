<x-layouts.app>
    <div class="max-w-7xl mx-auto py-10 px-4">
        <h1 class="text-2xl font-bold mb-6">Dashboard</h1>
        <div class="grid md:grid-cols-4 gap-4">
            <div class="bg-white border rounded-xl p-5">
                <div class="text-3xl font-bold text-brand-700">{{ $postsCount }}</div>
                <div class="text-sm text-muted">Artikel dipublikasi</div>
            </div>
            <div class="bg-white border rounded-xl p-5">
                <div class="text-3xl font-bold text-brand-700">{{ $productsCount }}</div>
                <div class="text-sm text-muted">Produk</div>
            </div>
            <div class="bg-white border rounded-xl p-5">
                <div class="text-3xl font-bold text-brand-700">{{ $inquiriesCount }}</div>
                <div class="text-sm text-muted">Total inquiry</div>
            </div>
            <div class="bg-white border rounded-xl p-5">
                <div class="text-3xl font-bold text-red-600">{{ $unreadCount }}</div>
                <div class="text-sm text-muted">Inquiry belum dibaca</div>
            </div>
        </div>
        <div class="mt-8 flex gap-4">
            <a href="{{ route('admin.inquiries.index') }}" class="text-brand-700 font-medium">Lihat inbox inquiry →</a>
            <a href="{{ route('admin.posts.index') }}" class="text-brand-700 font-medium">Kelola artikel →</a>
            <a href="{{ route('admin.products.index') }}" class="text-brand-700 font-medium">Kelola produk →</a>
        </div>
    </div>
</x-layouts.app>
