<x-layouts.app>
    <div class="max-w-7xl mx-auto py-10 px-4">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Artikel / Berita</h1>
            <a href="{{ route('admin.posts.create') }}" class="bg-brand-600 text-white px-4 py-2 rounded-lg text-sm font-semibold">+ Artikel Baru</a>
        </div>

        @if (session('success'))
            <div class="bg-emerald-50 text-emerald-700 px-4 py-2 rounded-lg mb-4 text-sm">{{ session('success') }}</div>
        @endif

        <table class="w-full text-left text-sm">
            <thead class="text-muted border-b">
                <tr><th class="py-2">Judul</th><th>Status</th><th>Tanggal</th><th></th></tr>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                    <tr class="border-b">
                        <td class="py-3">{{ $post->title }}</td>
                        <td>{{ $post->status === 'published' ? 'Dipublikasi' : 'Draft' }}</td>
                        <td>{{ $post->published_at?->format('d/m/Y') ?? '-' }}</td>
                        <td class="text-right whitespace-nowrap">
                            <a href="{{ route('admin.posts.edit', $post) }}" class="text-brand-700 mr-3">Edit</a>
                            <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" class="inline" onsubmit="return confirm('Hapus artikel ini?')">
                                @csrf @method('DELETE')
                                <button class="text-red-600">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="py-6 text-muted">Belum ada artikel.</td></tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-6">{{ $posts->links() }}</div>
    </div>
</x-layouts.app>
